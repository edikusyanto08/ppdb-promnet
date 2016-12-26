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
              <h3 class="box-title">Tambah Status</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('admin/proses_status'); ?>" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Status</label>
                  <input type="text" class="form-control" name="nama_status" id="exampleInputEmail1" placeholder="Nama Status" required />
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
        <h3 class="box-title">Daftar Status</h3>
      </div>
      <!-- /.box-header -->
      <div class="table-responsive">
      	<table class="table table-hovered">
      		<thead>
      			<tr>
      				<th>No</th>
      				<th>Nama Status</th>
      				<th>Aksi</th>
      			</tr>
      		</thead>
      		<tbody>
      			<?php
              if ($list_status != NULL) {
                $c = 1;
                foreach ($list_status as $value) {
            ?>
                  <tr>
                    <td><?php echo $c; ?></td>
                    <?php
                      if (isset($edit_aksi) && isset($edit_id)) {
                    ?>
                        <form action="<?php echo base_url('admin/update_status'); ?>" method="POST" accept-charset="utf-8">
                          <td>
                            <?php
                                if ($edit_id == $value->ID_status) {
                            ?>
                                <input type="text" class="form-control" name="nama_status" value="<?php echo $value->nama_status ?>" placeholder="Nama Status">
                            <?php
                                }else echo $value->nama_status;
                            ?>
                          </td>
                          <input type="hidden" name="ID_status" value="<?php echo $value->ID_status; ?>">
                          <td><button type="submit" class="btn btn-success btn-sm" ><i class="fa fa-floppy-o"></i></button></td>
                        </form>
                    <?php
                      }else {
                    ?>
                        <td><?php echo $value->nama_status; ?></td>
                        <td>
                          <a href="<?php echo base_url('admin/status/edit/') .$value->ID_status; ?>" title="Edit"><button type="button" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></button></a>
                        </td>
                    <?php
                      }
                    ?>
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
    <!-- /.box -->
	</div>
</div>