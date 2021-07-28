

<?php $__env->startSection('title'); ?>
    Riwayat Presensi
<?php $__env->stopSection(); ?>

<?php $__env->startSection('presensi.active'); ?>
active 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('presensi.show'); ?>
show 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('riwayat.active'); ?>
active 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
<?php if(session('notifikasi_sukses')): ?>
<div class="alert alert-success alert-dismissable mt-4 fade show" role="alert">
    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
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

<?php if(session('notifikasi_tidak_masuk')): ?>
<div class="alert alert-warning alert-dismissable mt-4 fade show" role="alert">
    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="fa fa-exclamation-triangle"></i>
    <?php echo e(session('notifikasi_tidak_masuk')); ?>

</div>
<?php endif; ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Riwayat Presensi</h4>
    </div>

    <div class="card-body">
        <br>

        <table class="table table-striped">
        
            <tr>
                <th>NO</th>
                <th>NOMOR PEGAWAI</th>
                <th>NAMA LENGKAP</th>
                <th>JABATAN</th>
                <th>SEKTOR</th>
                <th>TANGGAL</th>
                <th>JAM MASUK</th>
                <th>JAM KELUAR</th>
                <th>CATATAN</th>
                <th>KETERANGAN</th>
                <th>AKSI</th>
            </tr>
        
            <?php $i = 1; ?>
            <?php $__empty_1 = true; $__currentLoopData = $data_presensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?php echo e($pegawai->nomor_pegawai); ?></td>
                <td><?php echo e($pegawai->nama_lengkap); ?></td>
                <td><?php echo e($pegawai->jabatan); ?></td>
                <td><?php echo e($pegawai->sektor_area); ?></td>
                <td><?php echo e(date('d F Y', strtotime($pegawai->tanggal))); ?></td>
                <td>
                    <?php if($pegawai->keterangan == null): ?>
                    <?php echo e($pegawai->jam_masuk); ?>

                    <?php else: ?> 
                    - 
                    <?php endif; ?>
                </td> 
                <td>
                    <?php if($pegawai->keterangan == null): ?>
                    <?php echo e($pegawai->jam_keluar); ?>

                    <?php else: ?> 
                    - 
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($pegawai->keterangan == null): ?>
                    <?php echo e($pegawai->catatan_masuk); ?>dan <?php echo e($pegawai->catatan_keluar); ?>

                    <?php else: ?> 
                    Tidak hadir
                    <?php endif; ?> 
                </td>
                <td>
                    <?php if(isset($pegawai->keterangan)): ?>
                    <?php echo e($pegawai->keterangan); ?>

                    <?php else: ?> 
                    - 
                    <?php endif; ?>
                </td>
                <td>
                    <div class="row">
                        <div class="col-4">
                            <form action="<?php echo e(route('presensi.destroy', $pegawai->id)); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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
        <?php echo e($data_presensi->links()); ?>

        

    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cleansystem\resources\views/presensi/history.blade.php ENDPATH**/ ?>