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

        $gaji = Tunjangan_pegawai::paginate(10);
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
        // dd($penggajian);
       $tunjangan_pegawai=Tunjangan_pegawai::where('id',$i_gaji['tunjangan_pegawai_id'])->first();
       // dd($where);
       $WPenggajian=Penggajian::where('tunjangan_pegawai_id',$tunjangan_pegawai->id)->first();
       // dd($wherepenggajian);
       $tunjangann=Tunjangans::where('id',$tunjangan_pegawai->Kode_tunjangan_id)->first();
       // dd($where);
       $pegawai=Pegawai::where('id',$tunjangan_pegawai->pegawai_id)->first();
       // dd($wherepegawai);
       $kategori_lembur=KategoriLembur::where('jabatan_id',$pegawai->jabatan_id)->where('golongan_id',$pegawai->golongan_id)->first();
       // dd($wherekategorilembur);
       $lembur_pegawai=LemburPegawai::where('pegawai_id',$pegawai->id)->first();
       // dd($wherelemburpegawai);
       $jabatan=Jabatan::where('id',$pegawai->jabatan_id)->first();
       // dd($wherejabatan);
       $golongan=Golongan::where('id',$pegawai->golongan_id)->first();
       // dd($wheregolongan);

       $gaji = new Penggajian ;

       if (isset($WPenggajian)) {
           $error=true ;
           $tunjangan=TunjanganPegawai::paginate(10);
           return view('penggajian.create',compact('tunjangan','error'));
       }
       elseif (!isset($lembur_pegawai)) {
            $nol = 0;
            $gaji->Jumlah_jam_lembur= $nol;
            $gaji->Jumlah_uang_lembur = $nol;
            $gaji->Gaji_pokok=$jabatan->besaran_uang+$golongan->besaran_uang;
            $gaji->Total_gaji=($tunjangan->Jumlah_anak*$tunjangan->Besaran_uang)+($jabatan->Besaran_uang+$golongan->Besaran_uang);
            $gaji->Tanggal_pengambilan = date('d-m-y');
            $gaji->Status_pengambilan = Input::get('Status_pengambilan');
            $gaji->tunjangan_pegawai_id = Input::get('tunjangan_pegawai_id');
            $gaji->Petugas_penerima = Auth::user()->name;
            $gaji->save();
        }
        elseif(!isset($lembur_pegawai) || !isset($kategori_lembur))
        {
            $nol = 0;
            $gaji->Jumlah_jam_lembur= $nol;
            $gaji->Jumlah_uang_lembur = $nol;
            $gaji->Gaji_pokok=$jabatan->Besaran_uang+$golongan->Besaran_uang;
            $gaji->Total_gaji = ($tunjangan->Jumlah_anak*$tunjangan->Besaran_uang)+($jabatan->Besaran_uang+$golongan->Besaran_uang);
            $gaji->Tanggal_pengambilan = date('d-m-y');
            $gaji->Status_pengambilan = Input::get('Status_pengambilan');
            $gaji->tunjangan_pegawai_id = Input::get('tunjangan_pegawai_id');
            $gaji->Petugas_penerima = Auth::user()->name;
            $gaji->save();
        }
        else
        {
            $gaji->Jumlah_jam_lembur=$lembur_pegawai->Jumlah_jam;
            $gaji->Jumlah_uang_lembur =($lembur_pegawai->Jumlah_jam)*($kategori_lembur->Besaran_uang);
            $gaji->Gaji_pokok=$jabatan->Besaran_uang+$golongan->Besaran_uang;
            $gaji->Total_gaji = ($lembur_pegawai->Jumlah_jam*$kategori_lembur->Besaran_uang)+($tunjangan->Jumlah_anak*$tunjangan->Besaran_uang)+($jabatan->Besaran_uang+$golongan->Besaran_uang);
            $gaji->Tanggal_pengambilan = date('d-m-y');
            $gaji->Status_pengambilan = Input::get('Status_pengambilan');
            $gaji->tunjangan_pegawai_id = Input::get('tunjangan_pegawai_id');
            $gaji->Petugas_penerima = Auth::user()->name;
            $gaji->save();
        }
        return redirect('Penggajians');
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
