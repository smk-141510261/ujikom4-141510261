<?php

namespace App\Http\Controllers;

use Request;
use App\TunjanganPegawai;
use App\Pegawai;
use App\Tunjangan;

class tunjangpegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('Admin');
    }
    public function index()
    {
        //
        $tupe=TunjanganPegawai::all();
        $tunjangann=Tunjangan::all();
        $pegawai=Pegawai::all();
        return view('tunjanganpegawai.index', compact('tupe', 'tunjangann', 'pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tunjangann=Tunjangan::all();
        $pegawai=Pegawai::all();
        return view('tunjanganpegawai.create', compact('tunjangann', 'pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $tupe=request::all();
        TunjanganPegawai::create($tupe);
        return redirect('tp');
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
        //
        $tupe=TunjanganPegawai::find($id);
        $tunjangann=Tunjangan::all();
        $pegawai=Pegawai::all();
        return view('tunjanganpegawai.edit',compact('tupe','tunjangann','pegawai'));
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
        $tunjanggawaiupdate = Request::all();
        $tupe= TunjanganPegawai::find($id);
        $tupe->update($tunjanggawaiupdate);
        return redirect('tp');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         TunjanganPegawai::find($id)->delete();
        return redirect('tp');
    }
}
