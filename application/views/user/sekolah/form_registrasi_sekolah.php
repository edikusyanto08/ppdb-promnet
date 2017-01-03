
<link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>plugins/select2/select2.min.css">
  <script type="text/javascript" charset="utf-8" async defer>
    $(function () {
     //Initialize Select2 Elements
     $(".select2").select2();
    }
</script>

<div class="col-md-offset-2 col-md-8">
	<div class="box">
		<div class="page-header" align="center">
			<h3>Form Pendaftaran Sekolah</h3>
		</div>
		<form action="<?php echo base_url('ppdb/proses_sekolah'); ?>" method="POST" class="form-horizontal">
          	<div class="box-body">
	            <div class="form-group">
	              <label for="npsn" class="col-md-offset-1 col-sm-3 col-md-3 col-xs-12 control-label">NPSN</label>
	              <div class="col-sm-7">
	                <input type="text" class="form-control" name="NPSN" id="npsn" placeholder="NPSN Sekolah" required />
	              </div>
	            </div>

	            <div class="form-group">
	              <label for="nama_sekolah" class="col-md-offset-1 col-sm-3 col-md-3 col-xs-12 control-label">Nama Sekolah</label>
	              <div class="col-sm-7">
	                <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" placeholder="Nama Sekolah" required />
	              </div>
	            </div>

	            <div class="form-group">
	              <label for="provinsi" class="col-md-offset-1 col-sm-3 col-md-3 col-xs-12 control-label">Provinsi Sekolah</label>
	              <div class="col-sm-7">
	            	<select name="provinsi" class="form-control select2" style="width: 100%;" required />
		              <option value="">-- Pilih Provinsi --</option>
		              <?php
		                if ($list_provinsi != NULL) {
		                  foreach ($list_provinsi as $value) {
		              ?>
		                    <option value="<?php echo  $value->ID_provinsi; ?>"><?php echo $value->nama_provinsi; ?></option>
		              <?php
		                  }
		                }
		              ?>
		            </select>
	              </div>
	            </div>

	            <div class="form-group">
	              <label for="kota" class="col-md-offset-1 col-sm-3 col-md-3 col-xs-12 control-label">Kota Sekolah</label>
	              <div class="col-sm-7">
	            	<select name="kota" class="form-control select2" style="width: 100%;" required />
		              <option value="">-- Pilih Kota --</option>
		              <?php
		                if ($list_kota != NULL) {
		                  foreach ($list_kota as $value) {
		              ?>
		                    <option value="<?php echo  $value->ID_kota; ?>"><?php echo $value->nama_kota; ?></option>
		              <?php
		                  }
		                }
		              ?>
		            </select>
	              </div>
	            </div>

	            <div class="form-group">
	              <label for="kecamatan" class="col-md-offset-1 col-sm-3 col-md-3 col-xs-12 control-label">Kecamatan Sekolah</label>
	              <div class="col-sm-7">
	            	<select name="kecamatan" class="form-control select2" style="width: 100%;" required />
		              <option value="">-- Pilih Kecamatan --</option>
		              <?php
		                if ($list_kecamatan != NULL) {
		                  foreach ($list_kecamatan as $value) {
		              ?>
		                    <option value="<?php echo  $value->ID_kecamatan; ?>"><?php echo $value->nama_kecamatan; ?></option>
		              <?php
		                  }
		                }
		              ?>
		            </select>
	              </div>
	            </div>

	            <div class="form-group">
	              <label for="detail" class="col-md-offset-1 col-sm-3 col-md-3 col-xs-12 control-label">Detail Alamat Sekolah</label>
	              <div class="col-sm-7">
	            	<textarea name="detail" class="form-control" rows="4" id="detail" placeholder="Detail Alamat" required /></textarea>
	              </div>
	            </div>

	            <div class="form-group">
	              <label for="kontak" class="col-md-offset-1 col-sm-3 col-md-3 col-xs-12 control-label">Telpon Sekolah</label>
	              <div class="col-sm-7">
	                <input type="text" class="form-control" name="kontak" id="kontak" placeholder="Telpon Sekolah">
	              </div>
	            </div>

	            <div class="form-group">
	              <label for="email" class="col-md-offset-1 col-sm-3 col-md-3 col-xs-12 control-label">Email Sekolah</label>
	              <div class="col-sm-7">
	                <input type="email" name="email" class="form-control" id="email" placeholder="Email Sekolah">
	              </div>
	            </div>

	            <div class="form-group">
	              <label for="daerah" class="col-md-offset-1 col-sm-3 col-md-3 col-xs-12 control-label">Daerah Sekolah</label>
	              <div class="col-sm-7">
	                <input type="radio" name="daerah" id="daerah" value="pedesaan" placeholder=""> Pedesaan <br>
	                <input type="radio" name="daerah" id="daerah" value="perkotaan" placeholder=""> Perkotaan
	              </div>
	            </div>

	            <div class="form-group">
	              <label for="status_sekolah" class="col-md-offset-1 col-sm-3 col-md-3 col-xs-12 control-label">Status Sekolah</label>
	              <div class="col-sm-7">
	                <input type="radio" name="status_sekolah" value="Negeri" placeholder=""> Negeri <br>
	                <input type="radio" name="status_sekolah" value="Swasta" placeholder=""> Swasta
	              </div>
	            </div>

	            <div class="form-group">
	              <label for="akreditasi" class="col-md-offset-1 col-sm-3 col-md-3 col-xs-12 control-label">Akreditasi Sekolah</label>
	              <div class="col-sm-7">
	                <input type="radio" name="akreditasi" value="A" placeholder=""> A <br>
	                <input type="radio" name="akreditasi" value="B" placeholder=""> B <br>
	                <input type="radio" name="akreditasi" value="C" placeholder=""> C <br> 
	              </div>
	            </div>

	            <div class="form-group">
	            	<div class="col-md-offset-2">
	            		<input type="checkbox" name="" value="" required /> Saya setuju dengan syarat dan konsisi yang berlaku
	            	</div>
	            </div>

          	</div>
          	<!-- /.box-body -->
          	<div class="box-footer" align="center">
	            <button type="reset" class="btn btn-default">Cancel</button>
	            <button type="submit" class="btn btn-primary">Daftar</button>
          	</div>
          	<!-- /.box-footer -->
        </form>
	</div>
</div>