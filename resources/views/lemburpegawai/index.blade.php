@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Lembur Pegawai</div>

                <div class="panel-body">
                    <center><a href="{{url('/lembur/create')}}" class="btn btn-success">Tambah Lembur Pegawai</a></center><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode Lembur</td>
                                <td>Nip </td>
                                <td>Nama Pegawai</td>
                                <td>Jabatan </td>
                                <td>Golongan</td>
                                <td>Jumlah Jam</td>
                                <td>Besaran uang</td>
                                <td colspan="2">Pilihan:</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($lemburpe as $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$data->KategoriLembur->kode_lembur}}</td>
                                    <td>{{$data->Pegawai->nip}}
                                    <td>{{$data->Pegawai->User->name}}</td>
                                    <td>{{$data->Pegawai->Jabatan->nama_jabatan}}</td>
                                    <td>{{$data->Pegawai->Golongan->nama_golongan}}</td>
                                    <td>{{$data->jmlh_jam }}</td>
                                    <th><center><?php echo 'Rp.'. number_format($data->KategoriLembur->besaran_uang*$data->jmlh_jam,
                                    2,",","."); ?></center>
                                    <td><a href="{{route('lembur.edit',$data->id)}}" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['lembur.destroy', $data->id]]) !!}
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
