<!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $sekolah_terdaftar; ?></h3>

              <p>Sekolah Mendaftar</p>
            </div>
            <div class="icon">
              <i class="fa fa-hospital-o"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><?php echo $siswa_mendaftar; ?><!-- <sup style="font-size: 20px">%</sup> --></h3>

              <p>Siswa Mendaftar</p>
            </div>
            <div class="icon">
              <i class="fa fa-user<?php if($siswa_mendaftar > 1) echo "s"; ?>"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo $siswa_pending; ?></h3>

              <p>Siswa Pending</p>
            </div>
            <div class="icon">
              <i class="fa fa-user<?php if($siswa_pending > 1) echo "s"; ?>"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo $siswa_terdaftar; ?></h3>

              <p>Siswa Terdaftar</p>
            </div>
            <div class="icon">
              <i class="fa fa-user<?php if($siswa_terdaftar > 1) echo "s"; ?>"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $siswa_diterima; ?></h3>

              <p>Siswa Diterima</p>
            </div>
            <div class="icon">
              <i class="fa fa-user<?php if($siswa_terdaftar > 1) echo "s"; ?>"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $siswa_ditolak; ?></h3>

              <p>Siswa Tidak Diterima</p>
            </div>
            <div class="icon">
              <i class="fa fa-user<?php if($siswa_terdaftar > 1) echo "s"; ?>"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $jurusan_dipilih; ?></h3>

              <p>Jurusan Dipilih</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-navy">
            <div class="inner">
              <h3><?php echo $luar_kota; ?></h3>

              <p>Siswa Luar kota</p>
            </div>
            <div class="icon">
              <i class="fa fa-user<?php if($siswa_terdaftar > 1) echo "s"; ?>"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="box box-primary container-fluid">
          <div class="page-header">
            <h3>Peserta dengan nilai UN terbaik</h3>
          </div>
          <div class="page-content">
              <?php
                $i = 0;
                foreach ($un_terbaik as $value) {
              ?>
              <div class="col-md-3 col-sm-3 col-xs-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php
                if ($foto[$i] != '') {
              ?>
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('upload/') .$foto[$i]; ?>" alt="User profile picture">
              <?php
                }else {
              ?>
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('upload/user.png'); ?>" alt="User profile picture">
              <?php
                }
              ?>

              <h3 class="profile-username text-center"><?php echo $value->nama_lengkap; ?></h3>

              <p class="text-muted text-center"><?php echo $value->nama_sekolah; ?></p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nilai Total</b> <a class="pull-right"><?php echo $value->total; ?></a>
                </li>
              </ul>

              <a href="<?php echo base_url('admin/nilai/') .$value->ID_siswa; ?>" class="btn btn-primary btn-block"><b>Lihat</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </div>
              <?php
                  $i++;
                }
              ?>
              <div class="clearfix">
                
              </div>
            </div>
          </div>
        </div>
          
      </div>
      <!-- /.row (main row) -->