@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Lembur Pegawai</div>

                <div class="panel-body">
                    <a href="{{url('/lembur/create')}}" class="btn btn-success btn-block">Tambah Lembur Pegawai</a><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode Lembur</td>
                                <td>Nama Pegawai</td>
                                <td>Jumlah Jam</td>
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
                                    <td>{{ $data->KategoriLembur->kode_lembur }}</td>
                                    <td>{{$user->where('id',$data->pegawai->user_id)->first()->name}}</td>
                                    <td>{{ $data->jmlh_jam }}</td>
                                    <th><center><?php echo 'Rp.'. number_format($data->KategoriLembur->besaran_uang*$data->jmlh_jam,
                                    2,",","."); ?></center>
                                    <td><a href="{{route('lembur.edit',$data->id)}}" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['lembur.destroy', $data->id]]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
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
