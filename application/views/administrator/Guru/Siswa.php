<div class="container">
	<br>
	<!-- Illustrations -->
	<div class="col-lg-12">
		<div class="card shadow">
			<div class="card-header py-3">
				<div class="row">
					<div class="col">
						<h6 class="m-0 font-weight-bold text-success">Daftar Siswa 
						<?php if($menu == 'kelas'):?>
							Kelas <?php echo ucfirst($kelas) ?>	
						<?php endif;?>
						</h6>
					</div>
					<div class="col">
						<!-- <div class="float-right">
							<button type="button" class="btn btn-primary m-0" data-toggle="modal" data-target="#tambah">
								Tambah <i class="fa fa-edit"></i>
						</div> -->
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
								<th>Nama</th>
								<th>NIS</th>
								<th>Jenis Kelamin</th>
								<th>Kelas</th>
								<th>Absensi Hari Ini</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>NIS</th>
								<th>Jenis Kelamin</th>
								<th>Kelas</th>
								<th>Absensi Hari Ini</th>
							</tr>
						</tfoot>
						<tbody>

							<?php
							$no = 1;

							foreach ($data as $jrs) : ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo ucfirst($jrs->nama_siswa) ?></td>
									<td><?php echo ($jrs->nis) ?></td>
									<td><?php echo ucfirst($jrs->jenis_kelamin) ?>
									<td><?php echo ucfirst($jrs->nama_kelas) ?></td>
									<td>
										<?php							
										$absen = 0;
										foreach ($absensi as $ab) :
											if ($ab->id_siswa == $jrs->id) {
												$absen++;
											}
										endforeach;
										if($absen > 0 ){
											echo "<p class='badge badge-primary'>Sudah Dijemput</p>";
										}else{
											echo "<p class='badge badge-warning'>Belum Dijemput</p>";
										}
										?>
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


	<!-- Modal Edit dan Hapus -->
	<?php foreach ($data as $js) : ?>

		<!-- Modal Confirm Hapus-->
		<div class="modal fade" id="hadir<?php echo $js->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Penjemputan Manual <?php echo ucfirst($js->nama_siswa) ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Konfirmasi Penjemputan siswa Hari ini<?php echo ucfirst($js->nama_siswa) ?> ?
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<?php echo anchor('administrator/Guru/absen_masuk/' . $js->nis, '<div class="btn btn-primary">Hadir</div>') ?>
					</div>
				</div>
			</div>
		</div>
		</td>

	<?php endforeach; ?>
