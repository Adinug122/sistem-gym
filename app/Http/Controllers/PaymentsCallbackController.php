<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payments;
use Carbon\Carbon;

class PaymentsCallbackController extends Controller
{
    public function handle(Request $request)
    {
        Log::info('Midtrans Callback Masuk', $request->all());

        $serverKey = config('services.midtrans.server_key');
        
        // Rumus Hash dari Dokumentasi Midtrans: SHA512(order_id + status_code + gross_amount + ServerKey)
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed !== $request->signature_key) {
            Log::warning('Signature Key Invalid', ['order_id' => $request->order_id]);
            return response()->json(['message' => 'Invalid Signature'], 403); // Tolak hacker
        }
        $payment = Payments::where('order_id', $request->order_id)->first();

        if (!$payment) {
            Log::error('Payment not found', ['order_id' => $request->order_id]);
            return response()->json(['message' => 'payment not found'], 404);
        }

        // simpan data dari midtrans
        $payment->update([
            'transaction_status' => $request->transaction_status,
            'payment_type'       => $request->payment_type ?? null,
            'transaction_id'     => $request->transaction_id ?? null,
            'raw_response'       => json_encode($request->all()),
        ]);

      
        // LOGIKA STATUS
        if (in_array($request->transaction_status, ['settlement', 'capture'])) {

            $payment->update([
                'status'  => 'success',
                'paid_at'=> now()
            ]);

            $membership = $payment->membership;

            $lastMembership = Membership::where('member_id',$membership->member_id)
            ->whereIn('status',['active','schedule'])
            ->where('id','!=',$membership->id)
            ->orderBy('end','desc')
            ->first();


            if($lastMembership && Carbon::parse($lastMembership->end)->isFuture()){
                $start = Carbon::parse($lastMembership->end);
                $status = 'schedule';
            }else{
                $start = now();
                $status = 'active';
            }
 
            switch($membership->paket->durasi_satuan){
                case 'day':
                    $end = $start->copy()->addDays($membership->paket->durasi_angka);
                    break;
                case 'month':
                    $end = $start->copy()->addMonths($membership->paket->durasi_angka);
                    break;
                case 'year':
                    $end = $start->copy()->addYears($membership->paket->durasi_angka);
            }
                

                $membership->update([
                    'start' => $start,
                    'end' => $end,
                    'status' => $status,
                ]);

            $payment->membership->member->update([
                'status' => 'active'
            ]);

        } elseif ($request->transaction_status === 'pending') {

            $payment->update(['status' => 'pending']);

        } else {

            $payment->update(['status' => 'failed']);

        }

        return response()->json(['message' => 'OK']);
    }
}
