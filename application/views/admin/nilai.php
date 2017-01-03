<div class="row">
	<?php
		if ($this->session->has_userdata('status')) {
	?>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-check"></i>

              <h6 class="box-title"><?php echo $this->session->flashdata('status'); ?></h6>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
        </div>
	</div>
	<?php
		}
	?>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <div class="page-header">
          <h3 class="box-title">Nilai <?php echo $siswa->nama_lengkap; ?></h3>
        </div>
        <form action="<?php echo base_url('admin/proses_nilai'); ?>" method="POST" accept-charset="utf-8">
          <div class="form-group">
            <label for="pilihan1">Pilihan Pertama : <?php echo $jurusan[0]->nama_jurusan; ?></label>
            <input type="number" class="form-control" name="nilai[]" value="" placeholder="Nilai" min="0" max="100" required />
          </div>

          <div class="form-group">
            <label for="pilihan2">Pilihan Kedua : <?php echo $jurusan[1]->nama_jurusan; ?></label>
            <input type="number" class="form-control" name="nilai[]" value="" placeholder="Nilai" min="0" max="100" required />
          </div>

          <div class="form-group">
            <input type="hidden" name="ID_jurusan[]" value="<?php echo $jurusan[0]->ID_jurusan; ?>">
            <input type="hidden" name="ID_jurusan[]" value="<?php echo $jurusan[1]->ID_jurusan; ?>">
            <input type="hidden" name="ID_siswa" value="<?php echo $siswa->ID_siswa; ?>">
            <input type="hidden" name="nama_lengkap" value="<?php echo $siswa->nama_lengkap; ?>">
            <input type="hidden" name="nama_jurusan[]" value="<?php echo $jurusan[0]->nama_jurusan; ?>">
            <input type="hidden" name="nama_jurusan[]" value="<?php echo $jurusan[1]->nama_jurusan; ?>">
            <input type="hidden" name="kkm[]" value="<?php echo $jurusan[0]->KKM; ?>">
            <input type="hidden" name="kkm[]" value="<?php echo $jurusan[1]->KKM; ?>">
            <button type="submit" class="btn btn-primary">Input</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <div class="col-md-5 col-sm-5 col-xs-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <div class="page-header">
          <h3 class="box-title">Detail untuk <?php echo $siswa->nama_lengkap; ?></h3>
        </div>
        <div class="">
          
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3 col-sm-3 col-xs-3">
    <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('upload/').$berkas->foto; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $siswa->nama_lengkap; ?></h3>

              <p class="text-muted text-center">Nilai Ujian Nasional</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Bahasa Indonesia</b> <a class="pull-right"><?php echo $un->bahasa_indonesia; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Bahasa Inggris</b> <a class="pull-right"><?php echo $un->bahasa_inggris; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Matematika</b> <a class="pull-right"><?php echo $un->matematika; ?></a>
                </li>
                <li class="list-group-item">
                  <b>IPA</b> <a class="pull-right"><?php echo $un->ipa; ?></a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Lihat</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </div>

</div>