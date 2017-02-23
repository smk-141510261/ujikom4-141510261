@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Tunjangan</div>

                <div class="panel-body">
                    <a href="{{url('/tunjang')}}" class="btn btn-success">Kembali</a><br>
                    {!! Form::model($tunjangann,['method'=>'PATCH','route'=>['tunjang.update',$tunjangann->id]])!!}
                    <div class="form-group">
                        {!! Form::label('Kode Tunjangan','Kode Tunjangan')!!}
                        {!! Form::text('kode_tunjangan',null,['class'=>'form-control','required'])!!}
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
                    {!! Form::label('Status','Status')!!}
                        <br><input type="radio" value="Menikah" checked id="status" name="status">
                        <label for="status">Menikah</label>
                        <br><input type="radio" value="Belum menikah" checked id="status" name="status">
                        <label for="status">Belum menikah</label>
                        <br><input type="radio" value="Janda" checked id="status" name="status">
                        <label for="status">Janda</label>
                        <br><input type="radio" value="Duda" checked id="status" name="status">
                        <label for="status">Duda</label>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Jumlah Anak','Jumlah Anak')!!}
                        {!! Form::text('jumlah_anak',null,['class'=>'form-control','required'])!!}
                    </div>
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
