<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LemburPegawai extends Model
{
    //
    protected $table='lembur_pegawais';
    protected $fillable=array('kode_lembur_id','pegawai_id','jmlh_jam');
    protected $visible=array('kode_lembur_id','pegawai_id','jmlh_jam');
   public $timestamps=true;
   
    public function KategoriLembur(){
    	return $this->belongsTo('App\KategoriLembur','kode_lembur_id');
    }

    public function Pegawai(){
    	return $this->belongsTo('App\Pegawai','pegawai_id');
    }
}
