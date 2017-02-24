<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">Penggajian</div>

                <div class="panel-body">
                    <center><a href="<?php echo e(url('/penggaji/create')); ?>" class="btn btn-success">Tambah Penggajian</a></center><br>
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
                            <?php 
                            $no = 1;
                             ?>
                            <?php $__currentLoopData = $gajian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tbody>
                                <tr>
                                    <td><?php echo e($no++); ?></td>
                                    <td><?php echo e($data->TunjanganPegawai->Pegawai->User->name); ?></td>
                                    <td><?php echo e($data->jumlah_jam_lembur); ?> </td>
                                    <td><?php echo e($data->jumlah_uang_lembur); ?> </td>
                                    <td><?php echo e($data->gaji_pokok); ?> </td>
                                    <td><?php echo e($data->total_gaji); ?> </td>
                                    <td><?php echo e($data->updated_at); ?> </td>
                                    
                                    <?php if($data->status_pengambilan == 0): ?>
                                    
                                        <td>Belum Diambil </td>
                                    
                                    <?php endif; ?>
                                    <?php if($data->status_pengambilan == 1): ?>
                                    
                                        <td>Sudah Diambil</td>
                                    
                                    <?php endif; ?>
                                  <td><?php echo e($data->petugas_penerima); ?> </td>
                                  <td>
                                    <?php echo Form::open(['method' => 'DELETE', 'route'=>['penggaji.destroy', $data->id]]); ?>

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