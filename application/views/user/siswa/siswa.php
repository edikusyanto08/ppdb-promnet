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
	if (isset($first_log)) {
?>
<div id="hide" class="col-md-12 col-sm-12 col-xs-12">
	<div class="box box-solid bg-teal-gradient">
        <div class="box-header">
          <i class="fa fa-check"></i>

          <p class="box-title">
          	Selamat datang <?php echo $this->session->userdata('nama_siswa'); ?>. Anda berhasil login. Silahkan ubah kata sandi default anda untuk keamanan pada menu pengaturan.
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
				<h3>Status Anda Saat Ini</h3>
			</div>
			<div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
				<div class="box box-info">
					<div class="page-header">
						<p class="text-info" align="center">Mendaftar</p>
					</div>
					<div class="page-content">
						<p>
							Silahkan lengkapi persyaratan dan kelengkapan data diri anda.
						</p>
					</div>
				</div>
			</div>

			<div class="clearfix">
				
			</div>
		</div>
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="box box-primary">
			<div class="page-header">
				<h3>Status Pendaftaran</h3>
			</div>

			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="box box-info">
					<div class="page-header">
						<h4 class="text-info">Mendaftar</h4>
					</div>
					<div class="page-body">
						<p class="text-default" align="justify">
							Status pertama ketika sekolah mendaftarkan siswanya. Pada tahap ini siswa harus melengkapi
							persyaratan dan kelengkapan lainnya untuk ke status selanjutnya.
						</p>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="box box-warning">
					<div class="page-header">
						<h4 class="text-warning">Pending</h4>
					</div>
					<div class="page-body">
						<p class="text-default" align="justify">
							Status kedua setelah mendaftar. status ini didapat setelah siswa mensubmit persyaratan dan kelengkapan
							dan menunggu verifikasi dari panitia PPDB Online SMKN 88 Bandung.
						</p>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="box box-primary">
					<div class="page-header">
						<h4 class="text-primary">Terdaftar</h4>
					</div>
					<div class="page-body">
						<p class="text-default" align="justify">
							Setelah diverifikasi oleh panitia PPDB online SMKN 88 Bandung status siswa menjadi terdaftar dan dapat
							mencetak kartu pendaftaran di menu kartu pendaftaran yang akan muncul ketika siswa sudah diverifikasi.
						</p>
					</div>
				</div>
			</div>

			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="box box-success">
					<div class="page-header">
						<h4  class="text-success">Diterima</h4>
					</div>
					<div class="page-body">
						<p class="text-default" align="justify">
							Selamat anda diterima di SMKN 88 Bandung, Mari berkarya untuk bangsa!
						</p>
					</div>
				</div>
			</div>

			<div class="clearfix">
				
			</div>
		</div>
	</div>

</div>