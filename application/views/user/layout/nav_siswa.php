<nav class="navbar navbar-default" style="margin-top: -5px;">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-left">
        <li class="<?php if(isset($menu_home)) echo "active"; ?>" ><a href="<?php echo base_url('siswa'); ?>">Beranda</a></li>
        <li class="<?php if(isset($menu_biodata)) echo "active"; ?>" ><a href="<?php echo base_url('siswa/biodata'); ?>">Biodata</a></li>
        <li class="<?php if(isset($menu_berkas)) echo "active"; ?>" ><a href="<?php echo base_url('siswa/berkas'); ?>">Berkas</a></li>
        <li class="<?php if(isset($menu_nilai)) echo "active"; ?>" ><a href="<?php echo base_url('siswa/nilai'); ?>">Nilai UN</a></li>
        <li class="<?php if(isset($menu_jurusan)) echo "active"; ?>" ><a href="<?php echo base_url('siswa/jurusan'); ?>">Pilihan Jurusan</a></li>
        <li class="<?php if(isset($menu_verif)) echo "active"; ?>" ><a href="<?php echo base_url('siswa/verifikasi'); ?>">Verifikasi</a></li>
        <?php
          if ($this->session->userdata('status_pendaftaran') >= 3) {
        ?>
        <li class="<?php if(isset($menu_cetak)) echo "active"; ?>" ><a href="<?php echo base_url('siswa/cetak'); ?>">Cetak Kartu</a></li>
        <?php
          }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="cari disini..">
          </div>
        </form>

        <li class="dropdown <?php if(isset($menu_siswa)) echo "active"; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <?php echo $this->session->userdata('nama_siswa'); ?>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
<!--             <li class="<?php if(isset($menu_profile)) echo"active"; ?>"><a href="<?php echo base_url('siswa/profile'); ?>">Profile</a></li>
            <li><a href="<?php echo base_url('siswa/pemberitahuan'); ?>">Pemberitahuan</a></li>-->
            <li><a href="<?php echo base_url('siswa/pengaturan'); ?>">Pengaturan</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url('ppdb/logout'); ?>">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>