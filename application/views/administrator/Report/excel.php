<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<center>
	<h3>LAPORAN ABSENSI SISWA TK</h3>
</center>
<br>

<table border="1" width="100%">
	<thead>
		<tr>
			<th scope="col">NO</th>
			<th scope="col">Nama Siswa</th>
			<th scope="col">Nomor Induk</th>
			<th scope="col">Jenis Kelamin</th>
			<th scope="col">Tanggal Lahir</th>
			<th scope="col">Alamt Tinggal</th>
			<th scope="col">Kelas</th>
			<th scope="col">Wali Kelas</th>
			<th scope="col">Status Penjemputan</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;
		foreach ($absensi as $jrs) { ?>
			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				<td><?php echo ucfirst($jrs->nama_siswa) ?></td>
				<td><?php echo ucfirst($jrs->nis) ?></td>
				<td><?php echo ucfirst($jrs->jenis_kelamin) ?></td>
				<td><?php echo ucfirst($jrs->tanggal_lahir) ?></td>
				<td><?php echo ucfirst($jrs->alamat) ?></td>
				<td><?php echo ucfirst($jrs->nama_kelas)?></td>
				<td><?php echo ucfirst($jrs->wali_kelas)?></td>
				<td>
					<?php if ($jrs->absen_keluar == '00:00:00') { ?>
						<p class="btn btn-sm btn-warning">Belum Dijemput</p>
					<?php } else { ?>
						<p class="btn btn-sm btn-success">Sudah Dijemput</p>
					<?php } ?>
				</td>

			</tr>
		<?php } ?>
	</tbody>
</table>
