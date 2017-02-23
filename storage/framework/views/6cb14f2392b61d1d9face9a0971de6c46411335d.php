<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">Tambah Tunjangan Pegawai</div>

                <div class="panel-body">
                    <center><a href="<?php echo e(url('/tp/create')); ?>" class="btn btn-success">Tambah Tunjangan Pegawai</a></center><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode Tunjangan</td>
                                <td>Nama Pegawai</td>
                                <td colspan="2">Pilihan:</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=1;
                             ?>
                            <?php $__currentLoopData = $tupe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($data->Tunjangan->kode_tunjangan); ?></td>
                                    <td><?php echo e($data->Pegawai->User->name); ?></td>
                                    <td><a href="<?php echo e(route('tp.edit',$data->id)); ?>" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    <?php echo Form::open(['method' => 'DELETE', 'route'=>['tp.destroy', $data->id]]); ?>

                                    <?php echo Form::submit('Hapus', ['class' => 'btn btn-danger']); ?>

                                    <?php echo Form::close(); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>