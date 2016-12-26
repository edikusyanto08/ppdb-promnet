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
                  <label for="exampleInputEmail1">Kode Jurusan</label>
                  <input type="text" class="form-control" name="kode_jurusan" id="exampleInputEmail1" placeholder="Kode Jurusan" required />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Jurusan</label>
                  <input type="text" class="form-control" name="nama_jurusan" id="exampleInputPassword1" placeholder="Nama Jurusan" required />
                </div>
                <div class="form-group">
                  <label for="kuota">Kuota</label>
                  <input type="number" class="form-control" name="kuota_jurusan" id="kuota" min="1" placeholder="Kuota Jurusan" required />
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kriteria Ketuntasan Minimal Jurusan</label>
                  <input type="number" class="form-control" name="KKM" id="exampleInputPassword1" placeholder="KKM Jurusan" required />
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
            				<th>Kode Jurusan</th>
            				<th>Nama jurusan</th>
            				<th>Kuota Jurusan</th>
            				<th>KKM Jurusan</th>
            				<th>Aksi</th>
            			</tr>
            		</thead>
            		<tbody>
            			<?php
            				if ($list_jurusan != NULL) {
            					$c =1;
            					foreach ($list_jurusan as $value) {
            			?>
            						<tr>
            							<td><?php echo $c; ?></td>
            							<?php
            								if (isset($edit_id)) {
            									if($edit_id == $value->ID_jurusan){
            							?>
            									<form action="<?php echo base_url('admin/update_jurusan'); ?>" method="POST" accept-charset="utf-8">
            										<td><input class="form-control" type="text" name="kode_jurusan" value="<?php echo $value->kode_jurusan; ?>" placeholder="Kode Jurusan"></td>
		            								<td><input class="form-control" type="text" name="nama_jurusan" value="<?php echo $value->nama_jurusan; ?>" placeholder="Kode Jurusan"></td>
		            								<td><input class="form-control" type="text" name="kuota_jurusan" value="<?php echo $value->kuota_jurusan; ?>" placeholder="Kode Jurusan"></td>
		            								<td><input class="form-control" type="text" name="KKM" value="<?php echo $value->KKM; ?>" placeholder="Kode Jurusan"></td>
			            							<td>
			            								<input type="hidden" name="ID_jurusan" value="<?php echo $value->ID_jurusan; ?>">
			            								<button type="submit" class="btn btn-success btn-sm" ><i class="fa fa-floppy-o"></i></button>
			            							</td>
            									</form>
            							<?php

            									}else {
            							?>
            										<td><?php echo $value->kode_jurusan; ?></td>
			            							<td><?php echo $value->nama_jurusan; ?></td>
			            							<td><?php echo $value->kuota_jurusan; ?></td>
			            							<td><?php echo $value->KKM; ?></td>	
			            							<td>
			            								<a href="<?php echo base_url('admin/jurusan/edit/') .$value->ID_jurusan; ?>" title="Edit"><button type="button" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></button></a>
			            							</td>
            							<?php
            									}
            								}else {
            							?>
            									<td><?php echo $value->kode_jurusan; ?></td>
		            							<td><?php echo $value->nama_jurusan; ?></td>
		            							<td><?php echo $value->kuota_jurusan; ?></td>
		            							<td><?php echo $value->KKM; ?></td>
		            							<td>
		            								<a href="<?php echo base_url('admin/jurusan/edit/') .$value->ID_jurusan; ?>" title="Edit"><button type="button" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></button></a>
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