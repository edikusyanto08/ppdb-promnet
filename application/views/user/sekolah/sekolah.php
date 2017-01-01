<style type="text/css" media="screen">
	.hide {
		display: none;
	}
</style>
<script type="text/javascript" charset="utf-8" >
	function hide()
	{
		var x = document.getElementById('hide');
		x.className = 'hide';
	}
</script>

<?php
	if (isset($first_log)) {
?>
<div id="hide" class="col-md-12 col-sm-12 col-xs-12">
	<div class="box box-solid bg-teal-gradient">
        <div class="box-header">
          <i class="fa fa-check"></i>

          <p class="box-title">
          	Selamat datang <?php echo $this->session->userdata('nama_sekolah'); ?>. Pendaftaran berhasil. Silahkan ubah kata sandi default anda untuk keamanan.
          </p>

          <div class="box-tools pull-right">
            <button type="button" class="btn bg-teal btn-sm" onclick="hide()" ><i class="fa fa-times"></i>
            </button>
          </div>
        </div>
    </div>
</div>
<?php
	}
?>

<div class="col-md-3 col-sm-3 col-xs-12">
	<div class="small-box bg-aqua">
	    <div class="inner">
	 	   <h3><?php 
	 	   		if (isset($mendaftar)) {
	 	   			echo $mendaftar;
	 	   		}else echo "0";
	 	   ?></h3>

	    	<p>Siswa Mendaftar</p>
	    </div>
	    <div class="icon">
	    	<i class="fa fa-user"></i>
	    </div>
	    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	</div>
</div>

<div class="col-md-3 col-sm-3 col-xs-12">
	<div class="small-box bg-red">
	    <div class="inner">
	 	   <h3><?php 
	 	   		if (isset($pending)) {
	 	   			echo $pending;
	 	   		}else echo "0";
	 	   ?></h3>

	    	<p>Siswa Pending</p>
	    </div>
	    <div class="icon">
	    	<i class="fa fa-user"></i>
	    </div>
	    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	</div>
</div>

<div class="col-md-3 col-sm-3 col-xs-12">
	<div class="small-box bg-green">
	    <div class="inner">
	 	   <h3><?php 
	 	   		if (isset($terdaftar)) {
	 	   			echo $terdaftar;
	 	   		}else echo "0";
	 	   ?></h3>

	    	<p>Siswa Terdaftar</p>
	    </div>
	    <div class="icon">
	    	<i class="fa fa-user"></i>
	    </div>
	    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	</div>
</div>

<div class="col-md-3 col-sm-3 col-xs-12">
	<div class="small-box bg-blue">
	    <div class="inner">
	 	   <h3><?php 
	 	   		if (isset($diterima)) {
	 	   			echo $diterima;
	 	   		}else echo "0";
	 	   ?></h3>

	    	<p>Siswa Diterima</p>
	    </div>
	    <div class="icon">
	    	<i class="fa fa-user"></i>
	    </div>
	    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	</div>
</div>