@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Tunjangan</div>

                <div class="panel-body">
                    <center><a href="{{url('/tunjang/create')}}" class="btn btn-success">Tambah Tunjangan</a></center><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode Tunjangan</td>
                                <td>Nama Jabatan</td>
                                <td>Nama Golongan</td>
                                <td>Status</td>
                                <td>Jumlah Anak</td>
                                <td>Besaran Uang</td>
                                <td colspan="2">Pilihan:</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($tunjangann as $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ $data->kode_tunjangan }}</td>
                                    <td>{{ $data->Jabatan->nama_jabatan }}</td>
                                    <td>{{ $data->Golongan->nama_golongan }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>{{ $data->jumlah_anak }}</td>
                                    <td>{{ $data->besaran_uang }}</td>
                                    <td><a href="{{route('tunjang.edit',$data->id)}}" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['tunjang.destroy', $data->id]]) !!}
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
