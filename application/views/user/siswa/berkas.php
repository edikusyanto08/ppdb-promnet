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
						    <input type="file" name="ijazah" value="" placeholder="">
						  </div>
						</div>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title">Scan SKHUN</h3>
						  </div>
						  <div class="panel-body">
						    <input type="file" name="skhun" value="" placeholder="">
						  </div>
						</div>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title">Scan Kartu Keluarga</h3>
						  </div>
						  <div class="panel-body">
						    <input type="file" name="kk" value="" placeholder="">
						  </div>
						</div>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title">Scan Surat Keterengan Berkelakuan Baik</h3>
						  </div>
						  <div class="panel-body">
						    <input type="file" name="skkb" value="" placeholder="">
						  </div>
						</div>
					</div>

					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title">Scan Rapor</h3>
						  </div>
						  <div class="panel-body">
						    <input type="file" name="rapor" value="" placeholder="">
						  </div>
						</div>
					</div>

					<div class="clearfix">
						
					</div>
				</form>
			</div>
		</div>
	</div>
</div>