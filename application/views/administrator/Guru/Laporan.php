<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.zoom').hover(function() {
            $(this).addClass('transisi');
        }, function() {
            $(this).removeClass('transisi');
        });
    });  
</script>
<style>
	    img.zoom {
        width: 100%;
        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        -ms-transition: all .2s ease-in-out;
    }
    .transisi {
        -webkit-transform: scale(1.8); 
        -moz-transform: scale(1.8);
        -o-transform: scale(1.8);
        transform: scale(1.8);
    }
</style>
<div class="container">
	<br>
	<!-- Illustrations -->
	<div class="col-lg-12">
		<div class="card shadow">
			<div class="card-header py-3">
				<div class="row">
					<div class="col">
						<h6 class="m-0 font-weight-bold text-success">Laporan Absensi Siswa 
						</h6>
					</div>
					<div class="col sm-4">
						<div class="row">
							<div class="col sm-2">
								<div class="float-right ml-3">
									<button type="button" class="btn btn-primary m-0" data-toggle="modal" data-target="#laporan">
										Laporan Excel <i class="far fa-file-excel"></i>
								</div>
							<!-- </div>
							<div class="col sm-2"> -->
								<!-- <div class="float-right">
									<button type="button" class="btn btn-primary m-0" data-toggle="modal" data-target="#tambah">
									Laporan PDF <i class="fa fa-edit"></i> -->
								<!-- </div> -->
							</div>
						</div>
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
								<th>Tanggal</th>
								<th>Foto Penjemput</th>
								<th>Absen Penjemputan</th>
								<th>Update</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
							<th>No</th>
								<th>Nama</th>
								<th>NIS</th>
								<th>Jenis Kelamin</th>
								<th>Kelas</th>
								<th>Tanggal</th>
								<th>Foto Penjemput</th>
								<th>Absen Penjemputan</th>
								<th>Update</th>
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
										$tanggal = $jrs->tanggal_absensi;
										$newDate = date('d-Mon-Y',strtotime($tanggal));
										echo $tanggal ?>
									</td>
									<!-- <td><?php echo $jrs->absen_masuk?></td> -->
									<td>
										<!-- Button trigger modal -->
										<!-- <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#card<?php echo ($jrs->id) ?>">
											Penjemput <i class="fa fa-user" aria-hidden="true"></i>
										</button> -->
										<img src="<?php echo base_url() ?>assets/img/penjemputan/<?php echo $jrs->foto_penjemputan?>" class="zoom" width="60%"  >
										<!-- Button trigger modal -->
									</td>
									<td><?php echo $jrs->absen_keluar?></td>
									<td>
										<?php if($jrs->updated_by == 0){
											foreach($user as $s){
												if($s->id == $jrs->insert_by){
													echo ucfirst($s->nama);
												}
											}
										}else{
											foreach($user as $s){
												if($s->id == $jrs->updated_by){
													echo ucfirst($s->nama);
												}
											}
										}?>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Approach -->
		</div>
	</div>

<!-- Modal Tambah -->
<div class="modal fade" id="laporan" tabindex="-1" aria-labelledby="laporan" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Cetak Laporan Absensi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="needs-validation" novalidate method="post" action="<?php echo base_url('administrator/Absensi/exportExcel') ?>" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Tanggal Awal</label>
							<div class="col-sm-8">
								<input type="date" class="form-control" name="start_date" required>
								<div class="invalid-feedback">
									Maaf Tanggal Tidak Boleh Kosong.
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Tanggal Akhir</label>
							<div class="col-sm-8">
								<input type="date" class="form-control" name="end_date" required>
								<div class="invalid-feedback">
									Maaf Tanggal Akhir Tidak Boleh Kosong.
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Cetak</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


<?php foreach ($data as $js) : ?>

<!-- Modal Tambah -->
<div class="modal fade" id="card<?php echo $js->id ?>" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Foto Penjemput <?php echo $js->nama_siswa ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body item-center">
				<div class="d-flex justify-content-center">		
					<img src="<?php echo base_url() ?>assets/img/penjemputan/<?php echo $js->foto_penjemputan?>" width="60%"  >
				</div>
			</div>
			<div class="modal-footer">
				<a href="<?php echo base_url() ?>assets/img/penjemputan/<?php echo $js->foto_penjemputan?>" download="Foto Penjemput -<?php echo $js->nama_siswa ?>"><button type="button" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Download Foto</button></a>
				<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<?php endforeach; ?>
