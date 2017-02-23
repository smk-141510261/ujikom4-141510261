<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
            <div class="panel panel-warning">
                <div class="panel-heading">Pegawai</div>

                <div class="panel-body">
                    <center><a href="<?php echo e(url('/gawai/create')); ?>" class="btn btn-success">Tambah Pegawai</a></center><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>NIP</td>
                                <td>Nama</td>
                                <td>Jabatan</td>
                                <td>Golongan</td>
                                <td>Foto</td>
                                <td colspan="2">Pilihan:</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=1;
                             ?>
                            <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($data->nip); ?></td>
                                    <td><?php echo e($data->User->name); ?></td>
                                    <td><?php echo e($data->Jabatan->nama_jabatan); ?></td>
                                    <td><?php echo e($data->Golongan->nama_golongan); ?></td>
                                    <td><img src="<?php echo e(asset('img/'.$data->photo.'')); ?>" width="75" height="75" class="img-rounded img-responsive" alt="Responsive image"></td>
                                    <td><a href="<?php echo e(route('gawai.edit',$data->id)); ?>" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    <?php echo Form::open(['method' => 'DELETE', 'route'=>['gawai.destroy', $data->id]]); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>