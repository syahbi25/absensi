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
                  Ubah Data <?php echo $name;?>
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                  <a href="<?=base_url();?>index.php/user" class="btn btn-tool">
                    <i class="fas fa-arrow-left"></i> Kembali
                  </a>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <?php echo form_open_multipart('index.php/user/updateUser','class="form-horizontal"');?>
                  <div class="form-group">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputnama">Username</label>
                    <input type="email" name="username" class="form-control" id="exampleInputnama" value="<?php echo $username;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputnama">ubah password</label>
                    <input type="text" name="password" class="form-control" id="exampleInputnama" value="<?php echo $password;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputnama">Role (1 = Admin, 2 = Karyawan)</label>
                    <input type="text" name="role" class="form-control" id="exampleInputnama" value="<?php echo $role;?>">
                  </div>
                  <div class="card-footer">
                    <button type="submit" id="simpan"  class="btn btn-primary">update</button>
                  </div>
                <?php echo form_close();?>
              </div><!-- /.card-body -->
            </div>
          </section>
    <!-- /.content -->
  </div>
  