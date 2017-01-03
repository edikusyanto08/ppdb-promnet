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

<!-- notifikasi -->
<?php
	if ($this->session->has_userdata('status')) {
?>
<div id="hide" class="col-md-12 col-sm-12 col-xs-12">
	<div class="box box-solid bg-teal-gradient">
        <div class="box-header">
          <i class="fa fa-check"></i>

          <p class="box-title">
          	<?php echo $this->session->flashdata('status'); ?>
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
<!-- end of notifikasi -->

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="box box-primary">
			<div class="page-header">
				<h3 align="center">Berkas</h3>
			</div>
			<div class="page-content">
				<form action="<?php echo base_url('siswa/proses_berkas'); ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title">Scan Ijazah</h3>
						  </div>
						  <div class="panel-body">
						    <div class="form-group">
						    	<input type="file" name="Ijazah" value="" placeholder="">
						    </div>
						    <?php
						    	if (isset($berkas->Ijazah)) {
						    		echo "File anda : " .$berkas->Ijazah;
						    	}
						    ?>
						  </div>
						</div>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title">Scan SKHUN</h3>
						  </div>
						  <div class="panel-body">
						    <div class="form-group">
						    	<input type="file" name="SKHUN" value="" placeholder="">
						    </div>
						    <?php
						    	if (isset($berkas->SKHUN)) {
						    		echo "File anda : " .$berkas->SKHUN;
						    	}
						    ?>
						  </div>
						</div>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title">Scan Kartu Keluarga</h3>
						  </div>
						  <div class="panel-body">
						    <div class="form-group">
						    	<input type="file" name="KK" value="" placeholder="">
						    </div>
						    <?php
						    	if (isset($berkas->KK)) {
						    		echo "File anda : " .$berkas->KK;
						    	}
						    ?>
						  </div>
						</div>
					</div>

					<div class="clearfix">

					</div>

					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title">Scan Surat Keterengan Berkelakuan Baik</h3>
						  </div>
						  <div class="panel-body">
						    <div class="form-group">
						    	<input type="file" name="SKKB" value="" placeholder="">
						    </div>
						    <?php
						    	if (isset($berkas->SKKB)) {
						    		echo "File anda : " .$berkas->SKKB;
						    	}
						    ?>
						  </div>
						</div>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title">Scan Rapor</h3>
						  </div>
						  <div class="panel-body">
						    <div class="form-group">
						    	<input type="file" name="rapor" value="" placeholder="">
						    </div>
						    <?php
						    	if (isset($berkas->rapor)) {
						    		echo "File anda : " .$berkas->rapor;
						    	}
						    ?>
						  </div>
						</div>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title">Pas Foto</h3>
						  </div>
						  <div class="panel-body">
						    <div class="form-group">
						    	<input type="file" name="foto" value="" placeholder="">
						    </div>
						    <?php
						    	if (isset($berkas->foto)) {
						    		echo "File anda : " .$berkas->foto;
						    	}
						    ?>
						  </div>
						</div>
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<input type="hidden" name="ID_siswa" value="<?php echo $this->session->userdata('ID_siswa'); ?>">
						<button type="submit" class="btn btn-primary">Upload</button>
					</div>
					<div class="clearfix">
						
					</div>
				</form>
			</div>
		</div>
	</div>
</div>