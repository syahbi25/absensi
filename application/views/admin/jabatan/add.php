  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Jabatan</h1>
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
                  Tambah Data
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                  <a href="<?=base_url();?>index.php/jabatan" class="btn btn-tool">
                    <i class="fas fa-arrow-left"></i> Kembali
                  </a>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <?php echo form_open_multipart('index.php/Jabatan/simpanJabatan','class="form-horizontal"');?>
                  <div class="form-group">
                    <label for="exampleInputnama">Nama Jabatan</label>
                    <input type="text" name="nama_jabatan" class="form-control" id="exampleInputnama" placeholder="Enter nama">
                  </div>
                  <div class="card-footer">
                    <button type="submit" id="simpan"  class="btn btn-primary">Submit</button>
                  </div>
                <?php echo form_close();?>
              </div><!-- /.card-body -->
            </div>
          </section>
    <!-- /.content -->
  </div>
  