@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">Kategori Lembur</div>

                <div class="panel-body">
                    <center><a href="{{url('/kategori/create')}}" class="btn btn-success">Tambah Kategori Lembur</a></center><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode Lembur</td>
                                <td>Nama Jabatan</td>
                                <td>Nama Golongan</td>
                                <td>Besaran Uang</td>
                                <td colspan="2">Pilihan:</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($katlembur as $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ $data->kode_lembur }}</td>
                                    <td>{{ $data->Jabatan->nama_jabatan }}</td>
                                    <td>{{ $data->Golongan->nama_golongan }}</td>
                                    <td>{{ $data->besaran_uang }}</td>
                                    <td><a href="{{route('kategori.edit',$data->id)}}" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['kategori.destroy', $data->id]]) !!}
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
