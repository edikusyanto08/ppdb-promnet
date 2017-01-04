<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="box box-primary">
			<div class="container">
				<div class="page-header" align="center">
					<h3>Detail <?php echo $sekolah->	nama_sekolah; ?></h3>
				</div>
				<div class="page-content">
					<div class="col-md-offset-3 col-sm-6 col-xs-12">
						<table class="table">
							<tbody>
								<tr>
									<td>NPSN</td>
									<td>:</td>
									<td><?php echo $sekolah->NPSN; ?></td>
								</tr>

								<tr>
									<td>Nama Sekolah</td>
									<td>:</td>
									<td><?php echo $sekolah->nama_sekolah; ?></td>
								</tr>

								<tr>
									<td>Alamat Email</td>
									<td>:</td>
									<td><?php echo $sekolah->email; ?></td>
								</tr>

								<tr>
									<td>Kontak</td>
									<td>:</td>
									<td><?php echo $sekolah->kontak; ?></td>
								</tr>

								<tr>
									<td>Provinsi</td>
									<td>:</td>
									<td><?php echo $sekolah->nama_provinsi; ?></td>
								</tr>

								<tr>
									<td>Kota</td>
									<td>:</td>
									<td><?php echo $sekolah->nama_kota; ?></td>
								</tr>

								<tr>
									<td>Kecamatan</td>
									<td>:</td>
									<td><?php echo $sekolah->nama_kecamatan; ?></td>
								</tr>
								
								<tr>
									<td>Detail Alamat</td>
									<td>:</td>
									<td><?php echo $sekolah->detail; ?></td>
								</tr>

								<tr>
									<td>Daerah</td>
									<td>:</td>
									<td><?php echo $sekolah->daerah;?></td>
								</tr>

								<tr>
									<td>Status Sekolah</td>
									<td>:</td>
									<td><?php echo $sekolah->status_sekolah;?></td>
								</tr>

								<tr>
									<td>Akreditas</td>
									<td>:</td>
									<td><?php echo $sekolah->akreditasi;?></td>
								</tr>
								<tr>
									<td colspan="3">
										<a href="<?php echo base_url('admin/verifikasi/sekolah/1/') .$sekolah->ID_sekolah; ?>" title="Verifikasi">
                        <button type="button" class="btn btn-sm btn-success"><span class="fa fa-check"> </span> Verifikasi Sekolah</button>
                      </a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>