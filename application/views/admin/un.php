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
	<div class="col-md-5 col-sm-5 col-xs-12">
		<!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Jurusan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('admin/proses_jurusan'); ?>" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Mata Pelajaran</label>
                  <input type="text" class="form-control" name="kode_jurusan" id="exampleInputEmail1" placeholder="Mata Pelajaran" required />
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
	</div>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Jurusan</h3>
      </div>
      <!-- /.box-header -->
      <div class="table-responsive">
      	<table class="table table-hovered">
      		<thead>
      			<tr>
      				<th>No</th>
      				<th>Nama Mata Pelajaran</th>
      				<th>Aksi</th>
      			</tr>
      		</thead>
      		<tbody>
      			<tr>
              <td>1</td>
              <td>Matematika</td>
              <td><button type="ubtton"><i class="fa fa-edit"></i></button></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Bahasa Indonesia</td>
              <td><button type="ubtton"><i class="fa fa-edit"></i></button></td>
            </tr>
            <tr>
              <td>3</td>
              <td>Bahasa Inggris</td>
              <td><button type="ubtton"><i class="fa fa-edit"></i></button></td>
            </tr>
            <tr>
              <td>4</td>
              <td>IPA</td>
              <td><button type="ubtton"><i class="fa fa-edit"></i></button></td>
            </tr>
      		</tbody>
      	</table>
      </div>
    </div>
    <!-- /.box -->
	</div>
</div>