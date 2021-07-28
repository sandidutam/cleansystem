

<?php $__env->startSection('content'); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    
    <a href="<?php echo e(route('presensi.indexin')); ?>" class="d-none d-sm-inline-block btn btn-md btn-primary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-center text-primary">Form Presensi Keluar</h4>
    </div>

    <div class="card-body">

        

        <?php echo Form::model($data_presensi ,['route'=>['presensi.update', $data_presensi->id], 'method'=>'PUT']); ?>


        
    
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Space%20Mono">
        <style>
        .clock-box{
            font-family: 'Space Mono';
            font-size: 40px;
            color: chartreuse;
            width: 420px;
            min-width: 0;
            word-wrap: break-word;
            background-color: black!important;
            background-clip: border-box;
            border-radius: 0.75rem;
            padding: 0.25rem;
        }
        </style>
      
        <div class="row clock-box text-uppercase text-center mb-4 mx-auto" >
            <div class="row mb-2 mt-2">
                <div class="row fs-6 text-uppercase d-flex justify-content-center ">
                    Tanggal : 
                </div>
                <div class="row fs-2 text-uppercase d-flex justify-content-center mb-4">
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
          
        <div class="row mb-2 justify-content-center">
            <div class="col-6 ">
                <div class="form-group <?php echo e($errors->has('nomor_pegawai') ? 'has-error' : ''); ?>">
                    <label for="nomor_pegawai" class="form-label"> Nomor Pegawai : </label> 
                    <?php echo Form::text('nomor_pegawai', null, ['class'=>'form-control','id'=>'nomor_pegawai','name'=>'nomor_pegawai','readonly']); ?>

                    <?php if($errors->has('nomor_pegawai')): ?>
                        <span class="help-block text-danger"><?php echo e($errors->first('nomor_pegawai')); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row mb-2 justify-content-center">
            <div class="col-6 ">
                <div class="form-group <?php echo e($errors->has('nama_lengkap') ? 'has-error' : ''); ?>">
                    <label for="nama_lengkap" class="form-label"> Nama Lengkap : </label> 
                    <?php echo Form::text('nama_lengkap', null, ['class'=>'form-control','id'=>'nama_lengkap','name'=>'nama_lengkap','readonly']); ?>

                    <?php if($errors->has('nama_lengkap')): ?>
                        <span class="help-block text-danger"><?php echo e($errors->first('nama_lengkap')); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row mb-2 justify-content-center">
            <div class="col-6 ">
                <div class="form-group <?php echo e($errors->has('jabatan') ? 'has-error' : ''); ?>">
                    <label for="jabatan" class="form-label"> Jabatan : </label> 
                    <?php echo Form::text('jabatan', null, ['class'=>'form-control','id'=>'jabatan','name'=>'jabatan','readonly']); ?>

                    <?php if($errors->has('jabatan')): ?>
                        <span class="help-block text-danger"><?php echo e($errors->first('jabatan')); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="col-6 ">
                <div class="form-group <?php echo e($errors->has('sektor_area') ? 'has-error' : ''); ?>">
                    <label for="sektor_area" class="form-label"> Sektor : </label> 
                    <?php echo Form::text('sektor_area', null, ['class'=>'form-control','id'=>'sektor_area','name'=>'sektor_area','readonly']); ?>

                    <?php if($errors->has('sektor_area')): ?>
                        <span class="help-block text-danger"><?php echo e($errors->first('sektor_area')); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row mb-2 justify-content-center">
            
                <button type="submit" class="btn btn-success mx-3" name="btn_masuk" style="width: 10rem" value="btn_masuk" disabled >PRESENSI MASUK</button>
            
                <form action="<?php echo e(route('presensi.update', $data_presensi->id )); ?>" method="PUT">
                    <button type="submit" class="btn btn-danger mx-3" name="btn_keluar" style="width: 10rem" value="btn_keluar" >PRESENSI KELUAR</button>
                </form>
            
        </div>
        <div class="row mb-2 justify-content-center">
            <div class="col-6">
                <div class="form-group <?php echo e($errors->has('keterangan') ? 'has-error' : ''); ?>">
                    <label for="keterangan" class="mb-2"> Keterangan : </label>
                    <select name="keterangan" class="form-control" id="keterangan" >
                    <option>Pilih</option>
                    <option value="Bolos" <?php echo e((old('keterangan')=='Bolos')? 'selected' :''); ?>>Tidak Hadir / Bolos</option>
                    <option value="Cuti" <?php echo e((old('keterangan')=='Cuti')? 'selected' :''); ?>>Cuti</option>
                    <option value="Izin" <?php echo e((old('keterangan')=='Izin')? 'selected' :''); ?>>Izin</option>
                    <option value="Sakit" <?php echo e((old('keterangan')=='Sakit')? 'selected' :''); ?>>Sakit</option>
                    </select>
                    <?php if($errors->has('keterangan')): ?>
                        <span class="help-block text-danger"><?php echo e($errors->first('keterangan')); ?></span>
                    <?php endif; ?>
                    <small id="helpId" class="fst-italic text-muted"> <span class=" fw-bold text-danger">Perhatian!</span> Keterangan diisi apabila pegawai tidak masuk kerja</small>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary" name="btn_keterangan" style="width: 22rem" value="btn_keterangan" disabled>SUBMIT KETERANGAN</button>
                </div>
                <div class="row">
                    <small id="helpId" class="fst-italic text-center text-muted"> <span class=" fw-bold text-danger">Perhatian!</span> Submit keterangan apabila pegawai tidak masuk kerja</small>
                </div>
            </div>
        </div>
            
        

        

        <?php echo Form::close(); ?>

        

    </div>
</div>

<script type="text/javascript">
    $('.datepicker').datepicker({  
       format: 'yyyy-mm-dd'
     });  
</script> 



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cleansystem\resources\views/presensi/checkout.blade.php ENDPATH**/ ?>