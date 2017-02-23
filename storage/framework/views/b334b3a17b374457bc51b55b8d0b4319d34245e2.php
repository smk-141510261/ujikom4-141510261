<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">Penggajian</div>

                <div class="panel-body">
                    <center><a href="<?php echo e(url('/gaji/create')); ?>" class="btn btn-success">Tambah Penggajian</a></center><br>
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
                            <?php 
                            $i=1;
                             ?>
                            <?php $__currentLoopData = $gajian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($data->TunjanganPegawai->Tunjangan->kode_tunjangan); ?></td>
                                    <td><?php echo e($data->jumlah_jam_lembur); ?>

                                    <td><?php echo e($data->jumlah_uang_lembur); ?></td>
                                    <th><center><?php echo 'Rp.'. number_format($data->TunjanganPegawai->Tunjangan->Jabatan
                                    ->besaran_uang+$data->TunjanganPegawai->Tunjangan->Golongan
                                    ->besaran_uang,2,",","."); ?></center>
                                    <td><?php echo e($data->total_gaji); ?></td>
                                    <td><?php echo e($data->tgl_pengambilan); ?></td>
                                    <td><?php echo e($data->status_pengambilan); ?></td>
                                    <td><?php echo e($data->petugas_penerima); ?></td>
                                    <td><a href="<?php echo e(route('gaji.edit',$data->id)); ?>" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    <?php echo Form::open(['method' => 'DELETE', 'route'=>['gaji.destroy', $data->id]]); ?>

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