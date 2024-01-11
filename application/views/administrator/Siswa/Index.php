<div class="container">
	<br>
	<!-- Illustrations -->
	<div class="col-lg-12">
		<div class="card shadow">
			<div class="card-header py-3">
				<div class="row">
					<div class="col">
						<?php if ($level == 'Admin') { ?>
							<h6 class="m-0 font-weight-bold text-success">Daftar Siswa</h6>

						<?php } ?>
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
				<br>
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Siswa</th>
								<th>Nomor Induk Siswa</th>
								<th>Jenis Kelamin</th>
								<th>Alamat Tinggal</th>
								<th>Kelas</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>No</th>
								<th>Nama Siswa</th>
								<th>Nomor Induk Siswa</th>
								<th>Jenis Kelamin</th>
								<th>Alamat Tinggal</th>
								<th>Kelas</th>
								<th width="20%">Aksi</th>
							</tr>
						</tfoot>
						<tbody>

							<?php
							$no = 1;
							foreach ($siswa as $jrs) : ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo ucfirst($jrs->nama_siswa) ?></td>
									<td><?php echo ($jrs->nis) ?></td>
									<td><?php echo ucfirst($jrs->jenis_kelamin) ?>
									<td><?php echo ucfirst($jrs->tanggal_lahir) ?></td>
									<td><?php echo ucfirst($jrs->nama_kelas) ?></td>
									<td>
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?php echo ($jrs->id) ?>">
											Edit <i class="fa fa-edit"></i>
										</button>
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?php echo ($jrs->id) ?>">
											Hapus <i class="fa fa-trash"></i>
										</button>

									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Approach -->
		</div>
	</div>


	<!-- modal -->

	<!-- Modal Tambah -->
	<div class="modal fade bd-example-modal-lg" id="tambah" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="needs-validation" novalidate method="post" action="<?php echo base_url('administrator/siswa/save') ?>" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Nama Siswa</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nama" required>
								<div class="invalid-feedback">
									Maaf Nama Siswa Tidak Boleh Kosong.
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Nomor Induk</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nis" required>
								<div class="invalid-feedback">
									Maaf Nomor Induk Siswa Tidak Boleh Kosong.
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="staticEmail" class="col-sm-4 col-form-label">Jenis Kelamin</label>
							<div class="col-sm-8">
								<select id="inputState" class="form-control" name="kelamin">
									<option selected>Pilih Jenis Kelamin...</option>
									<option value="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
								<div class="invalid-feedback">
									Maaf Jenis Kelamin Tidak Boleh Kosong.
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Tanggal Lahir</label>
							<div class="col-sm-8">
								<input type="date" class="form-control" name="tgl_lahir" required>
								<div class="invalid-feedback">
									Maaf tanggal lahir Siswa Tidak Boleh Kosong.
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Alamat</label>
							<div class="col-sm-8">
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="alamat" require></textarea>
								<div class="invalid-feedback">
									Maaf Alamat Siswa Tidak Boleh Kosong.
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="staticEmail" class="col-sm-4 col-form-label">Kelas</label>
							<div class="col-sm-8">
								<select id="inputState" class="form-control" name="kelas">
									<option selected>Pilih Kelas...</option>
									<?php
									foreach ($kelas as $wa) : ?>
										<option value="<?php echo $wa->id_kelas ?>"><?php echo ucfirst($wa->nama_kelas) ?></option>
									<?php endforeach ?>
								</select>
								<div class="invalid-feedback">
									Maaf Penanggung Jawab Tidak Boleh Kosong.
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Nama Orang Tua</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="ortu" required>
								<div class="invalid-feedback">
									Maaf Nama Orang Tua Tidak Boleh Kosong.
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Foto Siswa</label>
							<div class="col-sm-8">
								<input type="file" class="form-control" name="foto_ortu" />
								<div class="input-group-append">
									<small>Optional</small>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Foto Orang Tua</label>
							<div class="col-sm-8">
								<input type="file" class="form-control" name="foto_siswa" />
								<div class="input-group-append">
									<small>Optional</small>
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

	<!-- Modal Edit dan Hapus -->
	<?php foreach ($siswa as $js) : ?>

		<!-- Modal Edit -->
		<div class="modal fade bd-example-modal-lg" id="edit<?php echo $js->id ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update Data Siswa <?php echo $js->nama_siswa ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form class="needs-validation" novalidate method="post" action="<?php echo base_url('administrator/siswa/Update') ?>" enctype="multipart/form-data">
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Nama Siswa</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="nama" required value="<?php echo ucfirst($js->nama_siswa) ?>">
									<div class="invalid-feedback">
										Maaf Nama Siswa Tidak Boleh Kosong.
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Nomor Induk</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="nis" required value="<?php echo ucfirst($js->nis) ?>">
									<div class="invalid-feedback">
										Maaf Nomor Induk Siswa Tidak Boleh Kosong.
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="staticEmail" class="col-sm-4 col-form-label">Jenis Kelamin</label>
								<div class="col-sm-8">
									<select id="inputState" class="form-control" name="kelamin">
										<option disabled>Pilih Jenis Kelamin...</option>
										<option value="Laki-Laki" <?php if ($js->jenis_kelamin == "Laki-Laki") : ?> selected <?php endif; ?>>Laki-Laki</option>
										<option value="Perempuan" <?php if ($js->jenis_kelamin == "Perempuan") : ?> selected <?php endif; ?>>Perempuan</option>
									</select>
									<div class="invalid-feedback">
										Maaf Jenis Kelamin Tidak Boleh Kosong.
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Tanggal Lahir</label>
								<div class="col-sm-8">
									<input type="date" class="form-control" name="tgl_lahir" required value="<?php echo ucfirst($js->tanggal_lahir) ?>">
									<div class="invalid-feedback">
										Maaf tanggal lahir Siswa Tidak Boleh Kosong.
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Alamat</label>
								<div class="col-sm-8">
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="alamat" require><?php echo ucfirst($js->alamat) ?></textarea>
									<div class="invalid-feedback">
										Maaf Alamat Siswa Tidak Boleh Kosong.
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="staticEmail" class="col-sm-4 col-form-label">Kelas</label>
								<div class="col-sm-8">
									<select id="inputState" class="form-control" name="kelas">
										<option selected>Pilih Kelas...</option>
										<?php
										foreach ($kelas as $wa) : ?>
											<option value="<?php echo $wa->id_kelas ?>" <?php if ($wa->id_kelas == $js->kelas) : ?> selected <?php endif; ?>><?php echo ucfirst($wa->nama_kelas) ?></option>
										<?php endforeach ?>
									</select>
									<div class="invalid-feedback">
										Maaf Penanggung Jawab Tidak Boleh Kosong.
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Nama Orang Tua</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="ortu" required value="<?php echo ucfirst($js->orang_tua) ?>">
									<div class="invalid-feedback">
										Maaf Nama Orang Tua Tidak Boleh Kosong.
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="staticEmail" class="col-sm-4 col-form-label">Status</label>
								<div class="col-sm-8">
									<select id="inputState" class="form-control" name="kelas">
										<option selected>Pilih Kelas...</option>
										<?php
										foreach ($kelas as $wa) : ?>
											<option value="<?php echo $wa->id_kelas ?>" <?php if ($wa->id_kelas == $js->kelas) : ?> selected <?php endif; ?>><?php echo ucfirst($wa->nama_kelas) ?></option>
										<?php endforeach ?>
									</select>
									<div class="invalid-feedback">
										Maaf Penanggung Jawab Tidak Boleh Kosong.
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Foto Siswa</label>
								<div class="col-sm-8">
									<input type="file" class="form-control" name="foto_siswa" />
									<div class="input-group-append">
										<small>Optional</small>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-4 col-form-label">Foto Orang Tua</label>
								<div class="col-sm-8">
									<input type="file" class="form-control" name="foto_ortu"  />
									<div class="input-group-append">
										<small>Optional</small>
									</div>
								</div>
							</div>
							<input type="hidden" value="<?php echo ucfirst($js->id) ?>" name="id">
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
		<div class="modal fade" id="delete<?php echo $js->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Hapus Data <?php echo ucfirst($js->nama_siswa) ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Apakah Anda Yakin akan Menghapus Data <?php echo ucfirst($js->nama_siswa)?> ?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<?php echo anchor('administrator/siswa/hapus/' . $js->id, '<div class="btn btn-danger">Hapus</div>') ?>
					</div>
				</div>
			</div>
		</div>
		</td>


	<?php endforeach; ?>
