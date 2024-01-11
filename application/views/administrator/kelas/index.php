<div class="container">
	<br>
	<!-- Illustrations -->
	<div class="col-lg-8">
		<div class="card shadow">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-success">Daftar Kelas</h6>
			</div>

			<div class="card-body">
				<div class="row">
					<div class="col-lg-9">
						<?php echo $this->session->flashdata('pesan') ?>
					</div>
					<div class="col">
						<?php if ($level == 'Admin') { ?>
							<div class="float-right">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
									Tambah <i class="fa fa-edit"></i>
							</div>
							</button>

							<!-- Modal -->
							<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form class="needs-validation" novalidate method="post" action="<?php echo base_url('administrator/kelas/save') ?>">
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Nama Kelas</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="kelas" required>
														<div class="invalid-feedback">
															Maaf Nama Kelas Tidak Boleh Kosong.
														</div>
													</div>
												</div>
												<div class="form-group row">
													<label for="staticEmail" class="col-sm-4 col-form-label">Penanggung Jawab</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="wali" required>
														<div class="invalid-feedback">
															Maaf Penanggung Jawab Tidak Boleh Kosong.
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
						<?php } ?>
					</div>
				</div>
				<br>
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<tr>
							<!-- <th scope="col">NO</th> -->
							<th class="wd-10">NO</th>
							<th scope="wd-20">Nama Kelas</th>
							<th scope="wd-40">Penanggung Jawab</th>
							<?php if ($level == 'Pegawai') { ?>
								<th scope="wd-30">Status</th>
							<?php } ?>
							<?php if ($level == 'Admin') { ?>
								<th scope="wd-30">Aksi</th>
							<?php } ?>
						</tr>
						<tr>
							<?php
							$no = 1;
							foreach ($data as $jrs) : ?>
								<td><?php echo $no++ ?></td>
								<td><?php echo ucfirst($jrs->nama_kelas) ?></td>
								<td> <?php echo ucfirst($jrs->wali_kelas) ?>
									<?php if ($level == 'Admin') { ?>
								<td>
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?php echo $jrs->id_kelas ?>">
										Edit <i class="fa fa-edit"></i>
									</button>
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?php echo $jrs->id_kelas ?>">
										Hapus <i class="fa fa-trash"></i>
									</button>

								</td>
						</tr>
					<?php } ?>
				<?php endforeach; ?>
					</table>
				</div>
			</div>
			<!-- Approach -->
		</div>
	</div>

</div>

<?php foreach ($data as $jr) : ?>
	<!-- Modal Edit -->
	<div class="modal fade" id="edit<?php echo $jr->id_kelas ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data <?php echo $jr->nama_kelas ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<!-- <?php var_dump($wali); ?> -->

				</div>
				<div class="modal-body">
					<form class="needs-validation" novalidate method="post" action="<?php echo base_url('administrator/kelas/update') ?>">
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Nama Kelas</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kelas" value="<?php echo ucfirst($jr->nama_kelas) ?>" required>
								<div class="invalid-feedback">
									Maaf Nama Kelas Tidak Boleh Kosong.
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="staticEmail" class="col-sm-4 col-form-label">Penanggung Jawab</label>
							<div class="col-sm-8">
							<input type="text" class="form-control" name="wali" value="<?php echo ucfirst($jr->wali_kelas) ?>" required>
								<div class="invalid-feedback">
									Maaf Penanggung Jawab Tidak Boleh Kosong.
								</div>
							</div>
						</div>
						<input type="hidden" value="<?php echo $jr->id_kelas ?>" name="id">
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal Confirm Hapus-->
	<div class="modal fade" id="delete<?php echo $jr->id_kelas ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data <?php echo ucfirst($jr->nama_kelas) ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Apakah Anda Yakin akan Menghapus Data <?php echo $jr->nama_kelas ?> ?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<?php echo anchor('administrator/kelas/hapus/' . $jr->id_kelas, '<div class="btn btn-warning">Hapus</div>') ?>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
