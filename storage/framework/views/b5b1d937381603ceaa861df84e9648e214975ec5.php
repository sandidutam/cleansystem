

<?php $__env->startSection('title'); ?>
    Data User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('user.active'); ?>
active
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('userindex.active'); ?>
active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('user.show'); ?>
show
<?php $__env->stopSection(); ?>

<?php echo $__env->yieldContent('user.id'); ?>

<?php $__env->startSection('content'); ?>
    
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    

    <a href="<?php echo e(route('pegawai.create')); ?>" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm">
        <i class="fas fa-plus-circle fa-sm text-white-50"></i> Data Baru</a>
</div>


    
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">  
                <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <tr >
                        <th>NO</th>
                        <th>NOMOR PEGAWAI</th>
                        <th>NAMA LENGKAP</th>
                        <th>JABATAN</th>
                        <th>ROLE</th>
                        <th>AKSI</th>
                    </tr>
                
                    <?php $i = 1; ?>
                    <?php $__empty_1 = true; $__currentLoopData = $data_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr >
                        <td><?= $i; ?></td>
                        <td><?php echo e($user->nomor_pegawai); ?></td>
                        <td><a href="<?php echo e(route('user.show', $user->id)); ?>"><?php echo e($user->nama_lengkap); ?></a></td>
                        <td><?php echo e($user->jabatan); ?></td>
                        <td><?php echo e($user->role); ?></td>
                        <td>
                            <div class="row">
                                <div class="col-4">
                                    <a href="<?php echo e(route('user.edit', $user->id)); ?>" class="btn btn-md btn-warning d-flex align-items-center" type="button"><i class="fas fa-edit mr-1"></i> Edit</a>
                                </div>
                                <div class="col-4">                               
                                    <form action="<?php echo e(route('user.destroy', $user->id)); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-md btn-danger d-flex align-items-center"><i class="fas fa-trash mr-1"></i> Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 
                    <tr>
                        <td colspan="11" class="text-center text-white bg-secondary"><i><b>TIDAK ADA DATA UNTUK DITAMPILKAN</b></i></td>
                    </tr>
                    <?php endif; ?>
                </table>  
        </div>
    </div>
</div>
<?php echo e($data_user->links()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cleansystem\resources\views/user/index.blade.php ENDPATH**/ ?>