<?php

namespace App\Http\Controllers;

use App\Models\Crm;
use App\Models\Penjualan as ModelsPenjualan;
use Illuminate\Http\Request;

class Penjualan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = ModelsPenjualan::paginate(5);
        return view('penjualan.index', compact(['penjualan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $crms = Crm::all();
        return view('penjualan.tambah', compact(['crms']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penjualan = ModelsPenjualan::create([
            'nama_customer' => $request->nama_customer,
            'nama_produk' => $request->nama_produk,
            'ukuran' => $request->ukuran,
            'harga_produk' => $request->harga_produk,
            'jenis_produk' => $request->jenis_produk,
        ]);

        $penjualan->save();

        return redirect()->route('penjualan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crms = Crm::all();
        $penjualan = ModelsPenjualan::findOrFail($id);

        return view('penjualan.edit',  compact(['penjualan', 'crms']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $penjualan = ModelsPenjualan::findOrFail($id);

        $penjualan->nama_customer = $request->nama_customer;
        $penjualan->nama_produk = $request->nama_produk;
        $penjualan->ukuran = $request->ukuran;
        $penjualan->harga_produk = $request->harga_produk;
        $penjualan->jenis_produk = $request->jenis_produk;

        $penjualan->save();

        return redirect()->route('penjualan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelsPenjualan::destroy($id);

        return redirect()->route('penjualan.index');
    }
}
