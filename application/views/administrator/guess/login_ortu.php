<head>
	<link href="<?= base_url('assets/absen'); ?>/css/styles.css" rel="stylesheet" />
	<link href="<?= base_url('assets/absen'); ?>/css/bootstrap.css" rel="stylesheet" />
	<link href="<?= base_url('assets/absen'); ?>/vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet" />
	<link href="<?= base_url('assets/absen'); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="<?= base_url('assets/absen'); ?>/vendor/jonthornton-jquery-timepicker/jquery.timepicker.min.css" rel="stylesheet" />
	<link href="<?= base_url('assets/absen'); ?>/vendor/bootstrap-toggle-master/css/bootstrap4-toggle.min.css" rel="stylesheet" />
	<link href="<?= base_url('assets/absen'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
	<link href="<?= base_url('assets/absen'); ?>/vendor/leaflet/leaflet.css" rel="stylesheet" />
	<link href="<?= base_url('assets/absen'); ?>/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
	<script src="<?= base_url('assets/absen'); ?>/vendor/leaflet/leaflet.js"></script>

</head>

<body>
	<div class="row align-items-center">
		<div class="col bg-primary ml-0 mr-0 text-center text-white">
			<div class="ml-0 mr-0 mt-5 pb-5">
				<H2 class="mt-5">SISTEM PENJEMPUTAN SISWA TK</H2>
				<H2>JL. PLN, DESA, BANTAN TENGAH KEC.</H2>
				<H2>BANTAN, BENGKALIS, RIAU</H2>
			</div>

		</div>
	</div>
	<div class="container" style="margin-top: -70px;">
		<div class="row align-items-center vh-100">
			<div class="col-6 mx-auto">
				<div class="card" style="border:none">
					<div class="card-body d-flex flex-column align-items-center">
						<h4 class="mb-4">Login</h4>
						<?= $this->session->flashdata('pesan'); ?>
						<?= form_open('administrator/auth/process_login_ortu'); ?>
						<div class="form-group row" class="mt-2">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text"><span class="fas fa-calendar-alt"></span></div>
								</div>
								<input class="form-control py-4" name="tanggal_lahir" type="date" placeholder="Masukkan NIS Anak" />
							</div>
							<small>Tanggal Lahir Anak</small>
						</div>
						<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
						<div class="form-group row">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text"><span class="fas fa-id-badge"></span></div>
								</div>
								<input class="form-control py-4" name="nis" type="number" type="password" placeholder="Masukkan NIS Anak" />
							</div>
							<small>Nomor Induk Anak</small>
						</div>
						<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
						<div class="text-center">
							<button type="submit" class="btn btn-primary w-100"><span class="fas fa-fw fa-sign-in-alt mr-2"></span>Login</button>
							</br>
							<span class="small mt-2">atau login sebagai <a href="<?= base_url('administrator/auth'); ?>">Admin atau Petugas</a></span>	
						</div>
						<hr>
						<div class="container justify-content-center small">
						</form>
							<div class="d-flex align-items-center justify-content-center small">
								<br>
								<div class="text-muted">Copyright &copy; <?= date("Y"); ?><a href="<?= base_url(); ?>" class="ml-1"><?= $appname = (empty($dataapp['nama_app_absensi'])) ? 'Absensi Online' : $dataapp['nama_app_absensi']; ?></a>
									<!-- <div class="d-inline">Powered By<a href="#" class="ml-1">HakimXcodE</a></div> -->
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url('assets/absen'); ?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/absen'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets/absen'); ?>/js/scripts.js"></script>
	<script src="<?= base_url('assets/absen'); ?>/js/sb-admin-js.js"></script>
