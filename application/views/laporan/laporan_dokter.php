<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Dokter</title>

	<link rel="stylesheet" href="<?= site_url('assets/css/laporan.css') ?>">
</head>

<body>
	<div class="text-center mb-4">
		<h2 class="">Sistem Informasi Klinik</h2>
		<small class="">Jalan sehat</small>
	</div>
	<div class="">
		<table class="bordered">
			<thead>
				<tr>
					<th style="width: 50px;">No</th>
					<th>Nama Dokter</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				foreach ($dokter as $d) : ?>
					<tr>
						<td class="text-center"><?= $no++; ?></td>
						<td><?= $d['nama_dokter']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="wk-r">
		<table>
			<tbody>
				<tr>
					<td></td>
					<td>
						<?php $tgl = date_create(date('d-m-Y')); ?>
						<p>Pemalang, <?= date_format($tgl, 'd M Y'); ?>
							<?= str_repeat("<br/>", 1) ?>
							<?= $this->session->userdata('username'); ?>
							<?= str_repeat("<br/>", 3) ?>
							______________________
						</p>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<script>
		window.print();
	</script>
</body>

</html>