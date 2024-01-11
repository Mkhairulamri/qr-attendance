<div class="container">
	<br>
	<!-- Illustrations -->
	<div class="col-lg-12">
		<div class="card shadow">
			<div class="card-header py-3">
				<div class="row">
					<div class="col">
						<h6 class="m-0 font-weight-bold text-success">Daftar Orang Tua Siswa</h6>
					</div>
				</div>
			</div>


			<div class="card-body">
				<?php

use phpDocumentor\Reflection\Types\Boolean;

 echo $this->session->flashdata('pesan') ?>
				<br>
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Orang Tua</th>
								<th>Alamat</th>
								<th>Nama Anak</th>
								<th>Jenis Kelamin Anak</th>
								<th>Kelas</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>No</th>
								<th>Nama Orang Tua</th>
								<th>Alamat</th>
								<th>Nama Anak</th>
								<th>Jenis Kelamin Anak</th>
								<th>Kelas</th>
								<th>Aksi</th>
							</tr>
						</tfoot>
						<tbody>

							<?php
							$no = 1;
							foreach ($siswa as $jrs) : ?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo ucfirst($jrs->orang_tua) ?></td>
									<td><?php echo ucfirst($jrs->alamat) ?></td>
									<td><?php echo ucfirst($jrs->nama_siswa) ?>
									<td><?php echo ucfirst($jrs->jenis_kelamin) ?></td>
									<td><?php echo ucfirst($jrs->nama_kelas) ?></td>
									<td>
										<!-- Button trigger modal -->
										<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#card<?php echo ($jrs->id) ?>">
											QR-Code <i class="fa fa-qrcode" aria-hidden="true"></i>
										</button>
										<!-- Button trigger modal -->
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
	<?php foreach ($siswa as $js) : ?>

		<!-- Modal Tambah -->
		<div class="modal fade" id="card<?php echo $js->id ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">QR-Code Penjemputan <?php echo $js->nama_siswa ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body item-center">
						<?php
							$status = null;
							$tgl = substr($js->qr_code,6,2);
							$bln = substr($js->qr_code,4,2);
							date_default_timezone_set("Asia/Jakarta");
							$now = date('m-d');
							$date = date('d-M-Y');
							$qr = $bln.'-'.$tgl;
							if($now == $qr){
								$status = true;
							}else{
								$status = false;
							}
						?>
						<?php if($status):?>
							<div class="d-flex justify-content-center">		
								<img src="<?php echo base_url() ?>assets/img/QrCode/<?php echo $js->qr_code?>" width="60%"  >
							</div>
							<small>
								QR Penjemputan Tanggal : <?php echo $date?>
							</small>
						<?php else:?>
							<span class="badge badge-danger">QR Code Expired</span>
						<?php endif;?>
					</div>
					<div class="modal-footer">
						<a href="<?php echo base_url('administrator/OrangTua/UpdateQr/'.$js->id)?>"><button type="button" class="btn btn-sm btn-primary"><i class="fas fa-sync-alt"></i> Update QR Penjemputan</button></a>
						<a href="<?php echo base_url() ?>assets/img/QrCode/<?php echo $js->qr_code?>" download="QR Penjemputan -<?php echo $js->nama_siswa ?>"><button type="button" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Download QR</button></a>
						<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>


	<?php endforeach; ?>
