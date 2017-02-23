@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">Penggajian</div>

                <div class="panel-body">
                    <center><a href="{{url('/gaji/create')}}" class="btn btn-success">Tambah Penggajian</a></center><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode Tunjangan</td>
                                <td>Jumlah Jam Lembur</td>
                                <td>Jumlah Uang Lembur</td>
                                <td>Gaji Pokok </td>
                                <td>Total Gaji</td>
                                <td>Tanggal Pengambilan</td>
                                <td>Status Pengambilan</td>
                                <td>Petugas Penerima</td>
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
                                    <td>{{$data->User->name}}</td>
                                    <td>
                                    @foreach($tunjangan as $tun)
                                        @if($tun->pegawai_id == $data->id)
                                        {{$tun->Tunjangan->besaran_uang}}
                                        @php $satu=$tun->Tunjangan->besaran_uang;;
                                        @endphp
                                    @endforeach
                                    </td>
                                
                                    <td>
                                    @foreach($lembur as $lem)
                                        @if($lem->pegawai_id == $lem->id)
                                        {{$lem->jmlh_jam}}
                                        @php $dua=$lem->jmlh_jam*$lem->KategoriLembur->besaran_uang;
                                        @endphp
                                    @endforeach
                                    </td>

                                     <td>
                                    @foreach($lembur as $lem)
                                        @if($lem->pegawai_id == $lem->id)
                                        {{$lem->jmlh_jam}}
                                        @php $dua=$lem->jmlh_jam*$lem->KategoriLembur->besaran_uang;
                                        @endphp
                                    @endforeach
                                    </td>

                                    <td><a href="{{route('gaji.edit',$data->id)}}" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['gaji.destroy', $data->id]]) !!}
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
