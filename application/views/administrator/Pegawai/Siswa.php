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
											if ($ab->id_siswa == $jrs->id && $ab->absen_keluar != '00:00:00') {
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

