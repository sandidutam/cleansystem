

<?php $__env->startSection('title'); ?>
        Edit Data <?php echo e($data_pegawai->nama_lengkap); ?>

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

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="/pegawai" class="btn btn-primary ">
            <span class="icon">
                <i class="fas fa-arrow-left"></i>
            </span>
            <span class="text">Data Pegawai</span>
        </a>

    </div>

    <div class="card shadow mb-4" >
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Data <?php echo e($data_pegawai->nama_lengkap); ?></h6>
        </div>

        <div class="card-body">

        

        
    
        <?php echo Form::model($data_pegawai ,['route'=>['pegawai.update', $data_pegawai->id], 'method'=>'PUT','enctype'=>'multipart/form-data']); ?>


        <div class="row">
            <div class="col">
                
                <div class="card mb-3">
                    <div class="card-header border-left-primary">
                        <h5 class="text-center ">Informasi Pribadi</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama_depan" class="form-label"> Nama Depan : </label> 
                                    <?php echo Form::text('nama_depan', null, ['class'=>'form-control','id'=>'nama_depan']); ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama_belakang" class="form-label"> Nama Belakang : </label> 
                                    <?php echo Form::text('nama_belakang', null, ['class'=>'form-control','id'=>'nama_belakang']); ?>

                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="form-group"> 
                                    <label for="tempat_lahir" class="form-label"> Tempat Lahir : </label> 
                                    <?php echo Form::text('tempat_lahir', null, ['class'=>'form-control','id'=>'tempat_lahir']); ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group "> 
                                    <label for="tanggal_lahir" class="form-label"> Tanggal Lahir : </label> 
                                    <?php echo Form::text('tanggal_lahir', null, ['class'=>'datepicker form-control','id'=>'tanggal_lahir']); ?>

                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="jenis_kelamin" class="mb-2"> Jenis Kelamin : </label>
                                    
                                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" >
                                    <option>Pilih</option>
                                    <option <?php echo e(old('jenis_kelamin', $data_pegawai->jenis_kelamin)=="L"? 'selected':''); ?> value="L">Laki-Laki</option>
                                    <option <?php echo e(old('jenis_kelamin', $data_pegawai->jenis_kelamin)=="P"? 'selected':''); ?> value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group"> 
                                    <label for="agama" class="mb-2"> Agama  : </label>
                                    <select name="agama" class="form-control" id="agama" >
                                    <option>Pilih</option>
                                    <option <?php echo e(old('agama', $data_pegawai->agama)=="Islam"? 'selected':''); ?> value="Islam">Islam</option>
                                    <option <?php echo e(old('agama', $data_pegawai->agama)=="Kristen"? 'selected':''); ?> value="Kristen">Kristen</option>
                                    <option <?php echo e(old('agama', $data_pegawai->agama)=="Katolik"? 'selected':''); ?> value="Katolik">Katolik</option>
                                    <option <?php echo e(old('agama', $data_pegawai->agama)=="Hindu"? 'selected':''); ?> value="Hindu">Hindu</option>
                                    <option <?php echo e(old('agama', $data_pegawai->agama)=="Buddha"? 'selected':''); ?> value="Buddha">Buddha</option>
                                    <option <?php echo e(old('agama', $data_pegawai->agama)=="Konghucu"? 'selected':''); ?> value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label for="alamat"> Alamat : </label>
                            <?php echo Form::textarea('alamat', null, ['class'=>'form-control','id'=>'alamat','rows'=>'2']); ?>

                        </div>
                        
                        <div class="row mb-2">
                            <div class="form-group col">
                                <label for="kelurahan" > Kelurahan : </label>
                                <?php echo Form::text('kelurahan', null, ['class'=>'form-control','id'=>'kelurahan']); ?>

                            </div>
                
                            <div class="form-group col">
                                <label for="kecamatan" > Kecamatan : </label>
                                <?php echo Form::text('kecamatan', null, ['class'=>'form-control','id'=>'kecamatan']); ?>

                            </div>
                
                            <div class="form-group col">
                                <label for="kota_kabupaten" > Kota/Kabupaten : </label>
                                <?php echo Form::text('kota_kabupaten', null, ['class'=>'form-control','id'=>'kota_kabupaten']); ?>

                            </div>
                            
                            <div class="form-group col">
                                <label for="provinsi" > Provinsi : </label>
                                <?php echo Form::text('provinsi', null, ['class'=>'form-control','id'=>'provinsi']); ?>

                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
            <div class="col">
                
                <div class="card mb-3">
                    <div class="card-header border-left-warning">
                        <h5 class="text-center">Informasi Pegawai</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="penempatan" > Lokasi Penempatan : </label>
                                    <select name="penempatan" class="form-control" id="penempatan" >
                                    <option>Pilih</option>
                                    <option <?php echo e(old('penempatan', $data_pegawai->penempatan)=="Mabes TNI AD"? 'selected':''); ?> value="Mabes TNI AD">Mabes TNI AD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="sektor_area" > Sektor Kerja : </label>
                                    <select name="sektor_area" class="form-control" id="sektor_area" >
                                    <option>Pilih</option>
                                    <option <?php echo e(old('sektor_area', $data_pegawai->sektor_area)=="1"? 'selected':''); ?> value="1">Sektor 1</option>
                                    <option <?php echo e(old('sektor_area', $data_pegawai->sektor_area)=="2"? 'selected':''); ?> value="2">Sektor 2</option>
                                    <option <?php echo e(old('sektor_area', $data_pegawai->sektor_area)=="3"? 'selected':''); ?> value="3">Sektor 3</option>
                                    <option <?php echo e(old('sektor_area', $data_pegawai->sektor_area)=="4"? 'selected':''); ?> value="4">Sektor 4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                        <label for="jabatan" > Jabatan : </label>
                                        <select name="jabatan" class="form-control" id="jabatan" >
                                        <option>Pilih</option>
                                        <option <?php echo e(old('jabatan', $data_pegawai->jabatan)=="Manajer"? 'selected':''); ?> value="Manajer">Manajer</option>
                                        <option <?php echo e(old('jabatan', $data_pegawai->jabatan)=="Staff"? 'selected':''); ?> value="Staff">Staff</option>
                                        <option <?php echo e(old('jabatan', $data_pegawai->jabatan)=="Mandor"? 'selected':''); ?> value="Mandor">Mandor</option>
                                        <option <?php echo e(old('jabatan', $data_pegawai->jabatan)=="Cleaning Service"? 'selected':''); ?> value="Cleaning Service">Cleaning Service</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pendidikan" class="form-label" > Tingkat Pendidikan : </label>
                                    <select name="pendidikan" class="form-control" id="pendidikan" >
                                    <option>Pilih</option>
                                    <option <?php echo e(old('pendidikan', $data_pegawai->pendidikan)=="SD"? 'selected':''); ?> value="SD">SD</option>
                                    <option <?php echo e(old('pendidikan', $data_pegawai->pendidikan)=="SMP"? 'selected':''); ?> value="SMP">SMP</option>
                                    <option <?php echo e(old('pendidikan', $data_pegawai->pendidikan)=="SMA"? 'selected':''); ?> value="SMA">SMA/SMK/STM</option>
                                    <option <?php echo e(old('pendidikan', $data_pegawai->pendidikan)=="Diploma"? 'selected':''); ?> value="Diploma">Diploma</option>
                                    <option <?php echo e(old('pendidikan', $data_pegawai->pendidikan)=="S-1"? 'selected':''); ?> value="S-1">Sarjana 1</option>
                                    <option <?php echo e(old('pendidikan', $data_pegawai->pendidikan)=="S-2"? 'selected':''); ?> value="S-2">Sarjana 2</option>
                                    </select>
                            </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group" > 
                                    <label for="tanggal_diterima" class="form-label"> Tanggal Diterima : </label> 
                                    <?php echo Form::text('tanggal_diterima', $data_pegawai->tanggal_diterima , ['class'=>'datepicker form-control','id'=>'tanggal_diterima','disabled']); ?>

                                </div>        
                            </div>
                        </div>
                        <div class="form-group <?php echo e($errors->has('foto_pegawai') ? 'has-error' : ''); ?> "> 
                            <div class="mb-3">
                                <label for="foto_pegawai" class="form-label">Unggah foto pegawai :</label>
                                
                                <input class="form-control" type="file" name="foto_pegawai" id="foto_pegawai" value="<?php echo e(old('foto_pegawai')); ?>">
                                    <?php if($errors->has('foto_pegawai')): ?>
                                        <span class="help-block text-danger"><?php echo e($errors->first('foto_pegawai')); ?></span>
                                    <?php endif; ?>
                            </div>
                        </div>   
                    </div>
                </div>
                
                
            </div>
        </div>


            
        </div>
        <div class="d-flex justify-content-start mb-3 ml-3">
            <div class="row">
                <div class="col">
                    <a href="/pegawai" class="btn btn-danger" role="button">Batal</a>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
            
    
    <?php echo Form::close(); ?>

    

    <script type="text/javascript">
        $('.datepicker').datepicker({  
           format: 'yyyy-mm-dd'
         });  
    </script> 
   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cleansystem\resources\views/pegawai/edit.blade.php ENDPATH**/ ?>