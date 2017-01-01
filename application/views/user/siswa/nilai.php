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
			<div class="page-header">
				<h3 align="center">Nilai Ujian Nasional</h3>
			</div>
			<form action="<?php echo base_url('siswa/proses_nilai'); ?>" method="POST" accept-charset="utf-8">
				<div class="page-content">
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label for="bahasa_indonesia">Bahasa Indonesia</label>
							<input type="number" min="0" max="100" name="bahasa_indonesia" class="form-control" value="<?php if(isset($nilai)) echo $nilai->bahasa_indonesia; ?>" placeholder="Bahasa Indonesia" required />
						</div>
					</div>

					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label for="bahasa_inggris">Bahasa Inggris</label>
							<input type="number" min="0" max="100" name="bahasa_inggris" class="form-control" value="<?php if(isset($nilai)) echo $nilai->bahasa_inggris; ?>" placeholder="Bahasa Inggris" required />
						</div>
					</div>

					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label for="matematika">Matematika</label>
							<input type="number" min="0" max="100" name="matematika" class="form-control" value="<?php if(isset($nilai)) echo $nilai->matematika; ?>" placeholder="Matematika" required />
						</div>
					</div>

					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<label for="ipa">IPA</label>
							<input type="number" min="0" max="100" name="ipa" class="form-control" value="<?php if(isset($nilai)) echo $nilai->ipa; ?>" placeholder="IPA" required />
						</div>
					</div>
		
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="form-group">
							<input type="hidden" name="ID_siswa" value="<?php echo $this->session->userdata('ID_siswa'); ?>">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</div>

					<div class="clearfix">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>