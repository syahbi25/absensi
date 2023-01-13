<?php
        $day = date('w');
        $dayList = array(
            '0' => 'Minggu',
            '1' => 'Senin',
            '2' => 'Selasa',
            '3' => 'Rabu',
            '4' => 'Kamis',
            '5' => 'Jumat',
            '6' => 'Sabtu'
        );
        $dayList[$day];
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              Data Absen
            </h1>
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
              <?php 
              if ( $date == null ) { ?>
<form action="<?=base_url();?>index.php/absen/harian" method="post">
                    <?php
$a = $this->db->query("select * from user")->result();
$i=1;
foreach ($a as $key) {
 
?>
 <input type="hidden" name="id[]" value="<?=$key->id;?>">
                <?php
              $i++; }
            ?>
                <button type="submit" class="btn btn-success btn-sm">Absen Hari <?=$dayList[$day];?>  </button>
</form>
 <?php } ?>
              <?php
              if ( $date == date('d-m-Y', strtotime('-1 days', strtotime(date('d-m-Y')))) ) { ?>
<form action="<?=base_url();?>index.php/absen/harian" method="post">
                    <?php
$a = $this->db->query("select * from user")->result();
$i=1;
foreach ($a as $key) {
 
?>
 <input type="hidden" name="id[]" value="<?=$key->id;?>">
                <?php
              $i++; }
            ?>
                <button type="submit" class="btn btn-success btn-sm">Absen Hari <?php echo $dayList[$day];?></button>
</form>
 <?php } ?>
              <?php
              if ( $date == date('d-m-Y', strtotime('-2 days', strtotime(date('d-m-Y')))) ) { ?>
<form action="<?=base_url();?>index.php/absen/harian" method="post">
                    <?php
$a = $this->db->query("select * from user")->result();
$i=1;
foreach ($a as $key) {
 
?>
 <input type="hidden" name="id[]" value="<?=$key->id;?>">
                <?php
              $i++; }
            ?>
                <button type="submit" class="btn btn-success btn-sm">Absen Hari <?php echo $dayList[$day];?></button>
</form>
 <?php } ?>
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Hari, Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
            $count = 0;
            foreach ($user_absen as $tampil) {
                        $count++;
            ?>  
                    <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $tampil->name ?></td>
                    <td><?php echo $tampil->hari.', '.$tampil->tanggal ?></td>
                    <td>
                        <form action="<?=base_url();?>index.php/absen/hadir" method="post">
                            <input type="hidden" name="id_absen" value="<?=$tampil->id_absen;?>">
                            <button type="submit" class="btn btn-primary mb-1 btn-block"> Hadir </button>
                        </form>
                        <form action="<?=base_url();?>index.php/absen/tidak_hadir" method="post">
                            <input type="hidden" name="id_absen" value="<?=$tampil->id_absen;?>">
                            <button type="submit" class="btn btn-danger mb-1 btn-block"> Tidak Hadir</button>
                        </form>
                    </td>
                    
                </tr>
                <?php
                }
            ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Hari, Tanggal</th>
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