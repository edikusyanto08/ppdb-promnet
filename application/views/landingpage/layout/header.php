<body id="top">
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="<?php echo base_url(); ?>">SMKN 88 Bandung</a></h1>
      <p>Bersama membangun masa depan</p>
    </div>
    <form action="#" method="post" id="login">
      <fieldset>
        <legend>Login Siswa</legend>
        <input type="password" />
        <input type="text" />
        <div id="forgot">Butuh <a href="#">bantuan ?</a> or <a href="#">lupa password ?</a></div>
        <input type="image" src="<?php echo base_url('assets/landingpage/'); ?>layout/images/sign_in.gif" id="signin" alt="Sign In" />
      </fieldset>
    </form>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div id="topnav">
    <ul>
      <li class="active"><a href="index.html">Beranda</a></li>
      <li><a href="#">Profil</a></li>
      <li><a href="#">Sejarah</a></li>
      <li><a href="#">Program Studi</a>
        <ul>
          <?php
            if ($list_jurusan != NULL) {
              foreach ($list_jurusan as $value) {
          ?>
              <li><a href="<?php echo base_url('welcome/jurusan/') .$value->ID_jurusan; ?>"><?php echo $value->nama_jurusan; ?></a></li>
          <?php
              }
            }
          ?>
        </ul>
      </li>
      <li><a href="#">Fasilitas</a></li>
      <li class="last"><a href="<?php echo base_url('ppdb'); ?>">PPDB</a></li>
    </ul>
    <div  class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->