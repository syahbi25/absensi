




  <!-- Content Wrapper. Contains page content -->
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
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
          <div class="card">          
              <div class="card-header">
                <h3 class="card-title">Data Karyawan</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                  <a href="<?=base_url();?>index.php/karyawan/tambahKaryawan" class="btn btn-tool">
                    <i class="fas fa-plus"></i> Tambah
                  </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Login Sebagai</th>
                    <th>Email</th>
                    <th>No tlp</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>alamat</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
            $count = 0;
            foreach ($karyawan as $tampil) {
                        $count++;
            ?>  
                    <tr>
                    <td><?php echo $count; ?></td>
                    <td>
                      <?php echo $tampil->nama ?>
                    </td>
                    <td>
                      <?php echo form_open_multipart('index.php/User/simpanUser','class="form-horizontal"');?>
                      <input type="hidden" name="name" class="form-control" value="<?php echo $tampil->nama ?>">
                      <input type="hidden" name="username" class="form-control" value="<?php echo $tampil->email ?>">
                      <input type="hidden" name="password" class="form-control" value="<?php echo $tampil->tgl ?>">
                      <input type="hidden" name="karyawan_id" class="form-control" value="<?php echo $tampil->id_karyawan ?>">
                      <?php
    if ($tampil->role==1) {
        echo "ADMIN";
    }else if ($tampil->role==2) {
        echo "Karyawan";
    }else { ?>
    <input type="submit" class="btn btn-success btn-sm" name="role" value="1">
    <input type="submit" class="btn btn-secondary btn-sm" name="role" value="2">
    <?php
    }
    ?>
                      <?php echo form_close();?>
                    </td>
                    <td><?php echo $tampil->email ?></td>
                    <td><?php echo $tampil->no_hp ?></td>
                    <td><?php echo $tampil->tempat.", ".$tampil->tgl ?></td>
                    <td><?php echo $tampil->alamat ?></td>
                    <td><?php echo $tampil->nama_jabatan ?></td>
                    <td>
                        <?php echo anchor ('index.php/karyawan/ubahKaryawan/' .$tampil->id_karyawan, ' <i class="fas fa-pen"> </i> '); ?>
                        
                        <?php echo anchor ('index.php/karyawan/hapusKaryawan/' .$tampil->id_karyawan, ' <i class="fas fa-trash"></i> '); ?>
                    </td>
                    
                </tr>
                <?php
                }
            ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Login Sebagai</th>
                    <th>Email</th>
                    <th>No tlp</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>alamat</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </section>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  