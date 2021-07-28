

<?php $__env->startSection('title'); ?>
    Profil <?php echo e($data_user->nama_lengkap); ?>

<?php $__env->stopSection(); ?>

    <?php $__env->startSection('profile.active'); ?>
    active
    <?php $__env->stopSection(); ?> 

    <?php $__env->startSection('userprofile.active'); ?>
    active
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('profile.show'); ?>
    show
    <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Space%20Mono">
        <style>
        .clock-box{
            font-family: 'Space Mono';
            font-size: 40px;
            color: chartreuse;
            width: auto;
            min-width: 0;
            word-wrap: break-word;
            background-color: black!important;
            background-clip: border-box;
            border-radius: 0.75rem;
            padding: 0.25rem;
        }
        </style>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="/user" class="btn btn-primary ">
            <span class="icon">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">List User</span>
        </a>
    
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profil Pegawai</h6>
                </div>
           
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 text-center card-split">
                            <img class="img-profil-pegawai img-thumbnail" style="margin-top: 50px; margin-bottom: 25px" src="<?php echo e($data_user->getFotoUser()); ?>" alt="">
                            <h3 class="mt-2 mb-2"><strong><?php echo e($data_user->nama_lengkap); ?></strong></h3>
                            <p class="mt-2" ><?php echo e($data_user->jabatan); ?> dengan role <?php echo e($data_user->role); ?></p>

                        </div>
                        <div class="col">
                            <div class="table-responsive">  
                                <table class="table table-borderless table-sm" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <td>Nomor Pegawai</td><td><?php echo e($data_user->nomor_pegawai); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap</td><td><?php echo e($data_user->nama_lengkap); ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td><td><?php echo e(date('d F Y', strtotime($data_user->tanggal_lahir))); ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td><td><?php echo e($data_user->jabatan); ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Role</td><td><?php echo e($data_user->role); ?></a></td>
                                    </tr>
                                </table>  
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        
    </div>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cleansystem\resources\views/user/profile.blade.php ENDPATH**/ ?>