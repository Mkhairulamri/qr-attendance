<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<center>
	<h3>REKAP DATA SIMPANAN BUMDES SUNGAI NIBUNG</h3>
</center>
<br>

<table border="1" width="100%">

	<thead>

		<tr>
			<th scope="col">NO</th>
			<th scope="col">NO Simpanan</th>
			<th scope="col">Nama</th>
			<th scope="col">Jumlah</th>
			<th scope="col">Tanggal</th>
			<th scope="col">Jam</th>
			<th scope="col">Jenis</th>
			<th scope="col">Status</th>

		</tr>

	</thead>

	<tbody>

		<?php $no = 1;
		foreach ($simpan as $jrs) { ?>

			<tr>
				<td width="20px"><?php echo $no++ ?></td>
				<td><?php echo $jrs->no_simpanan ?></td>
				<td><?php echo $jrs->nama ?></td>
				<td>Rp. <?php echo $jrs->jumlah ?></td>
				<td><?php echo $jrs->tanggal ?></td>
				<td><?php echo $jrs->jam ?></td>
				<td><?php echo $jrs->jenis ?></td>
				<td>
					<?php if ($jrs->status == 'masuk') { ?>
						<div class="btn btn-sm btn-success">Saldo Tersedia</div>
						<hr>
					<?php } else { ?>
						<div class="btn btn-sm btn-warning">Saldo Sudah Ditarik</div>
						<hr>
					<?php } ?>
				</td>

			</tr>

		<?php } ?>

	</tbody>
</table>
<?php
foreach ($jumlah as $rows) {
?>
	<p> Total Simpanan : Rp. <?php echo $rows->total; ?></p>
<?php } ?>
