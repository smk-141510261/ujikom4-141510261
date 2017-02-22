<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Penggajian</div>

                <div class="panel-body">
                    <a href="<?php echo e(url('/gaji')); ?>" class="btn btn-success btn-block">Kembali</a><br>
                    <?php echo Form::open(['url'=>'gaji']); ?>

                                        
                    <label>Kode Tunjangan</label>
                    <select name="tunjangan_pegawai_id" class="form-control" required>
                        <?php $__currentLoopData = $tupe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->Tunjangan->kode_tunjangan); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </select><br>

                    <div class="form-group">
                        <?php echo Form::label('Jumlah jam lembur', 'Jumlah jam lembur'); ?>

                        <?php echo Form::text('jumlah_jam_lembur',null,['class'=>'form-control','required']); ?>

                    </div>

                    <div class="form-group">
                        <?php echo Form::label('Jumlah uang lembur', 'Jumlah uang lembur'); ?>

                        <?php echo Form::text('jumlah_uang_lembur',null,['class'=>'form-control','required']); ?>

                    </div>

                    <div class="form-group">
                        <?php echo Form::label('Total Gaji', 'Total Gaji'); ?>

                        <?php echo Form::text('total_gaji',null,['class'=>'form-control','required']); ?>

                    </div>

                    <div class="form-group">
                        <?php echo Form::label('Tanggal Pengambilan', 'Tanggal Pengambilan'); ?>

                        <?php echo Form::date('tgl_pengambilan',null,['class'=>'form-control','required']); ?>

                    </div>

                    <div class="form-group">
                        <?php echo Form::label('Status Pengambilan', 'Status Pengambilan'); ?>

                        <?php echo Form::text('status_pengambilan',null,['class'=>'form-control','required']); ?>

                    </div>

                    <div class="form-group">
                        <?php echo Form::label('Petugas Penerima', 'Petugas Penerima'); ?>

                        <?php echo Form::text('petugas_penerima',null,['class'=>'form-control','required']); ?>

                    </div>
                    
                    <div class="form-group">
                        <?php echo Form::submit('save',['class'=>'btn btn-success form-control']); ?>

                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>