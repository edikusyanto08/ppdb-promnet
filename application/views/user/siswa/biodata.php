<style type="text/css" media="screen">
	.hide {
		display: none;
	}
</style>
<script type="text/javascript" charset="utf-8" >
	function hide()
	{
		var x = document.getElementById('hide');
		x.className = 'hide';
	}
</script>

<!-- notifikasi -->
<?php
	if ($this->session->has_userdata('status')) {
?>
<div id="hide" class="col-md-12 col-sm-12 col-xs-12">
	<div class="box box-solid bg-teal-gradient">
        <div class="box-header">
          <i class="fa fa-check"></i>

          <p class="box-title">
          	<?php echo $this->session->flashdata('status'); ?>
          </p>

          <div class="box-tools pull-right">
            <button type="button" class="btn bg-teal btn-sm" onclick="hide()" ><i class="fa fa-times"></i>
            </button>
          </div>
        </div>
    </div>
</div>
<?php
	}
?>
<!-- end of notifikasi -->

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="box box-primary">
			<div class="page-header" align="center">
				<h3>Biodata</h3>
			</div>
			<form action="<?php echo base_url('siswa/proses_biodata'); ?>" method="POST" class="form-horizontal">
				<!-- datadiri -->
				<div class="col-md-6 col-sm-12 col-xs-12">
					<h4>Data Diri</h4>
					<hr>
					<div class="form-group">
		              <label for="NISN" class="col-sm-3 col-md-3 col-xs-12 control-label">NISN</label>
		              <div class="col-sm-7">
		                <input type="text" class="form-control" name="NISN" id="NISN" value="<?php echo $siswa['siswa']->NISN; ?>" placeholder="Nomor Induk Siswa Nasional" required disabled />
		              </div>
		            </div>

					<div class="form-group">
		              <label for="nama_lengkap" class="col-sm-3 col-md-3 col-xs-12 control-label">Nama Lengkap</label>
		              <div class="col-sm-7">
		                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?php echo $siswa['siswa']->nama_lengkap; ?>" placeholder="Nama Lengkap" required disabled />
		              </div>
		            </div>

		            <div class="form-group">
		              <label for="email" class="col-sm-3 col-md-3 col-xs-12 control-label">Alamat Email</label>
		              <div class="col-sm-7">
		                <input type="email" class="form-control" name="email" id="email" value="<?php echo $siswa['siswa']->email; ?>" placeholder="Alamat Email" />
		              </div>
		            </div>

		            <div class="form-group">
		              <label for="kontak" class="col-sm-3 col-md-3 col-xs-12 control-label">Nomor Kontak</label>
		              <div class="col-sm-7">
		                <input type="text" class="form-control" name="kontak" id="kontak" value="<?php echo $siswa['siswa']->kontak; ?>" placeholder="Nomor Kontak" required />
		              </div>
		            </div>

		            <div class="form-group">
		              <label for="sekolah" class="col-sm-3 col-md-3 col-xs-12 control-label">Sekolah Asal</label>
		              <div class="col-sm-7">
		                <input type="text" class="form-control" id="sekolah" value="<?php echo $siswa['sekolah']->nama_sekolah; ?>" placeholder="Sekolah Asal" required disabled />
		              </div>
		            </div>

				</div>
				<!-- end of datadiri -->

				<!-- data alamat -->
				<div class="col-md-6 col-sm-12 col-xs-12">
					<h4>Data Alamat</h4>
					<hr>

					<div class="form-group">
		              <label for="provinsi" class="col-sm-3 col-md-3 col-xs-12 control-label">Provinsi</label>
		              <div class="col-sm-7">
		                <select name="provinsi" class="form-control select2" required placeholder="Provinsi" >
		                	<option value=""></option>
		                	<?php
		                		foreach ($provinsi as $value) {
		                	?>
		                			<option <?php if(isset($siswa['alamat'])){ if($siswa['alamat']->provinsi == $value->ID_provinsi) echo "selected";} ?> value="<?php echo $value->ID_provinsi ?>"><?php echo $value->nama_provinsi; ?></option>
		                	<?php
		                		}
		                	?>
		                </select>
		              </div>
		            </div>

		            <div class="form-group">
		              <label for="kota" class="col-sm-3 col-md-3 col-xs-12 control-label">Kota</label>
		              <div class="col-sm-7">
		                <select name="kota" class="form-control select2" required placeholder="kota" >
		                	<option value=""></option>
		                	<?php
		                		foreach ($kota as $value) {
		                	?>
		                			<option <?php if(isset($siswa['alamat'])){ if($siswa['alamat']->kota == $value->ID_kota) echo "selected";} ?> value="<?php echo $value->ID_kota ?>"><?php echo $value->nama_kota; ?></option>
		                	<?php
		                		}
		                	?>
		                </select>
		              </div>
		            </div>

		            <div class="form-group">
		              <label for="kecamatan" class="col-sm-3 col-md-3 col-xs-12 control-label">Kecamatan</label>
		              <div class="col-sm-7">
		                <select name="kecamatan" class="form-control select2" required placeholder="Kecamatan" >
		                	<option value=""></option>
		                	<?php
		                		foreach ($kecamatan as $value) {
		                	?>
		                			<option <?php if(isset($siswa['alamat'])){ if($siswa['alamat']->kecamatan == $value->ID_kecamatan) echo "selected";} ?> value="<?php echo $value->ID_kecamatan; ?>"><?php echo $value->nama_kecamatan; ?></option>
		                	<?php
		                		}
		                	?>
		                </select>
		              </div>
		            </div>

		            <div class="form-group">
		              <label for="desa" class="col-sm-3 col-md-3 col-xs-12 control-label">Desa</label>
		              <div class="col-sm-7">
		                <input type="text" id="desa" class="form-control" name="desa" value="<?php if(isset($siswa['alamat'])) echo $siswa['alamat']->desa; ?>" placeholder="Desa">
		              </div>
		            </div>

		            <div class="form-group">
		              <label for="detail" class="col-sm-3 col-md-3 col-xs-12 control-label">Detail Alamat</label>
		              <div class="col-sm-7">
		              	<textarea id="detail" class="form-control" rows="5" name="detail"><?php if(isset($siswa['alamat'])) echo $siswa['alamat']->detail; ?></textarea>
		              </div>
		            </div>

				</div>
				<!-- end of alamat -->

				<div class="clearfix">
					
				</div>

				<!-- data orangtua -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h4>Data Orangtua</h4>
					<hr>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
			              <label for="nama_ayah" class="col-sm-3 col-md-3 col-xs-12 control-label">Nama Ayah</label>
			              <div class="col-sm-7">
			                <input type="text" id="nama_ayah" class="form-control" name="nama_ayah" value="<?php if(isset($siswa['orangtua'])) echo $siswa['orangtua']->nama_ayah; ?>" placeholder="Nama Ayah" required />
			              </div>
			            </div>

			            <div class="form-group">
			              <label for="pekerjaan_ayah" class="col-sm-3 col-md-3 col-xs-12 control-label">Pekerjaan Ayah</label>
			              <div class="col-sm-7">
			                <input type="text" id="pekerjaan_ayah" class="form-control" name="pekerjaan_ayah" value="<?php if(isset($siswa['orangtua'])) echo $siswa['orangtua']->pekerjaan_ayah; ?>" placeholder="Pekerjaan Ayah" required />
			              </div>
			            </div>

			            <div class="form-group">
			              <label for="penghasilan_ayah" class="col-sm-3 col-md-3 col-xs-12 control-label">Penghasilan Ayah</label>
			              <div class="col-sm-7">
			                <input type="number" min="0" step="1000" id="penghasilan_ayah" class="form-control" name="penghasilan_ayah" value="<?php if(isset($siswa['orangtua'])) echo $siswa['orangtua']->penghasilan_ayah; ?>" placeholder="Penghasilan Ayah" required />
			              </div>
			            </div>

			            <div class="form-group">
			              <label for="umur_ayah" class="col-sm-3 col-md-3 col-xs-12 control-label">Umur Ayah</label>
			              <div class="col-sm-7">
			                <input type="number" min="0" id="umur_ayah" class="form-control" name="umur_ayah" value="<?php if(isset($siswa['orangtua'])) echo $siswa['orangtua']->umur_ayah; ?>" placeholder="Umur Ayah" required />
			              </div>
			            </div>

			            <div class="form-group">
			              <label for="kontak_ayah" class="col-sm-3 col-md-3 col-xs-12 control-label">Kontak Ayah</label>
			              <div class="col-sm-7">
			                <input type="text" id="kontak_ayah" class="form-control" name="kontak_ayah" value="<?php if(isset($siswa['orangtua'])) echo $siswa['orangtua']->kontak_ayah; ?>" placeholder="Kontak Ayah" required />
			              </div>
			            </div>

					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
			              <label for="nama_ibu" class="col-sm-3 col-md-3 col-xs-12 control-label">Nama Ibu</label>
			              <div class="col-sm-7">
			                <input type="text" id="nama_ibu" class="form-control" name="nama_ibu" value="<?php if(isset($siswa['orangtua'])) echo $siswa['orangtua']->nama_ibu; ?>" placeholder="Nama Ibu" required />
			              </div>
			            </div>

			            <div class="form-group">
			              <label for="pekerjaan_ibu" class="col-sm-3 col-md-3 col-xs-12 control-label">Pekerjaan Ibu</label>
			              <div class="col-sm-7">
			                <input type="text" id="pekerjaan_ibu" class="form-control" name="pekerjaan_ibu" value="<?php if(isset($siswa['orangtua'])) echo $siswa['orangtua']->pekerjaan_ibu; ?>" placeholder="Pekerjaan Ibu" required />
			              </div>
			            </div>

			            <div class="form-group">
			              <label for="penghasilan_ibu" class="col-sm-3 col-md-3 col-xs-12 control-label">Penghasilan Ibu</label>
			              <div class="col-sm-7">
			                <input type="number" min="0" step="1000" id="penghasilan_ibu" class="form-control" name="penghasilan_ibu" value="<?php if(isset($siswa['orangtua'])) echo $siswa['orangtua']->penghasilan_ibu; ?>" placeholder="Penghasilan Ibu" required />
			              </div>
			            </div>

			            <div class="form-group">
			              <label for="umur_ibu" class="col-sm-3 col-md-3 col-xs-12 control-label">Umur Ibu</label>
			              <div class="col-sm-7">
			                <input type="number" min="0" id="umur_ibu" class="form-control" name="umur_ibu" value="<?php if(isset($siswa['orangtua'])) echo $siswa['orangtua']->umur_ibu; ?>" placeholder="Umur Ibu" required />
			              </div>
			            </div>

			            <div class="form-group">
			              <label for="kontak_ibu" class="col-sm-3 col-md-3 col-xs-12 control-label">Kontak Ibu</label>
			              <div class="col-sm-7">
			                <input type="text" id="kontak_ibu" class="form-control" name="kontak_ibu" value="<?php if(isset($siswa['orangtua'])) echo $siswa['orangtua']->kontak_ibu; ?>" placeholder="Kontak Ibu" required />
			              </div>
			            </div>
					</div>
				</div>
				<!-- end of data orangtua -->

				<div class="clearfix">
					
				</div>

				<div class="form-group" align="center">
					<input type="hidden" name="ID_siswa" value="<?php echo $siswa['siswa']->ID_siswa; ?>">
					<input type="submit" name="submit" class="btn btn-success" value="Simpan">
				</div>
			</form>
		</div>
	</div>

</div>