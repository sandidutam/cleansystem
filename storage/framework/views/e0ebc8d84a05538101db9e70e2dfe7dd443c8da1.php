

<?php $__env->startSection('title'); ?>
        Tambah Data Pegawai
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('pegawai.active'); ?>
    active
    <?php $__env->stopSection(); ?> 

    <?php $__env->startSection('addpegawai.active'); ?>
    active
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('datapegawai.show'); ?>
    show
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="card shadow mb-4" >
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Form Isi Data Pegawai</h4>
    </div>

    <div class="card-body">
        
        <form action="<?php echo e(route('pegawai.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            
            <div class="row">
                <div class="col">
                    
                    <div class="card mb-3" style="height: 100%">
                        <div class="card-header border-left-primary">
                            <h5 class="text-center ">Informasi Pribadi</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group <?php echo e($errors->has('nama_depan') ? 'has-error' : ''); ?> "> 
                                        <label for="nama_depan" class="form-label"> Nama Depan : </label> 
                                        <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="Isi Nama Depan" value="<?php echo e(old('nama_depan')); ?>">
                                        <?php if($errors->has('nama_depan')): ?>
                                            <span class="help-block text-danger"><?php echo e($errors->first('nama_depan')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group <?php echo e($errors->has('nama_belakang') ? 'has-error' : ''); ?> "> 
                                        <label for="nama_belakang" class="form-label"> Nama Belakang : </label> 
                                        <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Isi Nama Belakang" value="<?php echo e(old('nama_belakang')); ?>" >
                                        <?php if($errors->has('nama_belakang')): ?>
                                            <span class="help-block text-danger"><?php echo e($errors->first('nama_belakang')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group <?php echo e($errors->has('tempat_lahir') ? 'has-error' : ''); ?> "> 
                                        <label for="tempat_lahir" class="form-label"> Tempat Lahir : </label> 
                                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Isi Tempat Lahir" value="<?php echo e(old('tempat_lahir')); ?>">
                                        <?php if($errors->has('tempat_lahir')): ?>
                                            <span class="help-block text-danger"><?php echo e($errors->first('tempat_lahir')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group <?php echo e($errors->has('tanggal_lahir') ? 'has-error' : ''); ?> "> 
                                        <label for="tanggal_lahir" class="form-label"> Tanggal Lahir : </label> 
                                        <input type="text" autocomplete="off" class="datepicker form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="01/01/1970" value="<?php echo e(old('tanggal_lahir')); ?>">
                                        <?php if($errors->has('tanggal_lahir')): ?>
                                            <span class="help-block text-danger"><?php echo e($errors->first('tanggal_lahir')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group  <?php echo e($errors->has('jenis_kelamin') ? 'has-error' : ''); ?> ">
                                        <label for="jenis_kelamin" class="mb-2"> Jenis Kelamin : </label>
                                        <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" >
                                        <option>Pilih</option>
                                        <option value="L" <?php echo e((old('jenis_kelamin')=='L')? 'selected' :''); ?>>Laki-Laki</option>
                                        <option value="P" <?php echo e((old('jenis_kelamin')=='P')? 'selected' :''); ?>>Perempuan</option>
                                        </select>
                                        <?php if($errors->has('jenis_kelamin')): ?>
                                            <span class="help-block text-danger"><?php echo e($errors->first('jenis_kelamin')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group <?php echo e($errors->has('agama') ? 'has-error' : ''); ?> "> 
                                        <label for="agama" class="mb-2"> Agama  : </label>
                                        <select name="agama" class="form-control" id="agama" >
                                        <option>Pilih</option>
                                        <option value="Islam" <?php echo e((old('agama')=='Islam')? 'selected' :''); ?>>Islam</option>
                                        <option value="Kristen" <?php echo e((old('agama')=='Kristen')? 'selected' :''); ?>>Kristen</option>
                                        <option value="Katolik" <?php echo e((old('agama')=='Katolik')? 'selected' :''); ?>>Katolik</option>
                                        <option value="Hindu" <?php echo e((old('agama')=='Hindu')? 'selected' :''); ?>>Hindu</option>
                                        <option value="Buddha" <?php echo e((old('agama')=='Buddha')? 'selected' :''); ?>>Buddha</option>
                                        <option value="Konghucu" <?php echo e((old('nagama')=='Konghucu')? 'selected' :''); ?>>Konghucu</option>
                                        <?php if($errors->has('agama')): ?>
                                            <span class="help-block text-danger"><?php echo e($errors->first('agama')); ?></span>
                                        <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2 <?php echo e($errors->has('alamat') ? 'has-error' : ''); ?> ">
                                <label for="alamat"> Alamat : </label>
                                <textarea name="alamat" class="form-control" placeholder="Isikan Alamat Tempat Tinggal" id="alamat" rows="2"><?php echo e(old('alamat')); ?></textarea>
                                <?php if($errors->has('alamat')): ?>
                                    <span class="help-block text-danger"><?php echo e($errors->first('alamat')); ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="row mb-2 <?php echo e($errors->has('kelurahan') ? 'has-error' : ''); ?> ">
                                <div class="form-group col">
                                    <label for="kelurahan" > Kelurahan : </label>
                                    <input type="text" name="kelurahan" class="form-control" placeholder="Isikan Kelurahan" id="kelurahan" value="<?php echo e(old('kelurahan')); ?>">
                                    <?php if($errors->has('kelurahan')): ?>
                                        <span class="help-block text-danger"><?php echo e($errors->first('kelurahan')); ?></span>
                                    <?php endif; ?>
                                </div>
                    
                                <div class="form-group col <?php echo e($errors->has('kecamatan') ? 'has-error' : ''); ?> ">
                                    <label for="kecamatan" > Kecamatan : </label>
                                    <input type="text" name="kecamatan" class="form-control" placeholder="Isikan Kecamatan" id="kecamatan" value="<?php echo e(old('kecamatan')); ?>">
                                    <?php if($errors->has('kecamatan')): ?>
                                        <span class="help-block text-danger"><?php echo e($errors->first('kecamatan')); ?></span>
                                    <?php endif; ?>
                                </div>
                    
                                <div class="form-group col <?php echo e($errors->has('kota_kabupaten') ? 'has-error' : ''); ?> ">
                                    <label for="kota_kabupaten" > Kota/Kabupaten : </label>
                                    <input type="text" name="kota_kabupaten" class="form-control" placeholder="Isikan Kota/Kabupaten" id="kota_kabupaten" value="<?php echo e(old('kota_kabupaten')); ?>">
                                    <?php if($errors->has('kota_kabupaten')): ?>
                                        <span class="help-block text-danger"><?php echo e($errors->first('kota_kabupaten')); ?></span>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="form-group col <?php echo e($errors->has('provinsi') ? 'has-error' : ''); ?> ">
                                    <label for="provinsi" > Provinsi : </label>
                                    <input type="text" name="provinsi" class="form-control" placeholder="Isikan Provinsi" id="provinsi" value="<?php echo e(old('provinsi')); ?>">
                                    <?php if($errors->has('provinsi')): ?>
                                        <span class="help-block text-danger"><?php echo e($errors->first('provinsi')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
                
                <div class="col">
                    
                    <div class="card mb-3" style="height: 100%">
                        <div class="card-header border-left-warning">
                            <h5 class="text-center">Informasi Pegawai</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group <?php echo e($errors->has('penempatan') ? 'has-error' : ''); ?> ">
                                        <label for="penempatan" > Lokasi Penempatan : </label>
                                        <select name="penempatan" class="form-control" id="penempatan" >
                                        <option>Pilih</option>
                                        <option value="Mabes TNI AD" <?php echo e((old('penempatan')=='Mabes TNI AD')? 'selected' :''); ?>>Mabes TNI AD</option>
                                        </select>
                                        <?php if($errors->has('penempatan')): ?>
                                            <span class="help-block text-danger"><?php echo e($errors->first('penempatan')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group <?php echo e($errors->has('sektor_area') ? 'has-error' : ''); ?> ">
                                        <label for="sektor_area" > Sektor Kerja : </label>
                                        <select name="sektor_area" class="form-control" id="sektor_area" >
                                        <option>Pilih</option>
                                        <option value="1" <?php echo e((old('sektor_area')=='1')? 'selected' :''); ?>>Sektor 1</option>
                                        <option value="2" <?php echo e((old('sektor_area')=='2')? 'selected' :''); ?>>Sektor 2</option>
                                        <option value="3" <?php echo e((old('sektor_area')=='3')? 'selected' :''); ?>>Sektor 3</option>
                                        <option value="4" <?php echo e((old('sektor_area')=='4')? 'selected' :''); ?>>Sektor 4</option>
                                        </select>
                                        <?php if($errors->has('sektor_area')): ?>
                                            <span class="help-block text-danger"><?php echo e($errors->first('sektor_area')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group <?php echo e($errors->has('jabatan') ? 'has-error' : ''); ?>">
                                            <label for="jabatan" > Jabatan : </label>
                                            <select name="jabatan" class="form-control" id="jabatan" >
                                            <option>Pilih</option>
                                            <option value="Manajer" <?php echo e((old('jabatan')=='Manajer')? 'selected' :''); ?>>Manajer</option>
                                            <option value="Staff" <?php echo e((old('jabatan')=='Staff')? 'selected' :''); ?>>Staff</option>
                                            <option value="Mandor" <?php echo e((old('jabatan')=='Mandor')? 'selected' :''); ?>>Mandor</option>
                                            <option value="Cleaning Service" <?php echo e((old('jabatan')=='Cleaning Service')? 'selected' :''); ?>>Cleaning Service</option>
                                            </select>
                                            <?php if($errors->has('jabatan')): ?>
                                                <span class="help-block text-danger"><?php echo e($errors->first('jabatan')); ?></span>
                                            <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col <?php echo e($errors->has('pendidikan') ? 'has-error' : ''); ?> ">
                                    <div class="form-group">
                                        <label for="pendidikan" class="form-label" > Tingkat Pendidikan : </label>
                                        <select name="pendidikan" class="form-control" id="pendidikan" >
                                        <option>Pilih</option>
                                        <option value="SD" <?php echo e((old('pendidikan')=='SD')? 'selected' :''); ?>>SD</option>
                                        <option value="SMP" <?php echo e((old('pendidikan')=='SMP')? 'selected' :''); ?>>SMP</option>
                                        <option value="SMA" <?php echo e((old('pendidikan')=='SMA')? 'selected' :''); ?>>SMA/SMK/STM</option>
                                        <option value="Diploma" <?php echo e((old('pendidikan')=='Diploma')? 'selected' :''); ?>>Diploma</option>
                                        <option value="S-1" <?php echo e((old('pendidikan')=='S-1')? 'selected' :''); ?>>Sarjana 1</option>
                                        <option value="S-2" <?php echo e((old('pendidikan')=='S-2')? 'selected' :''); ?>>Sarjana 2</option>
                                        </select>
                                        <?php if($errors->has('pendidikan')): ?>
                                            <span class="help-block text-danger"><?php echo e($errors->first('pendidikan')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group <?php echo e($errors->has('tangal_diterima') ? 'has-error' : ''); ?> "> 
                                        <label for="tanggal_diterima" class="form-label"> Tanggal Diterima : </label> 
                                        <input type="text" autocomplete="off" class="datepicker form-control" name="tanggal_diterima" id="tanggal_diterima" placeholder="01/01/2019" value="<?php echo e(old('tanggal_diterima')); ?>">
                                        <?php if($errors->has('tanggal_diterima')): ?>
                                            <span class="help-block text-danger"><?php echo e($errors->first('tanggal_diterima')); ?></span>
                                        <?php endif; ?>
                                    </div>        
                                </div>
                            </div>
                            <div class="form-group <?php echo e($errors->has('foto_pegawai') ? 'has-error' : ''); ?> "> 
                                <div class="mb-3">
                                    <label for="foto_pegawai" class="form-label">Unggah Foto Pegawai :</label>
                                    <input class="form-control" type="file" name="foto_pegawai" id="foto_pegawai">
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
        </form>
    </div>




    <script type="text/javascript">
        $('.datepicker').datepicker({  
           format: 'yyyy-mm-dd'
         });  
    </script> 
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cleansystem\resources\views/pegawai/create.blade.php ENDPATH**/ ?>