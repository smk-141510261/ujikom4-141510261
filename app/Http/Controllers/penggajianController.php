<?php

namespace App\Http\Controllers;

use Request;
use App\TunjanganPegawai;
use App\Penggajian;
use App\Jabatan;
use App\Golongan;
use App\Tunjangan;
use App\Pegawai;
use App\LemburPegawai;
use Input;
use App\KategoriLembur;
use Auth;

class penggajianController extends Controller
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
        $gajian = Penggajian::paginate(3);
        return view('penggajian.index',compact('gajian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $gaji = TunjanganPegawai::paginate(10);
        return view('penggajian.create',compact('gaji')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $i_gaji=Input::all();
        $tunjangan_pegawai=TunjanganPegawai::where('id',$i_gaji['tunjangan_pegawai_id'])->first();
        $WPenggajian=Penggajian::where('tunjangan_pegawai_id',$tunjangan_pegawai->id)->first();
        $tunjangan=Tunjangan::where('id',$tunjangan_pegawai->kode_tunjangan_id)->first();
        $pegawai=Pegawai::where('id',$tunjangan_pegawai->pegawai_id)->first();
        $kategori_lembur=KategoriLembur::where('jabatan_id',$pegawai->jabatan_id)->where('golongan_id',$pegawai->golongan_id)->first();
        $lembur_pegawai=lemburPegawai::where('pegawai_id',$pegawai->id)->first();
        $jabatan=Jabatan::where('id',$pegawai->jabatan_id)->first();
        $golongan=Golongan::where('id',$pegawai->golongan_id)->first();
       

       $gaji = new Penggajian ;

       if (isset($WPenggajian)) {
           $error=true ;
           $tunjangan=TunjanganPegawai::paginate(10);
           return view('penggajian.create',compact('tunjangan','error'));
       }
       elseif (!isset($lembur_pegawai)) {
            $nol = 0;
            $gaji->jumlah_jam_lembur= $nol;
            $gaji->jumlah_uang_lembur = $nol;
            $gaji->gaji_pokok=$jabatan->besaran_uang+$golongan->besaran_uang;
            $gaji->total_gaji=($tunjangan->jumlah_anak*$tunjangan->besaran_uang)+($jabatan->besaran_uang+$golongan->besaran_uang);
            $gaji->tgl_pengambilan = date('d-m-y');
            $gaji->status_pengambilan = Input::get('status_pengambilan');
            $gaji->tunjangan_pegawai_id = Input::get('tunjangan_pegawai_id');
            $gaji->petugas_penerima = Auth::user()->name;
            $gaji->save();
        }
        elseif(!isset($lembur_pegawai) || !isset($kategori_lembur))
        {
            $nol = 0;
            $gaji->jumlah_jam_lembur= $nol;
            $gaji->jumlah_uang_lembur = $nol;
            $gaji->gaji_pokok=$jabatan->besaran_uang+$golongan->besaran_uang;
            $gaji->total_gaji = ($tunjangan->jumlah_anak*$tunjangan->besaran_uang)+($jabatan->besaran_uang+$golongan->besaran_uang);
            $gaji->tgl_pengambilan = date('d-m-y');
            $gaji->status_pengambilan = Input::get('status_pengambilan');
            $gaji->tunjangan_pegawai_id = Input::get('tunjangan_pegawai_id');
            $gaji->petugas_penerima = Auth::user()->name;
            $gaji->save();
        }
        else
        {
            $gaji->jumlah_jam_lembur=$lembur_pegawai->jmlh_jam;
            $gaji->jumlah_uang_lembur =($lembur_pegawai->jmlh_jam)*($kategori_lembur->besaran_uang);
            $gaji->gaji_pokok=$jabatan->besaran_uang+$golongan->besaran_uang;
            $gaji->total_gaji = ($lembur_pegawai->jmlh_jam*$kategori_lembur->besaran_uang)+($tunjangan->jumlah_anak*$tunjangan->besaran_uang)+($jabatan->besaran_uang+$golongan->besaran_uang);
            $gaji->tgl_pengambilan = date('d-m-y');
            $gaji->status_pengambilan = Input::get('status_pengambilan');
            $gaji->tunjangan_pegawai_id = Input::get('tunjangan_pegawai_id');
            $gaji->petugas_penerima = Auth::user()->name;
            $gaji->save();
        }
        return redirect('penggaji');
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
        return redirect('penggaji');
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
        return redirect('penggaji');
    }
}
