@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="{{url('/penggaji')}}" class="btn btn-success">Kembali</a><br>
                    {!! Form::open(['url'=>'penggaji'])!!}
            <div class="form-group">
            {!! Form::label('Pegawai', 'Pegawai ') !!}
            <select class="form-control col-md-7 col-xs-12" name="tunjangan_pegawai_id">
            <option> NIP || Nama Pegawai </option>
            @foreach($gaji as $data)
                <option value="{{$data->id}}">{{$data->Pegawai->nip}}&nbsp;|&nbsp;{{$data->Pegawai->User->name}}</option>
            @endforeach
            </select>
      </div>
    <div class="form-group">
            {!! Form::label('Status Pengambilan', 'Status Pengambilan ') !!}
             <select name="status_pengambilan" class="form-control">
                <option value="0">Belum Diambil</option>
                <option value="1">Sudah Diambil</option>
            </select>
        </div>
     <div class="col-md-6 col-sm-6 col-xs-12">
      <span class="help-block">
            {{$errors->first('tunjangan_pegawai_id')}}
          </span>
            <div>
            @if(isset($error))
            Check Lagi Gaji Sudah Ada
            @endif
            </div>
            </div>
       <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              {!! Form::submit('Simpan', ['class' => 'btn btn-success form-control']) !!}
          </div>
      </div>
    </div>
    {!! Form::close() !!}
          </div>
          </div>
          </div>
          </div>     
    </div>
@endsection
