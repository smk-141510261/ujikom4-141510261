<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Tunjangan Pegawai</div>

                <div class="panel-body">
                    <a href="<?php echo e(url('/tp')); ?>" class="btn btn-success">Kembali</a><br>
                    <?php echo Form::model($tupe,['method'=>'PATCH','route'=>['tp.update',$tupe->id]]); ?>

                    <label>Kode Tunjangan</label>
                    <select name="kode_tunjangan_id" class="form-control" required>
                        <?php $__currentLoopData = $tunjangann; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->kode_tunjangan); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </select><br>
                    <label>Nama Pegawai</label>
                    <select name="pegawai_id" class="form-control" required>
                        <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->User->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </select><br>
                    
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