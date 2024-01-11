<div class="container">
	<br>
	<!-- Illustrations -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="row">
				<div class="col">
					<h6 class="m-0 font-weight-bold text-success">Data User</h6>
				</div>
				<div class="col">
					<div class="float-right">
						<button type="button" class="btn btn-primary m-0" data-toggle="modal" data-target="#tambah">
							Tambah <i class="fa fa-edit"></i>
					</div>
					</button>
				</div>
			</div>
		</div>
		<div class="card-body">
			<?php echo $this->session->flashdata('pesan') ?>
			<!-- untuk memanggil fungsi input data -->
			<!-- <?php echo anchor('administrator/user/input', '<button class="btn btn-sm btn-success mb-3"><i class="fas fa-plus"></i> Tambah User</button>') ?> -->
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

					<tr>
						<th>NO</th>
						<th>Username</th>
						<th>Email</th>
						<th>Level</th>
						<th width="20%">AKSI</th>
					</tr>
					<?php
					$no = 1;
					foreach ($user as $jrs) : ?>
						<tr>
							<td width="20px"><?php echo $no++ ?></td>
							<td><?php echo $jrs->username ?></td>
							<td><?php echo $jrs->email ?></td>
							<td><?php echo $jrs->level ?></td>
							<td width="20px">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?php echo $jrs->id ?>">
									Edit <i class="fa fa-edit"></i>
								</button>
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?php echo $jrs->id ?>"
								<?php if($jrs->level == 'Admin'):?>
									disabled
								<?php endif;?>
								>
									Hapus <i class="fa fa-trash"></i>
								</button>

							</td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal Tambah -->
	<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="needs-validation" novalidate method="post" action="<?php echo base_url('administrator/User/save') ?>">
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Nama User</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nama" required>
								<div class="invalid-feedback">
									Maaf Nama User Tidak Boleh Kosong.
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Username</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="username" required>
								<div class="invalid-feedback">
									Maaf Username Tidak Boleh Kosong.
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Email</label>
							<div class="col-sm-8">
								<input type="email" class="form-control" name="email" required>
								<div class="invalid-feedback">
									Maaf Email Harus Valid/Tidak boleh Kosong.
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">No HP</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" name="nohp" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
								<div class="invalid-feedback">
									Maaf No HP Tidak Boleh Kosong.
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="staticEmail" class="col-sm-4 col-form-label">Level</label>
							<div class="col-sm-8">
								<select id="inputState" class="form-control" name="level">
									<option selected>Pilih Penanggung Jawab...</option>
									<!-- <option value="Wali">Wali Kelas</option> -->
									<option value="Pegawai">Pegawai</option>
								</select>
								<div class="invalid-feedback">
									Maaf Level Tidak Boleh Kosong.
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<?php foreach ($user as $jr) : ?>

		<!-- Modal Edit -->
		<div class="modal fade" id="edit<?php echo $jr->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Data <?php echo $jr->nama ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<!-- <?php var_dump($wali); ?> -->

					</div>
					<div class="modal-body">
						<form class="needs-validation" novalidate method="post" action="<?php echo base_url('administrator/User/update') ?>">
							<input type="hidden" name="id" value="<?php echo $jr->id ?>">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Nama User</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="nama" required value="<?php echo $jr->nama ?>">
									<div class="invalid-feedback">
										Maaf Nama User Tidak Boleh Kosong.
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Username</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="username" required value="<?php echo $jr->username ?>">
									<div class="invalid-feedback">
										Maaf Username Tidak Boleh Kosong.
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Email</label>
								<div class="col-sm-8">
									<input type="email" class="form-control" name="email" required value="<?php echo $jr->email ?>">
									<div class="invalid-feedback">
										Maaf Email Tidak Boleh Kosong.
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">No HP</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" name="nohp" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" value="<?php echo $jr->no_hp ?>">
									<div class="invalid-feedback">
										Maaf No HP Tidak Boleh Kosong.
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="staticEmail" class="col-sm-4 col-form-label">Level</label>
								<div class="col-sm-8">
									<select id="inputState" class="form-control" name="level">
										<option selected>Pilih Penanggung Jawab...</option>
										<option value="Pegawai" <?php if ($jr->level = "Pegawai") { ?> selected <?php } ?>>Pegawai</option>
									</select>
									<div class="invalid-feedback">
										Maaf Level Tidak Boleh Kosong.
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Confirm Hapus-->
		<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Hapus Data<?php echo $jr->nama ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Apakah Anda Yakin akan Menghapus Data <?php echo $jr->nama ?> ?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<?php echo anchor('administrator/user/hapus/' . $jr->id, '<div class="btn btn-warning">Hapus</div>') ?>
					</div>
				</div>
			</div>
		</div>

	<?php endforeach; ?>
