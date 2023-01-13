  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Karyawan</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="col-lg-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-folder-plus mr-1"></i>
                  Ubah Data
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                  <a href="<?=base_url();?>" class="btn btn-tool">
                    <i class="fas fa-arrow-left"></i> Kembali
                  </a>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <?php echo form_open_multipart('index.php/karyawan/updateKaryawan','class="form-horizontal"');?>
                  <div class="form-group">
                    <input type="hidden" name="id_karyawan" class="form-control" value="<?php echo $id_karyawan;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputnama">Nama Karyawan</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputnama" value="<?php echo $nama;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail" value="<?php echo $email;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputNo_hp">Nomor Telpon</label>
                    <input type="text" name="no_hp" class="form-control" id="exampleInputNo_hp" value="<?php echo $no_hp;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputTempat">Tempat</label>
                    <input type="text" name="tempat" class="form-control" id="exampleInputTempat" value="<?php echo $tempat;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputtgl">Tanggal Lahir</label>
                    <input type="date" name="tgl" class="form-control" id="exampleInputtgl" value="<?php echo $tgl;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputalamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="exampleInputalamat" value="<?php echo $alamat;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputjabatan">Jabatan</label>
                    <?php echo form_dropdown('jabatan_id', $jabatan_pilih, $jabatan_id, 'class="form-control show-tick" id="exampleInputjabatan"');?>
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div> -->
                  <div class="card-footer">
                    <button type="submit" id="simpan"  class="btn btn-primary">update</button>
                  </div>
                <?php echo form_close();?>
              </div><!-- /.card-body -->
            </div>
          </section>
    <!-- /.content -->
  </div>
  