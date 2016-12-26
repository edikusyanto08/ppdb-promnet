<div class="col-md-8">
	<div class="box">
		<!-- <img src="<?php echo base_url('assets/ppdb/') ?>images/front-img.jpg"> -->
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol style="margin-bottom: -10px;" class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img src="<?php echo base_url('assets/ppdb/') ?>images/front-img.jpg" alt="...">
		      <div class="carousel-caption">
		        Slide 1
		      </div>
		    </div>
		    <div class="item">
		      <img src="<?php echo base_url('assets/ppdb/') ?>images/front-img.jpg" alt="...">
		      <div class="carousel-caption">
		        Slide 2
		      </div>
		    </div>
		    <div class="item">
		      <img src="<?php echo base_url('assets/ppdb/') ?>images/front-img.jpg" alt="...">
		      <div class="carousel-caption">
		        Slide 3
		      </div>
		    </div>
		  </div>
		  <!-- Controls -->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="box">
		<form role="form" method="POST" action="<?php echo base_url('ppdb/login_siswa'); ?>">
			<div class="form-group">
			<label>Username</label>
				<input type="text" class="form-control" name="username" value="" placeholder="Username" required />
			</div>
			<div class="form-group">
			<label>Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password" required />
			</div>
			<div class="form-group">	
				<button class="btn btn-primary" name="siswa" type="submit">Siswa</button>
				<button class="btn btn-primary" name="sekolah" type="submit">Sekolah</a>
			</div>
		</form>	
		<div>Informasi Terkini</div>
			<ul>												
				<li><a href="#">Pendaftaran Siswa Baru Tahun Pelajaran 2016/2017 telah dibuka</a></li>
				<li><a href="#">Syarat Pendaftaran Siswa Baru Tahun Pelajaran 2016/2017</a></li>
				<li><a href="#">Seleksi Administrasi Siswa Baru Tahun Pelajaran 2016/2017</a></li>
			</ul>
	</div>			
</div>