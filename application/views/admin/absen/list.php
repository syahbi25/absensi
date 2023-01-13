




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Kehadiran</h1>
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
                <h3 class="card-title"></h3>
                <!-- <div class="card-tools">
                <input type="date" name="startDate" 
        placeholder="dd-mm-yyyy" value=""
        min="1997-01-01" max="2030-12-31">
                </div>
                <div class="card-tools">
                <input type="date" name="endDate" 
        placeholder="dd-mm-yyyy" value=""
        min="1997-01-01" max="2030-12-31">
                </div> -->
              </div>
              <!-- /.card-header -->
              

<section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
        <?php foreach ($user as $tampil) { ?>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><?php echo $tampil->name ?></span>
                <span class="info-box-number">
                  <?php            
  $id_cek = $tampil->id;
  $cek = $this->db->query("select count(user_id) as total_hadir from absen where user_id='$id_cek' AND keterangan='Hadir'")->result();
    foreach ($cek as $view) { 
                  ?>
                  <span class="info-box-text"><?php echo $view->total_hadir ?></span>
                  
        <?php } ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        <?php } ?>
        </div>
        <!-- /.row -->
    </div>
</section>    <!-- /.card-body -->
            </div>
          </section>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  