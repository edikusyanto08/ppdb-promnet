<table width="100%" border="1">
	<caption align="center">Daftar Akun PPDB Online SMKN 88 Bandung</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>NISN</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Password</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$c = 1;
			foreach ($list_siswa as $value) {
		?>
				<tr>
					<td align="center"><?php echo $c; ?></td>
					<td align="center"><?php echo $value->NISN; ?></td>
					<td align="center"><?php echo $value->nama_lengkap; ?></td>
					<td align="center"><?php echo $value->username; ?></td>
					<td align="center"><?php echo $value->password; ?></td>
				</tr>
		<?php
				$c++;
			}
		?>
	</tbody>
</table>
<div align="center">
	*ketika siswa login password akan dienkripsi untuk keamanan.
</div>