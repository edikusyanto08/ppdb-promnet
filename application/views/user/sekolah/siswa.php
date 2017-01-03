<style type="text/css">
	.hide {
		display: none;
	}
	th {
		font-size: 14px !important;
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
	if ($this->session->has_userdata('status')) {
?>
	<!-- npotifikasi -->
	<div id="hide" class="col-md-12 col-sm-12 col-xs-12">
		<div class="box box-solid bg-teal-gradient">
	        <div class="box-header">
	          <i class="fa fa-check"></i>

	          <p class="box-title">
	          	<?php echo $this->session->flashdata('status'); ?>
	          </p>

	          <div class="box-tools pull-right">
	            <button type="button" class="btn bg-teal btn-sm" onclick="hide()" data-widget="remove"><i class="fa fa-times"></i>
	            </button>
	          </div>
	        </div>
	    </div>
	</div>
<?php
	}
?>

<div class="row">
	<div class="col-md-7 col-sm-12 col-xs-12">
		<div class="box box-info">
			<div class="page-header">
				<h4>Daftar Siswa</h4>
			</div>
			<div class="table-responsive container-fluid">
				<table class="table" id="example1">
					<thead>
						<tr>
							<th>No</th>
							<th>NISN</th>
							<th>Nama Siswa</th>
							<th>Username</th>
							<th>Password</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if ($list_siswa != NULL) {
								$c = 1;
								foreach ($list_siswa as $value) {
						?>
									<tr>
										<td><?php echo $c; ?></td>
										<td><?php echo $value->NISN; ?></td>
										<td><?php echo $value->nama_lengkap; ?></td>
										<td><?php echo $value->username; ?></td>
										<td>
											<?php
												if (strlen($value->password) >= 32) {
											?>
													<span class="text-danger">Dienkripsi</span>
											<?php
												}else {
													echo $value->password;
												}
											?>
											
										</td>
										<td><button type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button></td>
									</tr>
						<?php
									$c++;
								}
							}
						?>
					</tbody>
				</table>
				<p class="text-danger">
					*ketika siswa login password akan dienkripsi untuk keamanan.
				</p>
			</div>
		</div>
	</div>

	<div class="col-md-5 col-sm-12 col-xs-12">
		<div class="box box-info">
			<div class="page-header">
				<h4>Daftarkan Siswa</h4>
			</div>
			<div class="form-responsive">
				<form action="<?php echo base_url('ppdb/proses_siswa'); ?>" method="POST" accept-charset="utf-8">
					<div class="form-group">
						<label for="nisn">NISN</label>
						<input type="text" id="NISN" class="form-control" name="NISN" value="" placeholder="NISN Siswa">
					</div>

					<div class="form-group">
						<label for="nama_lengkap">Nama Lengkap</label>
						<input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap" value="" placeholder="Nama Lengkap Siswa">
					</div>

					<div class="form-group">
						<input type="hidden" name="ID_sekolah" value="<?php echo $this->session->userdata('ID_sekolah'); ?>">
						<button type="submit" class="btn btn-primary">Daftarkan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>