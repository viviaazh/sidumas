<?=
    form_open('login/proses_login');
?>
<section class="ftco-section">
		<div class="container">
			<!-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login #09</h2>
				</div>
			</div> -->
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap py-5">
		      	<div class="img d-flex align-items-center justify-content-center" style="background-image: url(tema/login/images/bg.png);"></div>
		      	<h3 class="text-center mb-0">SIDUMAS</h3>
		      	<p class="text-center">Masukkan email dan password Anda</p>
						<form action="#" class="login-form" role="form" autocomplate="off" id="formLogin" novalidates="" method="POST">
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="text" class="form-control" placeholder="Email" name="uname1" id="uname1" required="">
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password" class="form-control" placeholder="Password" name="pwd1" id="pwd1" required="" autocomplate="new-password">
	            </div>
	            <!-- <div class="form-group d-md-flex">
								<div class="w-100 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div> -->
	            <div class="form-group">
	            	<button type="submit" class="btn form-control btn-primary rounded submit px-3" id="btnLogin">Login</button>
	            </div>
	          </form>
	          <div class="w-100 text-center mt-4 text">
	          	<p class="mb-0">Belum punya akun?</p>
		          <a href="registrasi">Daftar</a>
	          </div>
	        </div>
				</div>
			</div>
		</div>
	</section>
	<?=

form_close();
?>