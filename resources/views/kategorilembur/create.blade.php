@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Kategori Lembur</div>

                <div class="panel-body">
                    <a href="{{url('/kategori')}}" class="btn btn-success">Kembali</a><br>
                    {!! Form::open(['url'=>'kategori'])!!}
                    <div class="form-group">
                        {!! Form::label('Kode Kategori Lembur','Kode Kategori Lembur')!!}
                        {!! Form::text('kode_lembur',null,['class'=>'form-control','required'])!!}
                    </div>
                    <label>Nama Jabatan</label>
                    <select name="jabatan_id" class="form-control" required>
                        @foreach($jabatann as $data)
                        <option value="{{$data->id}}">{{$data->nama_jabatan}}</option>
                        @endforeach
                    </select><br>
                    <label>Nama Golongan</label>
                    <select name="golongan_id" class="form-control" required>
                        @foreach($golongann as $data)
                        <option value="{{$data->id}}">{{$data->nama_golongan}}</option>
                        @endforeach
                    </select><br>
                    
                    <div class="form-group">
                        {!! Form::label('Besaran Uang','Besaran Uang')!!}
                        {!! Form::text('besaran_uang',null,['class'=>'form-control','required'])!!}
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
