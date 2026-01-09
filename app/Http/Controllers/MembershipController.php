<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Carbon\Carbon;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\Membership;
use App\Models\Payments;
use Exception;
use Faker\Provider\Payment;
use Illuminate\Support\Facades\DB;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $membership = Membership::with(['member.user','paket'])
        ->latest()->paginate(10);

        return view('membership.index',compact('membership'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::with('user')->get();
    $pakets = Paket::all();
        return view('membership.create',compact('members','pakets'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function simpan(Request $request){
        $request->validate([
            'member_id' => 'required|exists:member,id',
            'paket_id' => 'required|exists:paket,id',
            'metode_bayar' => 'required|string',
        
        ]);

        
        $paket = Paket::findOrFail($request->paket_id);

        $tanggalMulai = Carbon::now();


           if ($paket->durasi_satuan == 'day') {
         $tanggalBerakhir = Carbon::now()->addDays($paket->durasi_angka);
        } elseif ($paket->durasi_satuan == 'month') {
           $tanggalBerakhir = Carbon::now()->addMonths($paket->durasi_angka);
        } elseif ($paket->durasi_satuan == 'year') {
          $tanggalBerakhir = Carbon::now()->addYears($paket->durasi_angka);
        }

       

        DB::transaction(function () use ($request, $paket, $tanggalMulai, $tanggalBerakhir) {

            $member = Member::findOrFail($request->member_id);
        $member->update(['status' => 'active']);
        
          $membership =  Membership::create([
                'member_id' => $request->member_id,
                'paket_id' => $paket->id,
                'start' => $tanggalMulai,
                'end' => $tanggalBerakhir,
                'status' => 'active'
            ]);

            
            Payments::create([
                'membership_id' => $membership->id,
                'order_id' => 'TRZ-' . mt_rand(1000,9999) . '-' . time(),
                'amount' => $paket->harga,
                'payment_type' => $request->metode_bayar,
                'status' => 'success',
                'transaction_status' => 'settlement',
                'paid_at' => now(),
            ]);

            
             });
return redirect()->route('admin.membership.index')
                     ->with('success', 'Membership berhasil ditambahkan ');
           
        }
    public function store(Request $request)
    {

        $request->validate([
            'paket_id' => 'required|exists:paket,id',
        ]);

        $user = Auth::user();
        $member = Member::where('user_id', $user->id)->firstOrFail();
        $activeStatus = Membership::where('member_id', $member->id)
            ->where('status', 'active')->orderBy('end', 'desc')->first();

        if ($activeStatus) {
            $start = Carbon::parse($activeStatus->end);
            $status = 'nonactive';
        } else {
            $start = Carbon::now();
            $status = 'nonactive';
        }


        
        $paket = Paket::findOrFail($request->paket_id);
        $end = $start->copy();


        if ($paket->durasi_satuan == 'day') {
            $end->addDays($paket->durasi_angka);
        } elseif ($paket->durasi_satuan == 'month') {
            $end->addMonths($paket->durasi_angka);
        } elseif ($paket->durasi_satuan == 'year') {
            $end->addYears($paket->durasi_angka);
        }



        $membership = Membership::create([
            'member_id' => $member->id,
            'paket_id' => $paket->id,
            'start' => null,
            'end' => null,
            'status' => $status,
        ]);

        $orderId = 'TRX-' . mt_rand(1000, 9999) . '-' . time();
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;


        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $paket->harga,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'item_details' => [[
                'id' => (string) $paket->id,
                'price' => (int) $paket->harga,
                'quantity' => 1,
                'name' => substr($paket->nama, 0, 50),
            ]],
        ];
        try {
            if (empty(config('services.midtrans.server_key'))) {
                dd("STOP! Server Key Kosong. Cek file .env dan config/services.php kamu!");
            }
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $payment = Payments::create([
                'membership_id' => $membership->id,
                'order_id' => $orderId,
                'amount' =>  $paket->harga,
                'payment_type' => 'midtrans',
                'transaction_status' => 'pending',
                'snap_token' => $snapToken,
            ]);


            return view('pay', compact('payment', 'paket', 'membership'));
        } catch (Exception $e) {
            $membership->delete();
            return back()->with("error", "gagal memproses" . $e->getMessage());
        }
    }
    public function success(Request $request)
    {
        $orderMidtrans = $request->order_id;

        $payments = Payments::where('order_id', $orderMidtrans)->first();

        return view('success', compact('payments'));
    }


    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $membership = Membership::findOrFail($id);

        $membership->payments()->delete();

        // hapus membership
        $membership->delete();

        return redirect()->route('landing')->with("success", "Membership dihapus");
    }
}
