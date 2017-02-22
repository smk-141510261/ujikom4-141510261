<?php

namespace App\Http\Controllers;

use Request;
use App\TunjanganPegawai;
use App\Penggajian;
use App\Jabatan;
use App\Golongan;
use App\Tunjangan;

class penggajianController extends Controller
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
        $gajian=Penggajian::all();
        $tupe=TunjanganPegawai::all();
        return view('penggajian.index', compact('gajian', 'tupe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tupe=TunjanganPegawai::all();
        return view('penggajian.create', compact('tupe'));
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
        $gajian=request::all();
        Penggajian::create($gajian);
        return redirect('gaji');
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
        $gajian=Penggajian::all();
        $tupe=TunjanganPegawai::all();
        return view('penggajian.index', compact('gajian', 'tupe'));
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
        $gajiupdate = Request::all();
        $gajian= Penggajian::find($id);
        $gajian->update($gajiupdate);
        return redirect('gaji');
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
         Penggajian::find($id)->delete();
        return redirect('gaji');
    }
}
