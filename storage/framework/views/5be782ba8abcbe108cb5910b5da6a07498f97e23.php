

<?php $__env->startSection('title'); ?>
    Profil <?php echo e($data_pegawai->nama_lengkap); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pegawai.active'); ?>
    active
    <?php $__env->stopSection(); ?> 

    <?php $__env->startSection('datapegawai.active'); ?>
    active
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('datapegawai.show'); ?>
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
        <a href="/pegawai" class="btn btn-primary ">
            <span class="icon">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Data Pegawai</span>
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
                            <img class="img-profil-pegawai img-thumbnail" style="margin-top: 50px; margin-bottom: 25px" src="<?php echo e($data_pegawai->getFotoPegawai()); ?>" alt="">
                            <h3 class="mt-2 mb-2"><strong><?php echo e($data_pegawai->nama_lengkap); ?></strong></h3>
                            <p class="mt-2" ><?php echo e($data_pegawai->jabatan); ?> di Sektor <?php echo e($data_pegawai->sektor_area); ?></p>
                            <p class="mt-2" ><?php echo QrCode::size(200)->generate($data_pegawai->id);; ?> </p>

                        </div>
                        <div class="col">
                            <div class="table-responsive">  
                                <table class="table table-borderless table-sm" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <td>Nomor Pegawai</td><td><?php echo e($data_pegawai->nomor_pegawai); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Lengkap</td><td><?php echo e($data_pegawai->nama_lengkap); ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td><td><?php echo e(date('d F Y', strtotime($data_pegawai->tanggal_lahir))); ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td><td><?php echo e($data_pegawai->agama); ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Pendidikan</td><td><?php echo e($data_pegawai->pendidikan); ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td><td><?php echo e($data_pegawai->alamat); ?>, <br> <?php echo e($data_pegawai->kelurahan); ?>, <?php echo e($data_pegawai->kecamatan); ?>, <br> <?php echo e($data_pegawai->kota_kabupaten); ?>, <?php echo e($data_pegawai->provinsi); ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td><td><?php echo e($data_pegawai->jabatan); ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Penempatan</td><td><?php echo e($data_pegawai->penempatan); ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Sektor</td><td><?php echo e($data_pegawai->sektor_area); ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal diterima</td><td><?php echo e(date('d F Y', strtotime($data_pegawai->tanggal_diterima))); ?></a></td>
                                    </tr>
                                </table>  
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col"> 
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Presensi Pegawai</h6>
                </div>
                <div class="card-body" >
                    
                    
                    <div class="row clock-box watch text-uppercase text-center mb-4 mx-auto">
                        <div class="row mb-2 mt-2">
                            <div class="row fs-6 text-uppercase d-flex justify-content-center ">
                                Tanggal : 
                            </div>
                            <div class="row fs-1 text-uppercase d-flex justify-content-center">
                                <?php echo e(date('D, d-M-Y', strtotime($today))); ?>

                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="row fs-6 text-uppercase d-flex justify-content-center ">
                                Jam :
                            </div>
                            <label id="clock" >
                            </label>
                            

                        </div>
                    </div>
                   
                    <div class="row border-bottom" style="margin-bottom: 20px">
                        
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <a href="<?php echo e(route('presensi.checkin', $data_pegawai->id)); ?>" class="btn btn-lg btn-success" type="button">Presensi Masuk</a>
                        </div>
                        <?php $__currentLoopData = $data_presensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                        <div class="col d-flex justify-content-center">
                            <a href="<?php echo e(route('presensi.checkout', $pegawai->id)); ?>" class="btn btn-lg btn-warning" type="button">Presensi Keluar</a>  
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cleansystem\resources\views/pegawai/profile.blade.php ENDPATH**/ ?>