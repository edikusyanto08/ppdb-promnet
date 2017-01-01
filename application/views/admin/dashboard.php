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
          <div class="small-box bg-green">
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
          <div class="small-box bg-yellow">
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
          <div class="small-box bg-red">
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
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
      </div>
      <!-- /.row (main row) -->