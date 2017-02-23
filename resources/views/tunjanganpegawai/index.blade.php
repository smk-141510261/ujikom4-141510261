@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">Tambah Tunjangan Pegawai</div>

                <div class="panel-body">
                    <center><a href="{{url('/tp/create')}}" class="btn btn-success">Tambah Tunjangan Pegawai</a></center><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode Tunjangan</td>
                                <td>Nama Pegawai</td>
                                <td colspan="2">Pilihan:</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($tupe as $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ $data->Tunjangan->kode_tunjangan }}</td>
                                    <td>{{$data->Pegawai->User->name}}</td>
                                    <td><a href="{{route('tp.edit',$data->id)}}" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['tp.destroy', $data->id]]) !!}
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
</div>
@endsection
