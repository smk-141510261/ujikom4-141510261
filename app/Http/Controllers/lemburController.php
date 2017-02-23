<?php

namespace App\Http\Controllers;
use App\LemburPegawai;
use App\Pegawai;
use Request;
use Validator ;
use App\KategoriLembur ;

class lemburController extends Controller
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
        $lemburpe=LemburPegawai::all();
        return view('lemburpegawai.index',compact('lemburpe'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {   $pegawai=Pegawai::all();
        $katlembur=KategoriLembur::all();
        return view('lemburpegawai.create',compact('katlembur','pegawai'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lemburpe=request::all();
        LemburPegawai::create($lemburpe);
        return redirect('lembur');
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
        $pegawai=Pegawai::all();
        $katlembur=KategoriLembur::all();
        $lemburpe=LemburPegawai::find($id);
        return view('lemburpegawai.edit',compact('lemburpe','pegawai','katlembur'));
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
        $lemburupdate=Request::all();
        $lemburpe=LemburPegawai::find($id);
        $lemburpe->update($lemburupdate);
        return redirect('lembur');
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
        LemburPegawai::find($id)->delete();
        return redirect('lembur');
    }
}