<div class="row">
	<?php
		if ($this->session->has_userdata('status')) {
	?>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-check"></i>

              <h6 class="box-title"><?php echo $this->session->flashdata('status'); ?></h6>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
        </div>
	</div>
	<?php
		}
	?>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="box box-primary">
					<div class="container-fluid">
						<div class="page-header">
							<h3>Tanggal Pendaftaran</h3>
						</div>
						<div class="page-content">
							<form action="<?php echo base_url('admin/proses_pengaturan'); ?>" method="POST" accept-charset="utf-8">
								<div class="form-group">
									<label for="nama_tetapan">Tanggal Pendaftaran</label>
									<input type="date" class="form-control" name="isi_tetapan" value="<?php if(isset($tanggal_pendaftaran)) echo $tanggal_pendaftaran; ?>" placeholder="">
								</div>
								<div class="form-group">
									<input type="hidden" name="ID_tetapan" value="1">
									<button class="btn btn-primary" type="submit">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="box box-primary">
					<div class="container-fluid">
						<div class="page-header">
							<h3>Tanggal Pengumuman</h3>
						</div>
						<div class="page-content">
							<form action="<?php echo base_url('admin/proses_pengaturan'); ?>" method="POST" accept-charset="utf-8">
								<div class="form-group">
									<label for="nama_tetapan">Tanggal Pengumuman</label>
									<input type="date" class="form-control" name="isi_tetapan" value="<?php if(isset($tanggal_pengumuman)) echo $tanggal_pengumuman; ?>" placeholder="">
								</div>
								<div class="form-group">
									<input type="hidden" name="ID_tetapan" value="2">
									<button class="btn btn-primary" type="submit">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>