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
	<div class="col-md-12 col-sm-12 col-xs-12">
		<!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar siswa pending</h3>
      </div>
      <div class="container-fluid table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <th>No</th>
            <th>NISN</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th>Kontak</th>
            <th>Status</th>
            <th>Aksi</th>
          </thead>
          <tbody>
            <?php
              if ($list_siswa != NULL) {
                $c = 1;
                foreach ($list_siswa as $value) {
            ?>
                  <tr>
                    <td><?php echo $c; ?></td>
                    <td><?php echo $value->NISN; ?></td>
                    <td><?php echo $value->nama_lengkap; ?></td>
                    <td><?php echo $value->email; ?></td>
                    <td><?php echo $value->kontak; ?></td>
                    <td>
                      <?php
                        if ($value->status_pendaftaran == 2) {
                          echo "Pending";
                        }else echo "Belum Terverifikasi";
                      ?>
                    </td>
                    <td>
                      <a href="<?php echo base_url('admin/verifikasi/siswa/3/') .$value->ID_siswa; ?>" title="Verifikasi">
                        <button type="button" class="btn btn-sm btn-success"><span class="fa fa-check"></span></button>
                      </a>
                      <a href="#" title="Lihat">
                        <button type="button" class="btn btn-sm btn-success"><span class="fa fa-eye"></span></button>
                      </a>
                    </td>
                  </tr>
            <?php
                  $c++;
                }
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>