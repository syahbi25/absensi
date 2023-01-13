<?php if($this->session->userdata('access')=='Administrator'){ ?>





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> </h1>
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
              <!-- <div class="card-header">
                <h3 class="card-title">Home</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                  <a href="<?=base_url();?>index.php/jabatan/tambahJabatan" class="btn btn-tool">
                    <i class="fas fa-plus"></i> Tambah
                  </a>
                </div>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <H1>Selamat Datang</H1>
                <H3>dan</H3>
                <H2>Selamat Bekerja</H>
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
  
<?php } if($this->session->userdata('access')=='Karyawan'){ ?>
    <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                    <div class="tab-pane active" id="custom-tabs-two-Absensi" role="tabpanel" aria-labelledby="custom-tabs-two-Absensi-tab">
                            <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <!-- <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div> -->

                <h3 class="profile-username text-center"><?php echo $this->session->userdata('name') ;?></h3>

                <p class="text-muted text-center"><?php echo $this->session->userdata('access') ;?></p>

                <!-- <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul> -->
<form action="<?=base_url();?>index.php/absen/harian_karyawan" method="post">
	<?php
  $id_cek = $this->session->userdata('id');
  $cek = $this->db->query("select * from absen where stat_absen=1 and user_id='$id_cek' ")->result();
  foreach ($cek as $key) { ?>
  <input type="hidden" name="id_absen" value="<?=$key->id_absen;?>">
  <?php
  $ket = $key->keterangan;
  $user_id = $key->user_id;
  ?>
  <?php
   if($id_cek == $user_id) {
    if($ket == null) {?>
     <button type="submit" class="btn btn-primary btn-block">Hadir</button>
     <?php
   }}
  ?>
 
  <?php
   if($ket == 'Hadir' ) {?>
    <a class="btn btn-success btn-block">Hadir</a>
    <?php
  }
  ?>

<?php } ?>

</form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#Keterangan" data-toggle="tab">Keterangan</a></li>
                  <li class="nav-item"><a class="nav-link" href="#list" data-toggle="tab">list</a></li>
                  <li class="nav-item">
                    <a href="<?=base_url();?>index.php/login/logout" class="nav-link">Logout</a>
                  </li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="Keterangan">
	<?php
  $id_cek = $this->session->userdata('id');
  $date = date('d-m-Y');
  $cek2 = $this->db->query("select * from absen where tanggal='$date' and user_id='$id_cek'")->result();
  foreach ($cek2 as $key) { ?>
  <a class="btn btn-success btn-block"><?=$key->keterangan;?></a>
<?php } ?>

</form>

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="list">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  
  $cek3 = $this->db->query("select * from absen where user_id='$id_cek'")->result();
            $count = 0;
            foreach ($cek3 as $tampil) {
                        $count++;
            ?>  
                    <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $tampil->hari.', '.$tampil->tanggal ;?></td>
                    <td><?php echo $tampil->keterangan ;?></td>
                </tr>
                <?php
                }
            ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                  </tr>
                  </tfoot>
                </table>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
                    </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
<?php }; ?>