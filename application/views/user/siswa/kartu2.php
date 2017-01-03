
<table>
	<tbody>
		<tr bgcolor="#0A2F58">
			<td colspan="2">
				<h3 align="center"><font color="#FFF">PENERIMAAN PESERTA DIDIK BARU <br>
				SMKN 88 BANDUNG <br>
				Kartu Peserta</font></h3>
			</td>
		</tr>
		<tr>
			<td width="50%">
				<strong>NOMOR PESERTA</strong>&nbsp;&nbsp;&nbsp; : PPDBO-<?php echo $siswa->NISN; ?> <br>
				<strong>NAMA LENGKAP </strong>	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;  : <?php echo " " .$siswa->nama_lengkap; ?> <br>
				<strong>ASAL SEKOLAH </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo " " .$siswa->nama_sekolah; ?> <br>
				<strong>ALAMAT</strong> <br>
				<address>
				<?php echo $siswa->detail .", " .$siswa->desa; ?><br>
				<?php echo $siswa->nama_kecamatan .", " .$siswa->nama_kota; ?> <br>
				<?php echo $siswa->nama_provinsi; ?> <br><br>
				</address>
			</td>
			<td valign="top">
				<strong>ALAMAT PADA SAAT MENGIKUTI UJIAN (HARUS DIISI)</strong> <br>
				<strong>ALAMAT</strong> &nbsp; : ..................................................................................................<br>........................................................................................................................<br>........................................................................................................................<br>
				<strong>KONTAK</strong> &nbsp; : <?php echo $siswa->kontak; ?>
			</td>		
		</tr>
		<tr>
			<td>
				<img height="250" src="<?php echo base_url('upload/').$siswa->foto; ?>" alt="Foto Siswa">
			</td>
			<td valign="top">
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
			</td>
		</tr>
		<tr>
			<td valign="top" colspan="2">
				
				<strong>JADWAL TEST</strong> <br>
				Hari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Waktu &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Materi <br>
				Senin, 8 Januari 2018 &nbsp;&nbsp;&nbsp;&nbsp; 07.00-09.30 &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $siswa->jurusan1; ?> <br>
				Senin, 8 Januari 2018 &nbsp;&nbsp;&nbsp;&nbsp; 09.30-12.00 &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $siswa->jurusan2; ?>
				
			</td>
		</tr>
		<tr>
		<br>
			<td>
					<strong>PERLENGKAPAN YANG HARUS DIBAWA PADA SAAT UJIAN</strong>
			</td>
			<td valign="top">
				<strong>PERNYATAAN</strong>
			</td>
		</tr>
		<tr>
			<td rowspan="2" valign="top">
			1. Kartu peserta ini <br>
			2. Fotokopi ijazah yang telah dilegalisir atau tanda lulus asli <br>
			3. Pensil 2B secukupnya, karet penghapus, peraut pensil (jika diperlukan)
			</td>
			<td valign="top">
				<strong>
					DENGAN INI SAYA MENYATAKAN BAHWA DATA YANG SAYA ISIKAN DALAM BORANG PENDAFTARAN PPDB ONLINE SMKN 88 BANDUNG ADALAH BENAR
				</strong>
			</td>
		</tr>
		<tr>
			<td align="right">
				<br><br>
				<p>
					Tanda Tangan dan Nama Lengkap <br><br><br><br><br><br>
					....................................................
				</p>
			</td>
		</tr>
	</tbody>
</table>