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
				<div class="card">
				<?php foreach($data as $js):?>
				<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">QR-Code Penjemputan <?php echo $js->nama_siswa ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body item-center">
						<div class="d-flex justify-content-center">		
							<img src="<?php echo base_url() ?>assets/img/QrCode/<?php echo $js->qr_code?>" width="60%"  >
						</div>
					</div>
					<div class="modal-footer">
						<a href="<?php echo base_url() ?>assets/img/QrCode/<?php echo $js->qr_code?>" download="QR Penjemputan -<?php echo $js->nama_siswa ?>"><button type="button" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Download QR</button></a>
						<!-- <?php echo anchor('administrator/siswa/download/' . $js->id, '<button type="button" class="btn btn-sm  btn-primary"><i class="fas fa-save"></i> Download Kartu Penjemputan</button></button>') ?> -->
						<a href="<?php echo base_url(('administrator/Auth'))?>"><button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Kembali</button></a>
					</div>
				</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>

	<script src="<?= base_url('assets/absen'); ?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/absen'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets/absen'); ?>/js/scripts.js"></script>
	<script src="<?= base_url('assets/absen'); ?>/js/sb-admin-js.js"></script>
