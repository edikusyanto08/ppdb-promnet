<div class="col-md-12 col-sm-12 col-xs-12">
	<?php echo $header; ?>
	<center>
		<h3>KARTU PESERTA</h3>
	</center>
	<div class="col-md-7 col-xs-7 col-sm-7">
		<div class="container-fluid">
			<strong>NOMOR PESERTA</strong> : PPDBO-<?php echo $siswa->NISN; ?> <br>
			<strong>NAMA LENGKAP</strong>&emsp;: <?php echo $siswa->nama_lengkap; ?> <br>
			<strong>ASAL SEKOLAH </strong>&nbsp;&nbsp;&nbsp; : <?php echo $siswa->nama_sekolah; ?> <br>
			<strong>ALAMAT</strong> <br>
			<?php echo $siswa->detail .", " .$siswa->desa; ?><br>
			<?php echo $siswa->nama_kecamatan .", " .$siswa->nama_kota; ?> <br>
			<?php echo $siswa->nama_provinsi; ?> <br><br>
			<div class="row">
				<div class="col-md-5">
					<img src="<?php echo base_url('upload/').$siswa->foto; ?>" alt="Foto Siswa" class="img-responsive">
				</div>
				<div class="col-md-7">
					<strong>JADWAL TEST</strong>
					<table class="table">
						<thead>
							<tr>
								<th>Hari/Tanggal</th>
								<th>Waktu</th>
								<th>Materi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Senin, 8 Januari 2018</td>
								<td>07.00-09.30</td>
								<td><?php echo $siswa->jurusan1; ?></td>
							</tr>
							<tr>
								<td>Senin, 8 Januari 2018</td>
								<td>09.30-12.00</td>
								<td><?php echo $siswa->jurusan2; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-5 col-xs-5 col-sm-5">
		<strong>ALAMAT PADA SAAT MENGIKUTI UJISN (HARUS DIISI)</strong> <br>
		<strong>ALAMAT</strong> &nbsp; : ..................................................................................................<br>..................................................................................................<br>..................................................................................................<br>
		<strong>KONTAK</strong> &nbsp; : <?php echo $siswa->kontak; ?>
		<br><br>
		<strong>PILIHAN JURUSAN</strong> <br>
		<ol>
			<li><?php echo $siswa->jurusan1; ?></li>
			<li><?php echo $siswa->jurusan2; ?></li>
		</ol>
		<br>
		<strong>LOKASI UJIAN</strong> <br>
		<address>
		  Kelas IX RPL Gd Teknik Lt2 <br>
		  SMK Negeri 88 Bandung <br>
		  Jl Merdeka No 88<br>
		  Kota Bandung, Jawa Barat<br>
		  <abbr title="Phone"><i class="fa fa-phone"></i></abbr> (123) 456-7890
		</address>

	</div>

</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="container-fluid">
		<br>
		<div class="col-md-7 col-sm-7 col-xs-7">
			<strong>PERLENGKAPAN YANG HARUS DIBAWA PADA SAAT UJIAN</strong>
			<ol>
				<li>Kartu peserta ini</li>
				<li>Fotokopi ijazah yang telah dilegalisir atau tanda lulus asli</li>
				<li>Pensil 2B secukupnya, karet penghapus, peraut pensil (jika diperlukan)</li>
			</ol>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
		<strong>PERNYATAAN</strong>
		<div class="clearfix">
			
		</div>
		<p>
			<strong>
				DENGAN INI SAYA MENYATAKAN BAHWA DATA YANG SAYA ISIKAN DALAM BORANG PENDAFTARAN PPDB ONLINE SMKN 88 BANDUNG ADALAH BENAR
			</strong>
		</p>
		<p class="pull-right">
			Tanda tangan dan Nama Lengkap <br><br><br><br>
			....................................................
		</p>
		</div>
	</div>
</div>