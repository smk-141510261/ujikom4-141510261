<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Lembur Pegawai</div>

                <div class="panel-body">
                    <a href="<?php echo e(url('/lembur')); ?>" class="btn btn-success">Kembali</a></br>
                    <?php echo Form::model($lemburpe,['method'=>'PATCH','route'=>['lembur.update',$lemburpe->id]]); ?>


                    <label>Kode Lembur</label>
                    <select name="kode_lembur_id" class="form-control" required>
                        <?php $__currentLoopData = $katlembur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->kode_lembur); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </select><br>

                    <label>Nama Pegawai</label>
                    <select name="pegawai_id" class="form-control" required>
                        <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->User->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </select><br>

                    <div class="form-group">
                        <?php echo Form::label('Jumlah jam', 'Jumlah jam'); ?>

                        <?php echo Form::text('jmlh_jam',null,['class'=>'form-control','required']); ?>

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