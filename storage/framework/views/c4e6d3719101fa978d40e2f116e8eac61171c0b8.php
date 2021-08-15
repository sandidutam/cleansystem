

<?php $__env->startSection('title'); ?>
    Dashboard Sistem Informasi Pegawai
<?php $__env->stopSection(); ?>

<?php $__env->startSection('dashboard.active'); ?>
active
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('content'); ?>

<div class="card">
    <h1>Welcome</h1>
    <?php echo QrCode::size(500)->generate('Ahay');; ?>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cleansystem\resources\views/dashboard/index.blade.php ENDPATH**/ ?>