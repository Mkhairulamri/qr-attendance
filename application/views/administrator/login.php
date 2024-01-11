<body class="bg-gradient-#ffa831">
	<div class="container">
		<div class="p-3 mt-5 mb-2 bg-primary">
			<h1>hallo</h1>
		</div>
		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-xl-5 col-lg-6 col-md-5">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">

						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h2 class="h4 text-gray-900 mb-4">HALAMAN LOGIN</h2>
										<?php echo $this->session->flashdata('pesan') ?>
									</div>
									<!--tambahkan method post dan action arahkan kepada lokasi folder administrator/auth -->
									<form method="post" action="<?php echo base_url('administrator/auth/proses_login') ?>" cla ss="user">
										<div class="form-group">
											<input type="text" class="form-control form-control-user" id="exampleInputEmail" ariadescribedby="emailHelp" placeholder="Username Anda" name="username">
											<?php echo form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-controluser" id="exampleInputPassword" placeholder="Password Anda" name="password">
											<?php echo form_error('password', '<div class="text-danger small ml-3">', '</div>') ?>
										</div>
										<button style="background-color:#33cc00;" class="btn btn-success btn-user btn-block">Login</button>
										</p>
										<a href="<?php echo base_url('') ?>" class="btn btn-primary btn-primary"> HALAMAN UTAMA </a>
										<!-- Modal
</p> Belum punya akun ?
<a href="<?php echo base_url('auth/registrasi') ?>" class="btn btn-primary btn-warning" > Registrasi  </a> -->

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
