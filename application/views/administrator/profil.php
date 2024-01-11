<div class="container">
	<div class="row">
		<?php foreach ($user as $jrs) : ?>
			<div class="col-lg-4">
				<div class="card mb-4">
					<div class="card-body text-center">
						<img src="<?php echo base_url() ?>assets/img/user.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
						<h5 class="my-3"><?php echo ucfirst($jrs->nama) ?></h5>
						<p class="text-muted mb-1"><?php echo $jrs->username ?></p>
						<p class="text-muted mb-4">Level <span class="badge badge-primary"><?php echo $jrs->level ?></span></p>
						<div class="d-flex justify-content-center mb-2">
							<button type="button" class="btn btn-primary mr-1" data-toggle="modal" data-target="#edit">Edit Data</button>
							<br>
							<button type="button" class="btn btn-outline-primary ms-1" data-toggle="modal" data-target="#password">Update Password</button>
						</div>
					</div>
				</div>

			</div>
			<div class="col-lg-8">
				<div class="card mb-4">
					<div class="card-body">
						<?php echo $this->session->flashdata('pesan') ?>
						<div class="row">
							<div class="col-sm-3">
								<p class="mb-0">Nama</p>
							</div>
							<div class="col-sm-9">
								<p class="text-muted mb-0"><?php echo ucfirst($jrs->nama) ?></p>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3">
								<p class="mb-0">Email</p>
							</div>
							<div class="col-sm-9">
								<p class="text-muted mb-0"><?php echo $jrs->email ?></p>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3">
								<p class="mb-0">No Handphone</p>
							</div>
							<div class="col-sm-9">
								<p class="text-muted mb-0"><?php echo $jrs->no_hp ?></p>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-3">
								<p class="mb-0">Jabatan</p>
							</div>
							<div class="col-sm-9">
								<p class="text-muted mb-0"><?php echo $jrs->level ?></p>
							</div>
						</div>
						<hr>
					</div>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form class="needs-validation" novalidate method="post" action="<?php echo base_url('administrator/User/updatePassword') ?>">
							<div class="modal-body">
								<input type="hidden" name="id" value="<?php echo $jrs->id ?>">
								<div class="form-group row m-3">
									<div class="input-group" id="show_hide_password">
										<div class="input-group-prepend">
										</div>
										<input class="form-control py-4" name="lama" id="passwordLama" type="password" placeholder="Password Lama" require />
										<div class="input-group-append">
											<button class="input-group-text" type="button" tabindex="-1"><span class="fas fa-eye-slash" aria-hidden="false"></span></button>
										</div>
									</div>
								</div>
								<div class="form-group row m-3">
									<div class="input-group" id="show_hide_password">
										<div class="input-group-prepend">
										</div>
										<input class="form-control py-4" name="baru1" id="passwordBaru" type="password" placeholder="Password Baru" require />
										<div class="input-group-append">
											<button class="input-group-text" type="button" tabindex="-1"><span class="fas fa-eye-slash" aria-hidden="false"></span></button>
										</div>
									</div>
								</div>
								<div class="form-group row m-3">
									<div class="input-group" id="show_hide_password">
										<div class="input-group-prepend">
										</div>
										<input class="form-control py-4" name="baru2" id="confirmPassword" type="password" placeholder="Konfirmasi Password Baru" require />
										<div class="input-group-append">
											<button class="input-group-text" type="button" tabindex="-1"><span class="fas fa-eye-slash" aria-hidden="false"></span></button>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
								<button type="submit" class="btn btn-primary" id='update'>Update Password</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="needs-validation" novalidate method="post" action="<?php echo base_url('administrator/User/updateProfil') ?>">
								<div class="form-group row">
									<input type="hidden" value="<?php echo $jrs->id ?>" name="id">
									<label class="col-sm-4 col-form-label">Nama User</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="nama" required value="<?php echo $jrs->nama ?>">
										<div class="invalid-feedback">
											Maaf Nama User Tidak Boleh Kosong.
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Username</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="username" required value="<?php echo $jrs->username ?>">
										<div class="invalid-feedback">
											Maaf Username Tidak Boleh Kosong.
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Email</label>
									<div class="col-sm-8">
										<input type="email" class="form-control" name="email" required value="<?php echo $jrs->email ?>">
										<div class="invalid-feedback">
											Maaf Email Harus Valid/Tidak boleh Kosong.
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">No HP</label>
									<div class="col-sm-8">
										<input type="number" class="form-control" name="nohp" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" value="<?php echo $jrs->no_hp ?>">
										<div class="invalid-feedback">
											Maaf No HP Tidak Boleh Kosong.
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			<?php endforeach; ?>


			<script>
				var pass = document.getElementById('passwordLama');
				var newPass = document.getElementById('passwordBaru1');
				var confirm = document.getElementById('passwordBaru1');
				var pass = document.querySelector('update');

				console.log(pass);

				function validate() {
					if (pass.value == '' || newPass.value == '' || confirm.value == '') {
						pass.setAttribute('disabled', 'disabled');
					} else {
						pass.removeAttribute('disabled')
					}
				}
			</script>
