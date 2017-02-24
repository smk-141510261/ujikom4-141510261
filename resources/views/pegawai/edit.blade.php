@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Pegawai</div>

                <div class="panel-body">
                    <a href="{{url('/gawai')}}" class="btn btn-success">Kembali</a><br>
                    {!! Form::model($pegawai,['method'=>'PATCH','route'=>['gawai.update',$pegawai->id],'files'=>'true'])!!}
                        <label>NIP</label>
                        <input type="text" name="nip" value="{{$pegawai->nip}}" class="form-control"><br>
                        <div class="form-group">
                            <label for="jabatan_id" class="form-group">Nama Jabatan</label>
                            <div class="form-group">
                                <select name="jabatan_id" class="form-control">
                                    @foreach($jabatann as $data)
                                        <option value="{{$data->id}}">{{$data->nama_jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="golongan_id" class="form-group">Nama Golongan</label>
                            <div class="form-group">
                                <select name="golongan_id" class="form-control">
                                    @foreach($golongann as $data)
                                        <option value="{{$data->id}}">{{$data->nama_golongan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="photo" class="form-group">Photo</label>
                            <img src="{{asset('img/'.$pegawai->photo.'')}}" width="75" height="75" class="img-rounded img-responsive" alt="Responsive image">
                                <input type="file" name="photo" class="form-control" nullable>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Ubah',['class'=>'btn btn-success form-control'])!!}
                        </div>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
