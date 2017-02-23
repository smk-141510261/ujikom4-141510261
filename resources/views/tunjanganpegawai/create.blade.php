@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Tunjangan Pegawai</div>

                <div class="panel-body">
                    <a href="{{url('/tp')}}" class="btn btn-success">Kembali</a><br>
                    {!! Form::open(['url'=>'tp'])!!}
                                        
                    <label>Kode Tunjangan</label>
                    <select name="kode_tunjangan_id" class="form-control" required>
                        @foreach($tunjangann as $data)
                        <option value="{{$data->id}}">{{$data->kode_tunjangan}}</option>
                        @endforeach
                    </select><br>
                    <label>Nama Pegawai</label>
                    <select name="pegawai_id" class="form-control" required>
                        @foreach($pegawai as $data)
                        <option value="{{$data->id}}">{{$data->User->name}}</option>
                        @endforeach
                    </select><br>
                    
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
