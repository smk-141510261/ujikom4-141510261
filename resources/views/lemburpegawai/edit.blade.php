@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Lembur Pegawai</div>

                <div class="panel-body">
                    <a href="{{url('/lembur')}}" class="btn btn-success btn-block">Kembali</a><br>
                    {!! Form::model($lemburpe,['method'=>'PATCH','route'=>['kategori.update',$lemburpe->id]])!!}
                    
                    <label>Kode Lembur</label>
                    <select name="kode_lembur_id" class="form-control" required>
                        @foreach($katlembur as $data)
                        <option value="{{$data->id}}">{{$data->Jabatan->nama_jabatan}}</option>
                        @endforeach
                    </select><br>
                    <label>Nama Pegawai</label>
                    <select name="pegawai_id" class="form-control" required>
                        @foreach($pegawai as $data)
                        <option value="{{$data->id}}">{{$data->User->name}}</option>
                        @endforeach
                    </select><br>
                    
                    <div class="form-group">
                        {!! Form::label('Jumlah Jam','Jumlah Jam')!!}
                        {!! Form::text('jmlh_jam',null,['class'=>'form-control','required'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('save',['class'=>'btn btn-success form-control'])!!}
                    </div>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
