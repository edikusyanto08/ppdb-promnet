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
				<h3 align="center">Verifikasi</h3>
			</div>
			<?php
				$i = 0;
				foreach ($kelengkapan as $key => $value) {
					if($i == 4){
			?>
						<div class="clearfix">
							
						</div>
			<?php
					}
					$i++;
					if ($value == 1) {
			?>
						<div class="col-md-3 col-sm-6 col-xs-12">
				          <div class="info-box bg-green">
				            <span class="info-box-icon" style="padding: 20px;"><i class="fa fa-check"></i></span>

				            <div class="info-box-content">
				              <span class="info-box-text">Data <?php echo $key; ?></span>
				              <span class="info-box-number">LENGKAP</span>

				              <div class="progress">
				                <div class="progress-bar" style="width: 100%"></div>
				              </div>
				                  <span class="progress-description">
				                  	<?php
				                  		$data[0] = 'Nice';
				                  		$data[1] = 'Good';
				                  		$data[2] = 'Great';
				                  		$r = rand(0, 2);
				                  		echo $data[$r];
				                  	?>
				                    job!
				                  </span>
				            </div>
				            <!-- /.info-box-content -->
				          </div>
				          <!-- /.info-box -->
				        </div>
			<?php
					}else {
			?>
						<div class="col-md-3 col-sm-6 col-xs-12">
				          <div class="info-box bg-red">
				            <span class="info-box-icon" style="padding: 20px;"><i class="fa fa-exclamation-circle"></i></span>

				            <div class="info-box-content">
				              <span class="info-box-text">Data <?php echo $key; ?></span>
				              <span class="info-box-number">BELUM LENGKAP</span>

				              <div class="progress">
				                <div class="progress-bar" style="width: 70%"></div>
				              </div>
				            </div>
				            <!-- /.info-box-content -->
				          </div>
				          <!-- /.info-box -->
				        </div>
			<?php
					}
				}
			?>
			<?php
				if ($verifikasi == TRUE) {
					if($siswa->status_pendaftaran > 1){
			?>
						<div class="col-md-12 col-sm-12 col-xs-12" align="center">
							<button type="button" class="btn btn-success">Data sudah disubmit</button>
						</div>
			<?php
					}else{
			?>
					<div class="col-md-12 col-sm-12 col-xs-12" align="center">
						<form action="<?php echo base_url('siswa/submit'); ?>" method="POST" accept-charset="utf-8">
							<input type="hidden" name="ID_siswa" value="<?php echo $this->session->userdata('ID_siswa'); ?>">
							<button type="submit" class="btn btn-success">Submit</button>
						</form>
					</div>
			<?php
					}
				}
			?>
	        <div class="clearfix">
	        	
	        </div>
		</div>
	</div>
</div>