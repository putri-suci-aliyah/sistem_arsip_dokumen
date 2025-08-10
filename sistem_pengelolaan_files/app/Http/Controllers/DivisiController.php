<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Divisi::orderBy('id','asc')->get();;
        return view('pages.divisi.index')->with('data', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.divisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_divisi' => ['unique:divisis,kode_divisi'],
        ],[
            'kode_divisi.unique' => 'Kode divisi sudah ada di database',
            
        ]);

        $divisi = new Divisi();
        $divisi->kode_divisi = $request->kode_divisi;
        $divisi->nama_divisi = $request->nama_divisi;
        $divisi->keterangan = $request->keterangan;
        $divisi->save();
        
        return redirect()->to('divisi')->with('success', 'Data divisi berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Divisi $divisi)
    {
        $data = $divisi;
        return view('pages.divisi.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Divisi $divisi)
    {
        
        $data = [
            'nama_divisi'=>$request->nama_divisi,
            'keterangan'=>$request->keterangan,
        ];

        $divisi->update($data);
        return redirect()->to('divisi')->with('success', 'Data divisi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Divisi $divisi)
    {
        $divisi->delete();
        return redirect()->to('divisi')->with('success', 'Data divisi berhasil dihapus');
    }
}
