@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Penggajian</div>

                <div class="panel-body">
                    <a href="{{url('/gaji')}}" class="btn btn-success">Kembali</a><br>
                    {!! Form::open(['url'=>'gaji'])!!}
                                        
                    <label>Kode Tunjangan</label>
                    <select name="tunjangan_pegawai_id" class="form-control" required>
                        @foreach($tupe as $data)
                        <option value="{{$data->id}}">{{$data->Tunjangan->kode_tunjangan}}</option>
                        @endforeach
                    </select><br>

                    <div class="form-group">
                        {!! Form::label('Jumlah jam lembur', 'Jumlah jam lembur') !!}
                        {!! Form::text('jumlah_jam_lembur',null,['class'=>'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Jumlah uang lembur', 'Jumlah uang lembur') !!}
                        {!! Form::text('jumlah_uang_lembur',null,['class'=>'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Total Gaji', 'Total Gaji') !!}
                        {!! Form::text('total_gaji',null,['class'=>'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Tanggal Pengambilan', 'Tanggal Pengambilan') !!}
                        {!! Form::date('tgl_pengambilan',null,['class'=>'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Status Pengambilan', 'Status Pengambilan') !!}
                        {!! Form::text('status_pengambilan',null,['class'=>'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Petugas Penerima', 'Petugas Penerima') !!}
                        {!! Form::text('petugas_penerima',null,['class'=>'form-control','required']) !!}
                    </div>
                    
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
