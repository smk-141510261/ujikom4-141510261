<?php

namespace App\Http\Controllers;

use Request;
use App\Golongan;
use Validator;
use Input;

class golonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('HRD');
    }
    public function index()
    {
        //
        $golongann=Golongan::all();
        return view('golongan.index', compact('golongann'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('golongan.create');
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
        
        /*$rules=['kode_golongan' => 'required|unique:golongans,kode_golongan',
                'nama_golongan' => 'required','besaran_uang' => 'required'];

        $sms=['kode_golongan.required' => 'tidak boleh kosong',
              'nama_golongan.required' => 'tidak boleh kosong',
              'besaran_uang.required' => 'tidak boleh kosong',
                ];
        $validasi = Validator::make(Input::all(),$rules,$sms);
        if($validasi->fails()){
            return redirect()->back()
            ->withErrors($validasi)
            ->withInput();
        }*/

        $golongann=Request::all();
        Golongan::create($golongann);
        return redirect ('golong');
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
        $golongann=Golongan::find($id);
        return view('golongan.edit',compact('golongann'));
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
        /*$golongan=Golongan::where('id',$id)->first();
        if($golongan['kode_golongan'] != Request('kode_golongan')){
            $rules=['kode_golongan' => 'required|unique:golongans,kode_golongan',
                'nama_golongan' => 'required','besaran_uang' => 'required'];
        }
        else{
            $rules=['kode_golongan' => 'required',
                'nama_golongan' => 'required','besaran_uang' => 'required'];
        }
        $sms=['kode_golongan.required' => 'tidak boleh kosong',
              'nama_golongan.required' => 'tidak boleh kosong',
              'besaran_uang.required' => 'tidak boleh kosong',
                ];
        $validasi = Validator::make(Input::all(),$rules,$sms);
        if($validasi->fails()){
            return redirect()->back()
            ->withErrors($validasi)
            ->withInput();
        }*/

        $golonganupdate = Request::all();
        $golongann= Golongan::find($id);
        $golongann->update($golonganupdate);
        return redirect('golong');
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
        Golongan::find($id)->delete();
        return redirect('golong');
    }
}
