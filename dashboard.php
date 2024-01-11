<?php if ($level == "Admin" || $level == "Wali" || $level == "Pegawai") { ?>

	<div class="container-fluid">

		<div class="my-4 d-sm-flex align-items-center justify-content-between">
			<h1>Dashboard</h1>
			<div class="btn btn-primary" id="sync-data-dashboard" onclick="refreshPage()"><span class="fas fa-sync-alt mr-1"></span>Refresh Data</div>
		</div>
		<div class="row">
			<?php if ($level == "Admin" || $level == "Wali") : ?>
				<div class="col-xl-3 col-md-6">
					<div class="card bg-primary text-white mb-4">
						<div class="card-body">
							<h4><span class="fas fa-user-tie mr-2"></span>Jumlah Siswa</h4>
							<h6 class="mt-3"><?php echo $jumlah_siswa ?><div class="d-inline ml-1">Siswa</div>
							</h6>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<div class="col-xl-3 col-md-6">
				<div class="card bg-success text-white mb-4">
					<div class="card-body">
						<h4><span class="fas fa-user-check mr-2"></span>Hadir</h4>
						<h6 class="mt-3"><?php echo $jumlah_absen_masuk ?><div class="d-inline ml-1">Siswa</div>
						</h6>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="card bg-secondary text-white mb-4">
					<div class="card-body">
						<h4><span class="fas fa-clock mr-2"></span>Belum Dijemput</h4>
						<h6 class="mt-3"><?php echo $jumlah_absen_keluar ?><div class="d-inline ml-1">Siswa</div>
						</h6>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="row">
			<div class="col-xl-6">
				<div class="card mb-4">
					<div class="card-header"><span class="fas fa-user-clock mr-1"></span>Daftar Siswa Masuk Hadir [Hari Ini]
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered dashboard" id="list-absensi-terlambat" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Jam Masuk</th>
										<th>Nama Siswa</th>
										<th>Status</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Jam Masuk</th>
										<th>Nama Siswa</th>
										<th>Status</th>
									</tr>
								</tfoot>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6">
				<div class="card mb-4">
					<div class="card-header"><span class="fas fa-user-check mr-1"></span>Daftar Siswa Belum Dijemput [Hari Ini]
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered dashboard" id="list-absensi-masuk" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Waktu Datang</th>
										<th>Nama Siswa</th>
										<th>Status</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Waktu Datang</th>
										<th>Nama Siswa</th>
										<th>Status</th>
									</tr>
								</tfoot>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</div>

<?php } ?>

<?php if ($level == "ortu") { ?>

	<div class="container">
		<div class="justify-content-center">
			<h1 class="my-4"><span class="fas fa-address-card mr-2"></span>Profil Saya</h1>
			<div class="card mb-4">
				<div class="card-header text-center">
					<div class="float-right">
						<button id="qrcode-pegawai" class="btn btn-primary" data-toggle="modal" data-target="#qrcodemodal"><span class="fas fa-qrcode mr-1"></span>QR CODE</button>
					</div>
				</div>
				<div class="card-body">
					<div class="row detail">
						<div class="col-md-2 col-sm-4 col-6 p-2">
							<img class="img-thumbnail" src="<?php echo base_url() ?>assets/img/uploads/<?php echo $data->foto_ortu ?> ?>" class="card-img" style="width:100%;">
						</div>
						<div class="col-md-10 col-sm-8 col-6">
							<dl class="row">
								<dt class="col-sm-5">Nama Lengkap:</dt>
								<dd class="col-sm-7" id="nama_pegawai"><?php echo ucfirst($data->orang_tua) ?></dd>
								<dt class="col-sm-5">Nama Anak:</dt>
								<dd class="col-sm-7"><?php echo ucfirst($data->nama_siswa) ?></dd>
								<dt class="col-sm-5">Nomor Induk Siswa:</dt>
								<dd class="col-sm-7"><?php echo ucfirst($data->nis) ?></dd>
								<dt class="col-sm-5">Tanggal Lahir:</dt>
								<dd class="col-sm-7"><?php echo ucfirst($data->tanggal_lahir) ?></dd>
								<dt class="col-sm-5">Jenis Kelamin:</dt>
								<dd class="col-sm-7"><?php echo ucfirst($data->jenis_kelamin) ?></dd>
								<dt class="col-sm-5">Alamat:</dt>
								<dd class="col-sm-7"><?php echo ucfirst($data->alamat) ?></dd>
								<dt class="col-sm-5">Kelas Anak :</dt>
								<dd class="col-sm-7 text-truncate"><?php echo ucfirst($data->nama_kelas) ?></dd>
								<!-- <dt class="col-sm-5">Wali Kelas :</dt>
                            <dd class="col-sm-7 text-truncate"><?php echo ucfirst($data->nama) ?></dd> -->
								<dt class="col-sm-5">Status Siswa:</dt>
								<dd class="col-sm-7"><span class="badge badge-success">Siswa Aktif</span></dd>
							</dl>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="d-flex align-items-center justify-content-between small">
						<div class="text-muted">Id Pegawai: I78234234234</div>
						<div class="text-muted">Akun Dibuat: 10-11-2023</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal QR Code -->
	<div class="modal fade" id="qrcodemodal" tabindex="-1" role="dialog" aria-labelledby="qrcodemodal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">QR-Code Penjemputan <?php echo $data->nama_siswa ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body item-center">
						<?php
							$status = null;
							$tgl = substr($data->qr_code,6,2);
							$bln = substr($data->qr_code,4,2);
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
								<img src="<?php echo base_url() ?>assets/img/QrCode/<?php echo $data->qr_code?>" width="60%"  >
							</div>
							<small>
								QR Penjemputan Tanggal : <?php echo $date?>
							</small>
						<?php else:?>
							<span class="badge badge-danger">QR Code Expired</span>
						<?php endif;?>
					</div>
					<div class="modal-footer">
						<a href="<?php echo base_url('administrator/OrangTua/UpdateQr/'.$data->id)?>"><button type="button" class="btn btn-sm btn-primary"><i class="fas fa-sync-alt"></i> Update QR Penjemputan</button></a>
						<a href="<?php echo base_url() ?>assets/img/QrCode/<?php echo $data->qr_code?>" download="QR Penjemputan -<?php echo $data->nama_siswa ?>"><button type="button" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Download QR</button></a>
						<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
					</div>
			</div>
		</div>
	</div>

<?php } ?>


<script>
	function refreshPage() {
		// Reload the current page
		location.reload();
	}
</script>
