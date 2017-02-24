<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Pegawai</div>

                <div class="panel-body">
                    <a href="<?php echo e(url('/gawai')); ?>" class="btn btn-success">Kembali</a><br>
                    <?php echo Form::model($pegawai,['method'=>'PATCH','route'=>['gawai.update',$pegawai->id],'files'=>'true']); ?>

                        <label>NIP</label>
                        <input type="text" name="nip" value="<?php echo e($pegawai->nip); ?>" class="form-control"><br>
                        <div class="form-group">
                            <label for="jabatan_id" class="form-group">Nama Jabatan</label>
                            <div class="form-group">
                                <select name="jabatan_id" class="form-control">
                                    <?php $__currentLoopData = $jabatann; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama_jabatan); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="golongan_id" class="form-group">Nama Golongan</label>
                            <div class="form-group">
                                <select name="golongan_id" class="form-control">
                                    <?php $__currentLoopData = $golongann; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama_golongan); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="photo" class="form-group">Photo</label>
                            <img src="<?php echo e(asset('img/'.$pegawai->photo.'')); ?>" width="75" height="75" class="img-rounded img-responsive" alt="Responsive image">
                                <input type="file" name="photo" class="form-control" nullable>
                        </div>
                        <div class="form-group">
                            <?php echo Form::submit('Ubah',['class'=>'btn btn-success form-control']); ?>

                        </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>