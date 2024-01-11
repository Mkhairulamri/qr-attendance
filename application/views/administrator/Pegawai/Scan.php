<div class="container">
	<br>
	<!-- Illustrations -->
	<div class="col-lg-12">
		<div class="card shadow">
			<div class="card-header py-3">
				<div class="row">
					<div class="col">
						<h6 class="m-0 font-weight-bold text-success">Scan QR Code Siswa</h6>
					</div>
					<div class="col">
					<button type="button" class="btn btn-primary m-0" id="toggle-camera">Aktifkan Kamera QR <i class="fa fa-edit"></i></button>
					</div>	
				</div>
			</div>
			<div class="card-body">
					<div class="col">
						<?php echo $this->session->flashdata('pesan') ?>
					</div>
				<form class="needs-validation" novalidate method="post" action="<?php echo base_url('administrator/Absensi/update_pulang') ?>" enctype="multipart/form-data">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Kode Penjemputan</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="nis" readonly id="nis" />
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Foto Penjemputan</label>
						<div class="col-sm-8">
							<input type="file" class="form-control" name="penjemputan" required/>
							<div class="invalid-feedback">
									Maaf Foto Penjemputan Tidak Boleh Kosong
								</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
				
				<div id="scanner-container">
					<video id="scanner"></video>
				</div>

			</div>
			<!-- Approach -->
		</div>
	</div>

	<!-- Include jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

	<!-- Include Instascan -->
	<script src="path/to/instascan.min.js"></script>


	<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

	<script>
		$(document).ready(function() {
			// Initialize scanner and camera status
			let scanner = null;
			let activeCameraIndex = -1; // -1 indicates no active camera

			// Function to start or stop the scanner based on the camera status
			function toggleScanner() {
				if (scanner) {
					scanner.stop();
					activeCameraIndex = -1;
				} else {
					startScanner();
				}
			}

			function startScanner() {
				scanner = new Instascan.Scanner({
					video: document.getElementById('scanner')
				});

				scanner.addListener('scan', function(content) {
					// alert("Scanner : "+content);
					document.getElementById('nis').value = content;
					document.getElementById('nis').classList.add('is-valid');
				});

				Instascan.Camera.getCameras().then(function(cameras) {
					if (cameras.length > 0) {
						activeCameraIndex = (activeCameraIndex + 1) % cameras.length;
						scanner.start(cameras[activeCameraIndex]);
					} else {
						console.error('Kamera Tidak Ditemukan.');
					}
				}).catch(function(e) {
					console.error(e);
				});
			}

			$('#toggle-camera').on('click', function() {
				toggleScanner();
			});

			toggleScanner();
		});
	</script>
