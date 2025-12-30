<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payments;

class PaymentsCallbackController extends Controller
{
    public function handle(Request $request)
    {
        Log::info('Midtrans Callback Masuk', $request->all());

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

            $payment->membership->update([
                'status' => 'active'
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
