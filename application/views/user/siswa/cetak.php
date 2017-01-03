<div class="row">
	<div class="col-md-12 col-xs-12 col-sm-12">
		<div class="box box-primary">
			<div class="page-header" align="center">
				<h3>Kartu Pendaftaran</h3>
			</div>
			<?php echo $kartu_peserta; ?>
			<div class="clearfix">
				
			</div>
			<form action="<?php echo base_url('siswa/cetak'); ?>" method="POST" accept-charset="utf-8">
				<input type="submit" class="btn btn-primary" name="submit" value="Cetak">
			</form>
		</div>
	</div>
</div>