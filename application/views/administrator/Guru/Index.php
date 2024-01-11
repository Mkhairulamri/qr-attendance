<div class="container">
	<br>
	<!-- Illustrations -->
	<div class="col-lg-8">
		<div class="card shadow">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-success">Daftar Kelas <?php echo ucfirst($nama)?></h6>
			</div>

			<div class="card-body">
				<div class="row">
					<div class="col-lg-9">
						<?php echo $this->session->flashdata('pesan') ?>
					</div>
					<div class="col">
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
								<td> <?php echo ucfirst($jrs->nama) ?>
									<?php if ($level == 'Admin') { ?>
								<td>
									<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit">
										Edit <i class="fa fa-edit"></i>
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
