<?php

namespace App\Http\Controllers;

use Request;
use App\Tunjangan;
use App\Jabatan;
use App\Golongan;

class tunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('Keuangan');
    }
    public function index()
    {
        //
        $tunjangann=Tunjangan::all();
        $jabatann=Jabatan::all();
        $golongann=Golongan::all();
        return view('tunjangan.index', compact('tunjangann', 'jabatann', 'golongann'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jabatann=Jabatan::all();
        $golongann=Golongan::all();
        return view('tunjangan.create', compact('jabatann', 'golongann'));
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
        $tunjangann=request::all();
        Tunjangan::create($tunjangann);
        return redirect('tunjang');
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
        $tunjangann=Tunjangan::find($id);
        $jabatann=Jabatan::all();
        $golongann=Golongan::all();
        return view('tunjangan.edit',compact('tunjangann','jabatann','golongann'));
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
        $tunjanganupdate = Request::all();
        $tunjangann= Tunjangan::find($id);
        $tunjangann->update($tunjanganupdate);
        return redirect('tunjang');
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
         Tunjangan::find($id)->delete();
        return redirect('tunjang');
    }
}
