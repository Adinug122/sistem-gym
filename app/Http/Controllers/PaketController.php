<?php

namespace App\Http\Controllers;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket = Paket::all();
        return view('paket.index',compact('paket'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('paket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
    {
        // 1. Bersihkan format harga (Hapus Rp dan Titik, ambil angkanya saja)
        $request->merge([
            'harga' => preg_replace('/[^0-9]/', '', $request->harga),
        ]);

        // 2. Validasi Input
        $validatedData = $request->validate([
            'nama'          => 'required|string|max:50',
            'deskripsi'     => 'required|string|max:255',
            'durasi_angka'  => 'required|integer|min:1',
            'durasi_satuan' => 'required|in:day,month,year',
            'harga'         => 'required|integer|min:0',
            'benefits'      => 'nullable|string', // Validasi string karena dari Textarea
        ]);

        // 3. Proses Benefit (Dari String Textarea -> Array JSON)
        $benefitsArray = [];
        if ($request->filled('benefits')) {
            // Pecah string berdasarkan baris baru (Enter)
            // Trim spasi, hapus baris kosong, dan reset index array
            $benefitsArray = array_values(array_filter(array_map('trim', explode(PHP_EOL, $request->benefits))));
        }

        // 4. Masukkan Array Benefit ke data yang akan disimpan
        $validatedData['benefits'] = $benefitsArray;

        // 5. Simpan
        Paket::create($validatedData);

        return redirect()->route('admin.paket.index')->with('success', 'Paket berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paket = Paket::findOrFail($id);

        return view('paket.edit',compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paket = Paket::findOrFail($id);
        $request->merge([
            'harga' => preg_replace('/[^0-9]/', '', $request->harga),
        ]);
      
 
       $validate =  $request->validate([
            'nama' => 'required|string|max:50',
            'deskripsi' => 'required|string|max:255',
            'durasi_angka' => 'required|integer|min:1',
            'durasi_satuan' => 'required|in:day,month,year',
            'harga' => 'required|integer|min:0',
            'benefits' => 'nullable|string',
        ]);  

        $benefitsArray = [];
    
        if ($request->filled('benefits')){
       $benefitsArray = array_filter(array_map('trim',explode(PHP_EOL,$request->benefits)));
        }
      
        $validate['benefits'] = ($benefitsArray);

        $paket->update($validate);

        return redirect()->route('admin.paket.index')->with("success","Paket berhasil diubah");   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paket = Paket::findOrFail($id);

        $paket->delete();

        return redirect()->route('admin.paket.index')->with("success","paket berhasil dihapus");
    }
}
