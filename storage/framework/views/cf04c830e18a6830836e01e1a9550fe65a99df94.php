

<?php $__env->startSection('title'); ?>
    Presensi Masuk
<?php $__env->stopSection(); ?>

<?php $__env->startSection('presensi.active'); ?>
active 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('presensi.show'); ?>
show 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('indexin.active'); ?>
active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(session('notifikasi_sukses')): ?>
<div class="alert alert-success mt-4" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="fa fa-check-circle"></i>
    <?php echo e(session('notifikasi_sukses')); ?>

</div>
<?php endif; ?>

<?php if(session('notifikasi_gagal')): ?>
<div class="alert alert-danger alert-dismissable mt-4 fade show" role="alert">
    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="fa fa-exclamation-triangle"></i>
    <?php echo e(session('notifikasi_gagal')); ?>

</div>
<?php endif; ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Menu Presensi Masuk</h4>
    </div>

    <div class="card-body">
        <br>


        <div class="row">
            <div class="col">
                <form action="<?php echo e(route('presensi.indexin')); ?> " method="GET">
                    <div class="row">
                        <label for="search" class="text-danger fst-italic fw-bold" style="">*Masukkan Nomor Pegawai</label>
                    </div>
                    <div class="row <?php echo e($errors->has('search') ? 'has-error' : ''); ?> ">
                        <div class="col-6">
                            <input type="text" name="search" id="search" class="form-control" placeholder="contoh : PGW-2020001" aria-describedby="helpId" autocomplete="off">
                        </div>
                        <div class="col-3 ml-2">
                            <button type="submit" class="btn btn-outline-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                                Cari
                            </button>
                        </div>
                        <?php if($errors->has('search')): ?>
                            <span class="help-block text-danger"><?php echo e($errors->first('search')); ?></span>
                        <?php endif; ?>
                    </div>   
                </form>
            </div>
            <div class="col"></div>
        </div>
        <br>
        <br>

        <table class="table table-sm table-hover table-striped">
            
            <tr class="text-center">
                <th>NO</th>
                <th>NOMOR PEGAWAI</th>
                <th>NAMA LENGKAP</th>
                <th>JABATAN</th>
                <th>SEKTOR</th>
                <th>AKSI</th>
            </tr>
        
            <?php $i = 1; ?>
            <?php $__empty_1 = true; $__currentLoopData = $data_pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            
            <tr class="text-center">
                <td><?= $i; ?></td>
                <td><?php echo e($pegawai->nomor_pegawai); ?></td>
                <td><?php echo e($pegawai->nama_lengkap); ?></td>
                <td><?php echo e($pegawai->jabatan); ?></td>
                <td><?php echo e($pegawai->sektor_area); ?></td>
                <td>
                    <div class="row">
                        <div class="col">
                            <a href="<?php echo e(route('presensi.checkin', $pegawai->id)); ?>" class="btn btn-md btn-success" type="button">Presensi Masuk</a>
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cleansystem\resources\views/presensi/indexIn.blade.php ENDPATH**/ ?>