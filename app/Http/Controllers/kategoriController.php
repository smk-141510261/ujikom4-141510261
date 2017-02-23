<?php

namespace App\Http\Controllers;

use Request;
use App\KategoriLembur;
use App\Jabatan;
use App\Golongan;
use Validator;
use Input;

class kategoriController extends Controller
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
        $katlembur=KategoriLembur::all();
        $jabatann=Jabatan::all();
        $golongann=Golongan::all();
        return view('kategorilembur.index', compact('katlembur', 'jabatann', 'golongann'));
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
        return view('kategorilembur.create', compact('jabatann', 'golongann'));
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

        $katlembur=request::all();
        KategoriLembur::create($katlembur);
        return redirect('kategori');
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
        $katlembur=KategoriLembur::find($id);
        $jabatann=Jabatan::all();
        $golongann=Golongan::all();
        return view('kategorilembur.edit',compact('katlembur','jabatann','golongann'));
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
        $kategoriupdate = Request::all();
        $katlembur= KategoriLembur::find($id);
        $katlembur->update($kategoriupdate);
        return redirect('kategori');
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
        KategoriLembur::find($id)->delete();
        return redirect('kategori');
    }
}
