<body class="form-v4">
	<div class="page-content">
		<div class="form-v4-content">
			<div class="form-left">
				<h2>SIDUMAS</h2>
				<p class="text-1">SIDUMAS adalah website pengaduan masyarakat terkait infrastruktur di Tulungagung.</p>
				<p class="text-2">Pengaduan lebih gampang, dapat dilakukan oleh siapapun dan kapan saja. Pengaduan yang diterima akan diproses sesuai mekanisme yang berlaku.</p>
				<div class="form-left-last">
				<a href="<?php echo base_url('login') ?>" class="account"></a>
					<!-- <input type="submit" name="account" class="account" value="Sudah memiliki akun" href=""> -->
				</div>
			</div>
			<form class="form-detail" id="myform" method="post" action="<?php echo base_url('registrasi/proses'); ?>">
            <?php 
				if($this->session->flashdata('error') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('error');
					echo '</div>';
				}
				?>
				<h2>REGISTRASI</h2>
				<div class="form-group">
					<div class="form-row form-row-1">
						<label for="nama">Nama</label>
						<input type="text" name="nama" id="nama" class="input-text">
					</div>
					<!-- <div class="form-row form-row-1">
						<label for="last_name">Last Name</label>
						<input type="text" name="last_name" id="last_name" class="input-text">
					</div> -->
				</div>
				<div class="form-row">
					<label for="email">Email</label>
					<input type="text" name="email" id="email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
				</div>
				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="input-text" required>
					</div>
					<div class="form-row form-row-1">
						<label for="comfirm-password">Comfirm Password</label>
						<input type="password" name="comfirm_password" id="comfirm_password" class="input-text" required>
					</div>
				</div>
				<!-- <div class="form-checkbox">
					<label class="container"><p>I agree to the <a href="#" class="text">Terms and Conditions</a></p>
					  	<input type="checkbox" name="checkbox">
					  	<span class="checkmark"></span>
					</label>
				</div> -->
				<div class="form-row-last">
                <!-- <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Daftar</button> -->
					<input type="submit" name="registrasi" class="register" id="myform" value="Daftar">
				</div>
			</form>
		</div>
	</div>