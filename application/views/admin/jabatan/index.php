




  <!-- Content Wrapper. Contains page content -->
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
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
          <div class="card">          
              <div class="card-header">
                <h3 class="card-title">Data Jabatan</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                  <a href="<?=base_url();?>index.php/jabatan/tambahJabatan" class="btn btn-tool">
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
                    <th>Nama Jabatan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
            $count = 0;
            foreach ($jabatan as $tampil) {
                        $count++;
            ?>  
                    <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $tampil->nama_jabatan ?></td>
                    <td>
                        <?php echo anchor ('index.php/jabatan/ubahJabatan/' .$tampil->id_jabatan, ' <i class="fas fa-pen"> </i> '); ?>
                        
                        <?php echo anchor ('index.php/jabatan/hapusJabatan/' .$tampil->id_jabatan, ' <i class="fas fa-trash"></i> '); ?>
                    </td>
                    
                </tr>
                <?php
                }
            ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Jabatan</th>
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
  