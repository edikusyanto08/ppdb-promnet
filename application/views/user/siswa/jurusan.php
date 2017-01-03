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
				<h3 align="center">Pilih Jurusan</h3>
			</div>
			<form action="<?php echo base_url('siswa/proses_jurusan'); ?>" method="POST" accept-charset="utf-8">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="page-header">
						<h4>Pilihan Pertama</h4>
					</div>
					<div class="form-group">
						<select name="pilihan1" class="select2 form-control">
							<option value=""></option>
							<?php
								foreach ($jurusan as $value) {
							?>
									<option <?php if(isset($pilihan)){if($pilihan->pilihan1 == $value->ID_jurusan) echo "selected";} ?> value="<?php echo $value->ID_jurusan; ?>"><?php echo $value->nama_jurusan; ?></option>
							<?php
								}
							?>
						</select>
					</div>
				</div>

				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="page-header">
						<h4>Pilihan Kedua</h4>
					</div>
					<div class="form-group">
						<select name="pilihan2" class="select2 form-control">
							<option value=""></option>
							<?php
								foreach ($jurusan as $value) {
							?>
									<option <?php if(isset($pilihan)){if($pilihan->pilihan2 == $value->ID_jurusan) echo "selected";} ?> value="<?php echo $value->ID_jurusan; ?>"><?php echo $value->nama_jurusan; ?></option>
							<?php
								}
							?>
						</select>
					</div>
				</div>
				<?php
					if ($status_pendaftaran->status_pendaftaran <= 2) {
				?>

				<div class="col-md-12 col-sm-12 col-xs-12" align="center">
					<input type="hidden" name="ID_siswa" value="<?php echo $this->session->userdata('ID_siswa'); ?>">
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>

				<?php
					}
				?>
			</form>

			<div class="clearfix">
				
			</div>
		</div>
	</div>
</div>