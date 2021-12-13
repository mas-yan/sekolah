<!DOCTYPE html>
<html>
<head>
	<title>data kelas</title>
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../../dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

	<!-- Main content -->
	<div class="col-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Data SPP</h3>
			</div>

<!-- /.card-header -->
<div class="card-body">
<div class="alert alert-info" role="alert">
			Pilih kelas untuk melihat daftar siswa
		</div>
<table id="example1" class="table table-bordered table-striped">
<thead>
	<tr>
		<th>No.</th>
		<th>Kelas</th>
		<th>aksi</th>
	</tr>
</thead>
<tbody>
	<?php
	$queryTampil = mysqli_query($conn,"SELECT * FROM kelas") or die(mysqli_error($conn));
	$no = 1;
	foreach ($queryTampil as $data) {
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $data['nama_kelas']; ?></td>
			<td class="text-center">
				<form method="get">
					<a href="?page=<?= $data['id_kelas'] ?>&lihat_siswa=<?= $data['id_kelas'] ?>" type="submit" class="btn btn-success"><i class="fas fa-eye"></i> Lihat</a>
				</form>
			</tr>
			<?php } ?>
	</tbody>
</table>
</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->

		<!-- jQuery -->
		<script src="../../plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
	</html>