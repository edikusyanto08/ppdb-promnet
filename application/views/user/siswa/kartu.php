<table width="100%">
	<tbody>
		<?php echo $header; ?>
		<tr>
			<center>
				<h3>KARTU PESERTA</h3>
			</center>
			<td>
				<strong>NOMOR PESERTA</strong> : PPDBO-<?php echo $siswa->NISN; ?> <br>
				<strong>NAMA LENGKAP</strong>&emsp;: <?php echo $siswa->nama_lengkap; ?> <br>
				<strong>ASAL SEKOLAH </strong>&nbsp;&nbsp;&nbsp; : <?php echo $siswa->nama_sekolah; ?> <br>
				<strong>ALAMAT</strong> <br>
				<?php echo $siswa->detail .", " .$siswa->desa; ?><br>
				<?php echo $siswa->nama_kecamatan .", " .$siswa->nama_kota; ?> <br>
				<?php echo $siswa->nama_provinsi; ?> <br><br>

				<img src="<?php echo base_url('upload/').$siswa->foto; ?>" alt="Foto Siswa" class="img-responsive">
					
				<br><strong>JADWAL TEST</strong> <br>
						
									Senin, 8 Januari 2018
									07.00-09.30
									<?php echo $siswa->jurusan1; ?> <br>
									Senin, 8 Januari 2018
									09.30-12.00
									<?php echo $siswa->jurusan2; ?>
			</td>
			<td>
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
				  Jl Merdeka No 88<br>
				  Kota Bandung, Jawa Barat<br>
				  <abbr title="Phone"><i class="fa fa-phone"></i></abbr> (123) 456-7890
				</address>
			</td>		
		</tr>

		<tr>
		<br>
			<td>
					<strong>PERLENGKAPAN YANG HARUS DIBAWA PADA SAAT UJIAN</strong>
					<ol>
						<li>Kartu peserta ini</li>
						<li>Fotokopi ijazah yang telah dilegalisir atau tanda lulus asli</li>
						<li>Pensil 2B secukupnya, karet penghapus, peraut pensil (jika diperlukan)</li>
					</ol>
			</td>
			<td>
				<strong>PERNYATAAN</strong>
				<p>
					<strong>
						DENGAN INI SAYA MENYATAKAN BAHWA DATA YANG SAYA ISIKAN DALAM BORANG PENDAFTARAN PPDB ONLINE SMKN 88 BANDUNG ADALAH BENAR
					</strong>
				</p>
				<p>
					Tanda tangan dan Nama Lengkap <br><br><br><br>
					....................................................
				</p>
			</td>
		</tr>
	</tbody>
</table>