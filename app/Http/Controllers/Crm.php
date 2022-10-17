<?php

namespace App\Http\Controllers;

use App\Models\Crm as ModelsCrm;
use Illuminate\Http\Request;

class Crm extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crm = ModelsCrm::paginate(5);
        return view('crm.index', compact(['crm']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crm.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $crm = ModelsCrm::create([
            'nama_customer' => $request->nama_customer,
            'email_customer' => $request->email_customer,
            'no_hp_customer' => $request->no_hp_customer
        ]);
        $crm->save();

        return redirect()->route('crm.index');
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
        $crm = ModelsCrm::findOrFail($id);

        return view('crm.edit', compact(['crm']));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelsCrm::destroy($id);
        return redirect()->route('crm.index');
    }
}
