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

<?php
	if ($this->session->has_userdata('status2')) {
?>
	<div id="hide" class="col-md-12 col-sm-12 col-xs-12">
		<div class="box box-solid bg-teal-gradient">
	        <div class="box-header">
	          <i class="fa fa-check"></i>

	          <p class="box-title">
	          	<?php echo $this->session->flashdata('status2'); ?>
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

<div class="col-md-8 col-sm-8 col-xs-12">
	<div class="box box-primary">
		<form action="<?php echo base_url('sekolah/update_sekolah'); ?>" method="POST" accept-charset="utf-8">
			<div class="form-group">
				<label for="npsn">NPSN</label>
				<input type="text" name="npsn" id="npsn" class="form-control" disabled value="<?php echo $sekolah->NPSN; ?>" placeholder="">
			</div>

			<div class="form-group">
				<label for="nama_sekolah">Nama Sekolah</label>
				<input type="text" id="nama_sekolah" class="form-control" name="nama_sekolah" value="<?php echo $sekolah->nama_sekolah; ?>" placeholder="">
			</div>

			<div class="form-group">
				<label for="provinsi">Provinsi</label>
				<select name="provinsi" class="select2 form-control" class="form-control" required >
					<option value=""></option>
					<?php
						foreach ($list_provinsi as $value) {
					?>
						<option <?php if($sekolah->provinsi == $value->ID_provinsi) echo "selected"; ?> value="<?php echo $value->ID_provinsi; ?>"><?php echo $value->nama_provinsi; ?></option>
					<?php
						}
					?>
				</select>
			</div>

			<div class="form-group">
				<label for="kota">Kota</label>
				<select name="kota" class="select2 form-control" class="form-control" required >
					<option value=""></option>
					<?php
						foreach ($list_kota as $value) {
					?>
						<option <?php if($sekolah->kota == $value->ID_kota) echo "selected"; ?> value="<?php echo $value->ID_kota; ?>"><?php echo $value->nama_kota; ?></option>
					<?php
						}
						form_open('url', '', $hidden);
					?>
				</select>
			</div>

			<div class="form-group">
				<label for="kecamatan">Kecamatan</label>
				<select name="kecamatan" class="select2 form-control" class="form-control" required >
					<option value=""></option>
					<?php
						foreach ($list_kec as $value) {
					?>
						<option <?php if($sekolah->kecamatan == $value->ID_kecamatan) echo "selected"; ?> value="<?php echo $value->ID_kecamatan; ?>"><?php echo $value->nama_kecamatan; ?></option>
					<?php
						}
					?>
				</select>
			</div>

			<div class="form-group">
				<label for="detail">Detail</label>
				<textarea rows="5" name="detail" class="form-control"><?php echo $sekolah->detail; ?></textarea>
			</div>

			<div class="form-group">
				<label for="kontak">Kontak</label>
				<input type="text" name="kontak" class="form-control" value="<?php echo $sekolah->kontak; ?>" placeholder="">
			</div>

			<div class="form-group">
				<label for="daerah">Daerah</label>
				<select name="daerah" class="form-control">
					<option <?php if($sekolah->daerah == 'pedesaan') echo 'selected'; ?> value="pedesaan">Pedesaan</option>
					<option <?php if($sekolah->daerah == 'perkotaan') echo 'selected'; ?> value="perkotaan">Perkotaan</option>
				</select>
			</div>

			<div class="form-group">
				<label for="Akreditasi">Akreditasi</label>
				<select name="akreditasi" class="form-control" >
					<option <?php if($sekolah->akreditasi == 'A') echo "selected"; ?> value="A">A</option>
					<option <?php if($sekolah->akreditasi == 'B') echo "selected"; ?> value="B">B</option>
					<option <?php if($sekolah->akreditasi == 'C') echo "selected"; ?> value="C">C</option>
				</select>
			</div>

			<div class="form-group">
				<input type="hidden" name="ID_sekolah" value="<?php echo $sekolah->ID_sekolah; ?>">
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
		</form>
	</div>
</div>

<div class="col-md-4 col-sm-4 col-xs-12">
	<div class="box box-primary">
		<div class="page-header">
			<h4>Perbarui Password</h4>
		</div>
		<?php
			if ($this->session->has_userdata('status')) {
		?>
			<p class="text-bg bg-danger" style="padding: 10px;">
				<?php echo $this->session->flashdata('status'); ?>
			</p>
		<?php
			}
		?>
		<div class="page-body">
			<form action="<?php echo base_url('ppdb/ganti_password'); ?>" method="POST" accept-charset="utf-8">
				<div class="form-group">
					<label for="oldpas">Password Lama</label>
					<input type="password" id="oldpas" class="form-control" name="old_password" value="" placeholder="Password Lama" required />
				</div>
				<div class="form-group">
					<label for="newpas">Password Baru</label>
					<input type="password" id="newpas" class="form-control" name="new_password" value="" placeholder="Password Baru" required />
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="submit" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>