<div class="wrapper row4">
	<div id="container" class="clear"> 
	    <!-- ####################################################################################################### -->
	    <div id="homepage" class="clear">
	    	<div class="page-header">
	    		<h3><strong><font color="#000">Pengumuman Penerimaan Peserta Didik Baru Tahun Ajaran 2017/2018</font></strong></h3>
	    	</div>
	    	<div class="page-content" style="color: #000">
	    		<P>
	    			Serangkaian tahap penerimaan peserta didik baru telah dilewati dan berikut adalah daftar peserta didik yang berhasil melewati serangkaian proses penerimaan peserta didik bari di <strong>SMKN 88 Bandung</strong>. berikut daftar peserta didik yang diterima dan nama jurusannya.
	    		</P>

	    		<table>
	    			<caption>Daftar peserta didik baru SMKN 88 Bandung</caption>
	    			<thead>
	    				<tr>
	    					<th>No</th>
	    					<th>NISN</th>
	    					<th>Nama Lengkap</th>
	    					<th>Asal Sekolah</th>
	    					<th>Nama Jurusan</th>
	    					<th>Status</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				<?php
	    					$c = 1;
	    					foreach ($list_diterima as $value) {
	    				?>
	    						<tr>
	    							<td><?php echo $c; ?></td>
	    							<td><?php echo $value->NISN; ?></td>
	    							<td><?php echo $value->nama_lengkap; ?></td>
	    							<td><?php echo $value->nama_sekolah; ?></td>
	    							<td><?php echo $value->nama_jurusan; ?></td>
	    							<td>Diterima</td>
	    						</tr>
	    				<?php
	    					}
	    				?>
	    			</tbody>
	    		</table>
	    	</div>
	    </div>
	</div>
</div>