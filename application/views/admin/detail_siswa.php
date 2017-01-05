<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <?php
          if (isset($persyaratan->foto) && $persyaratan->foto !='') {
            $foto = $persyaratan->foto;
          }else {
            $foto = 'user.png';
          }
        ?>
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('upload/') .$foto; ?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?php echo $siswa->nama_lengkap; ?></h3>

        <p class="text-muted text-center"><?php echo $siswa->nama_sekolah; ?></p>

        <?php
          if (isset($un)) {
        ?>
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Matematika</b> <a class="pull-right"><?php echo $un->matematika; ?></a>
              </li>
              <li class="list-group-item">
                <b>Bahasa Indonseia</b> <a class="pull-right"><?php echo $un->bahasa_indonesia; ?></a>
              </li>
              <li class="list-group-item">
                <b>Bahasa Inggris</b> <a class="pull-right"><?php echo $un->bahasa_inggris; ?></a>
              </li>
              <li class="list-group-item">
                <b>IPA</b> <a class="pull-right"><?php echo $un->ipa; ?></a>
              </li>
            </ul>
        <?php
          }else {
            echo "Peserta belum mengisi data UN";
          }
        ?>

        <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->


  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#datadiri" data-toggle="tab">Data Diri</a></li>
        <li><a href="#alamat" data-toggle="tab">Alamat</a></li>
        <li><a href="#berkas" data-toggle="tab">Berkas</a></li>
        <li><a href="#orangtua" data-toggle="tab">Data Orangtua</a></li>
        <li><a href="#jurusan" data-toggle="tab">Jurusan</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="datadiri">
          <div class="col-md-6 col-sm-6 col-xs-6">
            <table class="table">
              <tbody>
                <tr>
                  <td>NISN</td>
                  <td>:</td>
                  <td><?php echo $siswa->NISN; ?></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td><?php echo $siswa->jenis_kelamin; ?></td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td>:</td>
                  <td><?php echo date('d-m-Y', strtotime($siswa->tgl_lahir)); ?></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td><?php echo $siswa->email; ?></td>
                </tr>
                <tr>
                  <td>Kontak</td>
                  <td>:</td>
                  <td><?php echo $siswa->kontak; ?></td>
                </tr>
                <tr>
                  <td>Status Pendaftaran</td>
                  <td>:</td>
                  <td><?php echo $siswa->nama_status; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="clearfix">
            
          </div>
        </div>

        <div class="tab-pane" id="alamat">
          <div class="col-md-6 col-sm-6 col-xs-6">
            <?php
              if (isset($alamat)) {
            ?>
              <table class="table">
                <tbody>
                  <tr>
                    <td>Provinsi</td>
                    <td>:</td>
                    <td><?php echo $alamat->nama_provinsi; ?></td>
                  </tr>
                  <tr>
                    <td>Kota</td>
                    <td>:</td>
                    <td><?php echo $alamat->nama_kota; ?></td>
                  </tr>
                  <tr>
                    <td>Kecamatan</td>
                    <td>:</td>
                    <td><?php echo $alamat->nama_kecamatan; ?></td>
                  </tr>
                  <tr>
                    <td>Detail Alamat</td>
                    <td>:</td>
                    <td><?php echo $alamat->detail; ?></td>
                  </tr>
                </tbody>
              </table>
            <?php
              }else {
                echo "Peserta belum melengkapi Data Alamat";
              }
            ?>
          </div>
          <div class="clearfix">
            
          </div>
        </div>

        <div class="tab-pane" id="berkas">
          <?php
            if (isset($persyaratan)) {
            ?>
              <a href="<?php echo base_url('upload/') .$persyaratan->Ijazah; ?>" title="">
                <button type="button" class="btn bg-olive">Ijazah</button>
              </a>
              <a href="<?php echo base_url('upload/') .$persyaratan->SKHUN; ?>" title="">
                <button type="button" class="btn bg-olive">SKHUN</button>
              </a>
              <a href="<?php echo base_url('upload/') .$persyaratan->KK; ?>" title="">
                <button type="button" class="btn bg-olive">Kartu Keluarga</button>
              </a>
              <a href="<?php echo base_url('upload/') .$persyaratan->SKKB; ?>" title="">
                <button type="button" class="btn bg-olive">SKKB</button>
              </a>
              <a href="<?php echo base_url('upload/') .$persyaratan->rapor; ?>" title="">
                <button type="button" class="btn bg-olive">Rapor</button>
              </a>
              <a href="<?php echo base_url('upload/') .$persyaratan->foto; ?>" title="">
                <button type="button" class="btn bg-olive">Foto</button>
              </a>
            <?php
            }else {
              echo 'Peserta belum mengupload berkas';
            }
          ?>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="orangtua">
          
          <?php
          if (isset($orangtua)) {
          ?>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <table class="table">
                <tbody>
                  <tr>
                    <td>Nama Ayah</td>
                    <td>:</td>
                    <td><?php echo $orangtua->nama_ayah; ?></td>
                  </tr>
                  <tr>
                    <td>Kontak Ayah</td>
                    <td>:</td>
                    <td><?php echo $orangtua->kontak_ayah; ?></td>
                  </tr>
                  <tr>
                    <td>Umur Ayah</td>
                    <td>:</td>
                    <td><?php echo $orangtua->umur_ayah; ?></td>
                  </tr>
                  <tr>
                    <td>Pekerjaan Ayah</td>
                    <td>:</td>
                    <td><?php echo $orangtua->pekerjaan_ayah; ?></td>
                  </tr>
                  <tr>
                    <td>Penghasilan Ayah</td>
                    <td>:</td>
                    <td>Rp<?php echo number_format($orangtua->penghasilan_ayah, 2, ',', '.'); ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <table class="table">
                <tbody>
                  <tr>
                    <td>Nama Ibu</td>
                    <td>:</td>
                    <td><?php echo $orangtua->nama_ibu; ?></td>
                  </tr>
                  <tr>
                    <td>Kontak Ibu</td>
                    <td>:</td>
                    <td><?php echo $orangtua->kontak_ibu; ?></td>
                  </tr>
                  <tr>
                    <td>Umur Ibu</td>
                    <td>:</td>
                    <td><?php echo $orangtua->umur_ibu; ?></td>
                  </tr>
                  <tr>
                    <td>Pekerjaan Ibu</td>
                    <td>:</td>
                    <td><?php echo $orangtua->pekerjaan_ibu; ?></td>
                  </tr>
                  <tr>
                    <td>Penghasilan Ibu</td>
                    <td>:</td>
                    <td>Rp<?php echo number_format($orangtua->penghasilan_ibu, 2, ',', '.'); ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          <?php
            }else {
              echo 'Peserta belum mengisi data Orangtua';
            }
          ?>
          <div class="clearfix">
            
          </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="jurusan">
          <?php
            if (isset($jurusan)) {
          ?>
              Pilihan 1 : <strong><?php echo $jurusan[0]->nama_jurusan; ?></strong> <br>
              Pilihan 2 : <strong><?php echo $jurusan[1]->nama_jurusan; ?></strong>
          <?php
            }else {
              echo "Peserta belum mengisi jurusan";
            }
          ?>
        </div>

        <div class="tab-pane" id="settings">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputName" placeholder="Name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Email</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

              <div class="col-sm-10">
                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->