<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center " href="<?php echo base_url('administrator/dashboard') ?>">
				<div class="sidebar-brand-icon">
					<!-- <i> <img class="img-profile" src="<?php echo base_url() ?>assets/img/absensi.png" width="40%"> </i> -->
					<i class="fas fa-qrcode"></i>
				</div>
				<div class="sidebar-brand-text mx-1">ABSENSI TK QRCODE</div>
			</a>

			<hr class="sidebar-divider my-0">


			<?php if ($level == "Admin" || $level == "Wali" || $level == "Pegawai") { ?>

			<li class="nav-item
			<?php if ($menu == "dashboard") : ?>
			active
			<?php endif; ?>
			">
				<a class="nav-link" href="<?php echo base_url('administrator/dashboard') ?>">
					<i class="fas fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>
			<?php } ?>

			<?php if ($level == "ortu") { ?>

			<li class="nav-item
			<?php if ($menu == "dashboard") : ?>
			active
			<?php endif; ?>
			">
				<a class="nav-link" href="<?php echo base_url('orangtua') ?>">
					<i class="fas fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>
			<?php } ?>

			<hr class="sidebar-divider">


			<div class="sidebar-heading active">
            Menu
        	</div>
			

			<?php if ($level == "Admin") { ?>
				<li class="nav-item
				<?php if ($menu == "kelas") : ?>
				active
				<?php endif; ?>
			">
					<a class="nav-link" href="<?php echo base_url('administrator/Kelas') ?>">
						<i class="fas fa-chalkboard-teacher"></i>
						<span>Kelas</span></a>
				</li>

				<li class="nav-item
		 <?php if ($menu == "siswa") : ?>
				active
				<?php endif; ?>
		 ">
					<a class="nav-link" href="<?php echo base_url('administrator/Siswa') ?>">
						<i class="fas fa-users"></i>
						<span>Data Siswa</span></a>
				</li>

				<li class="nav-item
			<?php if ($menu == "orang_tua") : ?>
				active
			<?php endif; ?>
			">
					<a class="nav-link" href="<?php echo base_url('administrator/OrangTua') ?>">
						<i class="fas fa-user-friends"></i>
						<span>Orang Tua</span></a>
				</li>

				<li class="nav-item
				<?php if ($menu == "Absensi") : ?>
					active
				<?php endif; ?>
				">
					<a class="nav-link" href="<?php echo base_url('administrator/Absensi') ?>">
						<i class="fas fa-indent"></i>
						<span>Absensi</span></a>
				</li>


				<li class="nav-item
			<?php if ($menu == "user") : ?>
				active
				<?php endif; ?>
			">
					<a class="nav-link" href="<?php echo base_url('administrator/user') ?>">
						<i class="fa fa-address-book"></i>
						<span>User</span></a>
				</li>
				<li class="nav-item
				<?php if ($menu == "profil") : ?>
					active
				<?php endif; ?>
				">
					<a class="nav-link" href="<?php echo base_url('administrator/user/profil') ?>">
						<i class="far fa-user"></i>
						<span>Akun</span></a>
				</li>


			<?php } ?>

			<!-- Nav Item - Pages Collapse Menu -->
			<?php if ($level == "Pegawai") { ?>


				<li class="nav-item
				<?php if ($menu == "qr") : ?>
				active
				<?php endif; ?>
				">
					<a class="nav-link" href="<?php echo base_url('administrator/Pegawai') ?>">
						<i class="fas fa-qrcode mr-1"></i>
						<span>Scan QR</span></a>
				</li>

				<li class="nav-item
				<?php if ($menu == "Siswa") : ?>
				active
				<?php endif; ?>
				">
					<a class="nav-link" href="<?php echo base_url('administrator/Pegawai/Siswa') ?>">
						<i class="fas fa-users"></i>
						<span>Data Siswa</span></a>
				</li>

				<li class="nav-item
				<?php if ($menu == "profil") : ?>
					active
				<?php endif; ?>
				">
					<a class="nav-link" href="<?php echo base_url('administrator/user/profil') ?>">
						<i class="far fa-user"></i>
						<span>Akun</span></a>
				</li>


			<?php } ?>

			<!-- Nav Item - Pages Collapse Menu -->
			<?php if ($level == "Wali") { ?>
				<li class="nav-item
				<?php if ($menu == "kelas") : ?>
					active
					<?php endif; ?>
				">
					<a class="nav-link" href="<?php echo base_url('administrator/Guru/kelas') ?>">
						<i class="fas fa-users"></i>
						<span>Data Siswa</span></a>
				</li>

				<li class="nav-item
					<?php if ($menu == "Siswa") : ?>
					active
					<?php endif; ?>
					">
					<a class="nav-link" href="<?php echo base_url('administrator/Guru/Siswa') ?>">
					<i class="fas fa-list"></i>
						<span>Seluruh Siwa</span></a>
				</li>

				<li class="nav-item
				<?php if ($menu == "qr") : ?>
				active
				<?php endif; ?>
				">
					<a class="nav-link" href="<?php echo base_url('administrator/Guru/ScanQr') ?>">
						<i class="fas fa-qrcode mr-1"></i>
						<span>Scan QR</span></a>
				</li>

				<li class="nav-item
				<?php if ($menu == "Laporan") : ?>
					active
				<?php endif; ?>
				">
					<a class="nav-link" href="<?php echo base_url('administrator/Guru/LaporanGuru') ?>">
						<i class="fas fa-users"></i>
						<span>Rekap Absen</span></a>
				</li>

				<li class="nav-item
				<?php if ($menu == "profil") : ?>
					active
				<?php endif; ?>
				">
					<a class="nav-link" href="<?php echo base_url('administrator/user/profil') ?>">
						<i class="far fa-user"></i>
						<span>Akun</span></a>
				</li>

			<?php } ?>

			<?php if ($level == "ortu") : ?>

				<li class="nav-item
				<?php if ($menu == "Absensi") : ?>
					active
				<?php endif; ?>
				">
					<a class="nav-link" href="<?php echo base_url('OrangTua/AbsensiAnak') ?>">
						<i class="fas fa-indent"></i>
						<span>Absensi</span></a>
				</li>
			<?php endif; ?>


			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('administrator/auth/logout') ?>">
					<i class="fas fa-sign fa-sign-out"></i>
					<span>Logout</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Search -->
					<?php echo form_open('administrator/biodata/search') ?>

					<?php echo form_close() ?>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ucfirst($nama); ?></span>
								<img class="img-profile rounded-circle" src="<?php echo base_url() ?>assets/img/user.png">
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<?php if($level =='ortu') : ?>
								<a class="dropdown-item" href="<?php echo base_url('OrangTua') ?>">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profil ortu
								</a>
								<?php elseif ($level != 'ortu'):?>
									<a class="dropdown-item" href="<?php echo base_url('administrator/user/profil') ?>">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Profil selain ortu
								</a>
								<?php endif;?>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Keluar
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->
				<!-- Logout Modal-->
				<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin akan Keluar?</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">Pilih Keluar untuk Mengakhiri Sesi Anda.</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
								<a class="btn btn-success" href="<?php echo base_url('administrator/auth/logout') ?>">Keluar</a>
							</div>
						</div>
					</div>
				</div>
