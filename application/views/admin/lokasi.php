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
              <h3 class="box-title">Provinsi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('admin/proses_lokasi'); ?>" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Provinsi</label>
                  <input type="text" class="form-control" name="nama_provinsi" id="exampleInputEmail1" placeholder="Nama Provinsi" required />
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="table" value="provinsi">
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
              <h3 class="box-title">Daftar Provinsi</h3>
            </div>
            <!-- /.box-header -->
            <div class="table-responsive">
            	<table class="table table-hovered">
            		<thead>
            			<tr>
            				<th>No</th>
            				<th>Nama Provinsi</th>
            				<th>Aksi</th>
            			</tr>
            		</thead>
            		<tbody>
            			<?php
            				if ($list_provinsi != NULL) {
            					$c =1;
            					foreach ($list_provinsi as $value) {
            			?>
            						<tr>
            							<td><?php echo $c; ?></td>
            							<?php
            								if (isset($edit_id)) {
            									if($edit_id == $value->ID_provinsi){
            							?>
            									<form action="<?php echo base_url('admin/update_lokasi'); ?>" method="POST" accept-charset="utf-8">
            										<td><input class="form-control" type="text" name="nama_provinsi" value="<?php echo $value->nama_provinsi; ?>" placeholder="Nama Provinsi"></td>
			            							<td>
			            								<input type="hidden" name="ID_provinsi" value="<?php echo $value->ID_provinsi; ?>">
                                  <input type="hidden" name="table" value="provinsi">
			            								<button type="submit" class="btn btn-success btn-sm" ><i class="fa fa-floppy-o"></i></button>
			            							</td>
            									</form>
            							<?php

            									}else {
            							?>
			            							<td><?php echo $value->nama_provinsi; ?></td>
			            							<td>
			            								<a href="<?php echo base_url('admin/jurusan/edit/') .$value->ID_provinsi; ?>" title="Edit"><button type="button" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></button></a>
			            							</td>
            							<?php
            									}
            								}else {
            							?>
		            							<td><?php echo $value->nama_provinsi; ?></td>
		            							<td>
		            								<a href="<?php echo base_url('admin/lokasi/edit/') .$value->ID_provinsi; ?>" title="Edit"><button type="button" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></button></a>
		            							</td>
            							<?php
            									$c++;
            								}
            							?>
            						</tr>
            			<?php
            					}
            				}else {
            			?>
            					<tr>
            						<td colspan="6" rowspan="" headers="" align="center">Belum ada data</td>
            					</tr>
            			<?php
            				}
            			?>
            		</tbody>
            	</table>
            </div>
          </div>
          <!-- /.box -->
	</div>
  
  <div class="clearfix">
    
  </div>

  <div class="col-md-5 col-sm-5 col-xs-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Kota</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="<?php echo base_url('admin/proses_lokasi'); ?>" method="POST">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Kota</label>
            <input type="text" class="form-control" name="nama_kota" id="exampleInputEmail1" placeholder="Nama Kota" required />
          </div>
          <div class="form-group">
            <label>Provinsi</label>
            <select name="ID_provinsi" class="form-control select2" style="width: 100%;">
              <option value=""></option>
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
        <!-- /.box-body -->

        <div class="box-footer">
          <input type="hidden" name="table" value="kota">
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
        <h3 class="box-title">Daftar Kota</h3>
      </div>
      <!-- /.box-header -->
      <div class="table-responsive">
        <table class="table table-hovered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Kota</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if ($list_kota != NULL) {
                $c =1;
                foreach ($list_kota as $value) {
            ?>
                  <tr>
                    <td><?php echo $c; ?></td>
                    <?php
                      if (isset($edit_id_kota) && isset($edit_aksi)) {
                        if($edit_id_kota == $value->ID_kota){
                    ?>
                        <form action="<?php echo base_url('admin/update_lokasi'); ?>" method="POST" accept-charset="utf-8">
                          <td><input class="form-control" type="text" name="nama_kota" value="<?php echo $value->nama_kota; ?>" placeholder="Nama Kota"></td>
                          <td>
                            <input type="hidden" name="ID_kota" value="<?php echo $value->ID_kota; ?>">
                            <input type="hidden" name="table" value="kota">
                            <button type="submit" class="btn btn-success btn-sm" ><i class="fa fa-floppy-o"></i></button>
                          </td>
                        </form>
                    <?php

                        }else {
                    ?>
                          <td><?php echo $value->nama_kota; ?></td>
                          <td>
                            <a href="<?php echo base_url('admin/jurusan/edit/') .$value->ID_kota; ?>" title="Edit"><button type="button" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></button></a>
                          </td>
                    <?php
                        }
                      }else {
                    ?>
                        <td><?php echo $value->nama_kota; ?></td>
                        <td>
                          <a href="<?php echo base_url('admin/lokasi/editkota/') .$value->ID_kota; ?>" title="Edit"><button type="button" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></button></a>
                        </td>
                    <?php
                        $c++;
                      }
                    ?>
                  </tr>
            <?php
                }
              }else {
            ?>
                <tr>
                  <td colspan="6" rowspan="" headers="" align="center">Belum ada data</td>
                </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.box -->
  </div>

  <div class="clearfix">
    
  </div>

  <div class="col-md-5 col-sm-5 col-xs-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Kecamatan</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="<?php echo base_url('admin/proses_lokasi'); ?>" method="POST">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Kecamatan</label>
            <input type="text" class="form-control" name="nama_kecamatan" id="exampleInputEmail1" placeholder="Nama Kecamatan" required />
          </div>

          <div class="form-group">
            <label>Kota</label>
            <select name="ID_kota" class="form-control select2" style="width: 100%;">
              <option value=""></option>
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
        <!-- /.box-body -->

        <div class="box-footer">
          <input type="hidden" name="table" value="kecamatan">
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
          <h3 class="box-title">Daftar Kecamatan</h3>
        </div>
        <!-- /.box-header -->
        <div class="table-responsive">
          <table class="table table-hovered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Provinsi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                if ($list_kecamatan != NULL) {
                  $c =1;
                  foreach ($list_kecamatan as $value) {
              ?>
                    <tr>
                      <td><?php echo $c; ?></td>
                      <?php
                        if (isset($edit_id_kec)) {
                          if($edit_id_kec == $value->ID_kecamatan){
                      ?>
                          <form action="<?php echo base_url('admin/update_lokasi'); ?>" method="POST" accept-charset="utf-8">
                            <td><input class="form-control" type="text" name="nama_kecamatan" value="<?php echo $value->nama_kecamatan; ?>" placeholder="Nama Kecamatan"></td>
                            <td>
                              <input type="hidden" name="ID_kecamatan" value="<?php echo $value->ID_kecamatan; ?>">
                              <input type="hidden" name="table" value="kecamatan">
                              <button type="submit" class="btn btn-success btn-sm" ><i class="fa fa-floppy-o"></i></button>
                            </td>
                          </form>
                      <?php

                          }else {
                      ?>
                            <td><?php echo $value->nama_kecamatan; ?></td>
                            <td>
                              <a href="<?php echo base_url('admin/jurusan/editkec/') .$value->ID_kecamatan; ?>" title="Edit"><button type="button" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></button></a>
                            </td>
                      <?php
                          }
                        }else {
                      ?>
                          <td><?php echo $value->nama_kecamatan; ?></td>
                          <td>
                            <a href="<?php echo base_url('admin/lokasi/editkec/') .$value->ID_kecamatan; ?>" title="Edit"><button type="button" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></button></a>
                          </td>
                      <?php
                          $c++;
                        }
                      ?>
                    </tr>
              <?php
                  }
                }else {
              ?>
                  <tr>
                    <td colspan="6" rowspan="" headers="" align="center">Belum ada data</td>
                  </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.box -->
  </div>

</div>