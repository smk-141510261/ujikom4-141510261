@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-warning">
                <div class="panel-heading">Pegawai</div>

                <div class="panel-body">
                    <center><a href="{{url('/gawai/create')}}" class="btn btn-success">Tambah Pegawai</a></center><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>NIP</td>
                                <td>Nama</td>
                                <td>Jabatan</td>
                                <td>Golongan</td>
                                <td>Foto</td>
                                <td colspan="2">Pilihan:</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($pegawai as $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ $data->nip }}</td>
                                    <td>{{ $data->User->name }}</td>
                                    <td>{{ $data->Jabatan->nama_jabatan }}</td>
                                    <td>{{ $data->Golongan->nama_golongan }}</td>
                                    <td><img src="{{asset('img/'.$data->photo.'')}}" width="75" height="75" class="img-rounded img-responsive" alt="Responsive image"></td>
                                    <td><a href="{{route('gawai.edit',$data->id)}}" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['gawai.destroy', $data->id]]) !!}
                                    {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
@endsection
