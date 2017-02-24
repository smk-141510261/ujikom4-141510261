@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">Penggajian</div>

                <div class="panel-body">
                    <center><a href="{{url('/penggaji/create')}}" class="btn btn-success">Tambah Penggajian</a></center><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                  <hr>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <td>No.</td>
                          <td>Pegawai</td>
                          <td>Jumlah Jam Lembur</td>
                          <td>Jumlah Uang Lembur</td>
                          <td>Gaji Pokok</td>
                          <td>Total Gaji</td>
                          <td>Tanggal Pengambilan</td>
                          <td>Status Pengambilan</td>
                          <td>Petugas Penerima</td>
                          <td>Pilihan:</td>
                        </tr>
                      </thead>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($gajian as $data)
                            <tbody>
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->TunjanganPegawai->Pegawai->User->name}}</td>
                                    <td>{{$data->jumlah_jam_lembur}} </td>
                                    <td>{{$data->jumlah_uang_lembur}} </td>
                                    <td>{{$data->gaji_pokok}} </td>
                                    <td>{{$data->total_gaji}} </td>
                                    <td>{{$data->updated_at}} </td>
                                    
                                    @if($data->status_pengambilan == 0)
                                    
                                        <td>Belum Diambil </td>
                                    
                                    @endif
                                    @if($data->status_pengambilan == 1)
                                    
                                        <td>Sudah Diambil</td>
                                    
                                    @endif
                                  <td>{{$data->petugas_penerima}} </td>
                                  <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['penggaji.destroy', $data->id]]) !!}
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
             
              
           