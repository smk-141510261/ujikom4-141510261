<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Lembur Pegawai</div>

                <div class="panel-body">
                    <center><a href="<?php echo e(url('/lembur/create')); ?>" class="btn btn-success">Tambah Lembur Pegawai</a></center><br>
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
                            <?php 
                            $i=1;
                             ?>
                            <?php $__currentLoopData = $lemburpe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($data->KategoriLembur->kode_lembur); ?></td>
                                    <td><?php echo e($data->Pegawai->nip); ?>

                                    <td><?php echo e($data->Pegawai->User->name); ?></td>
                                    <td><?php echo e($data->Pegawai->Jabatan->nama_jabatan); ?></td>
                                    <td><?php echo e($data->Pegawai->Golongan->nama_golongan); ?></td>
                                    <td><?php echo e($data->jmlh_jam); ?></td>
                                    <th><center><?php echo 'Rp.'. number_format($data->KategoriLembur->besaran_uang*$data->jmlh_jam,
                                    2,",","."); ?></center>
                                    <td><a href="<?php echo e(route('lembur.edit',$data->id)); ?>" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    <?php echo Form::open(['method' => 'DELETE', 'route'=>['lembur.destroy', $data->id]]); ?>

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