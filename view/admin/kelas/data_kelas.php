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
</head>
<body>

	<!-- Main content -->
	<div class="col-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Data kelas</h3>
			</div>

<!-- /.card-header -->
<div class="card-body">

<button data-toggle="modal" data-target="#modal-tambah" style="margin-bottom: 20px" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</button>

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
				<button type="button" data-toggle="modal" data-target="#modal-edit<?= $data['id_kelas']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</button>
				<form style="display: inline;" method="post">
					<input type="hidden" name="id_hapus" value="<?= $data['id_kelas']; ?>"></input>
					|
					<a href="kelas/hapus_kelas.php?id_kelas=<?=$data['id_kelas']?>" type="button" type="submit" name="hapus" class="hapus_kelas btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
				</form>
			</tr>
			<!-- Modal edit -->
			<div class="modal fade" id="modal-edit<?= $data['id_kelas']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Data kelas</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
			<form role="form" method="post" action="">
				<input name="id_ubah" type="hidden" value="<?= $data['id_kelas'] ?>">
				<div class="card-body">
					<div class="form-group">
						<label for="kelas">Kelas</label>
						<input required name="kelas" type="text" class="form-control" value="<?= $data['nama_kelas'] ?>">
					</div>
				</div>


				<!-- /.card-body -->
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="tombol_ubah" class="btn btn-primary">Tambah Data</button>
				</div>
			</form>
					</div>
				</div>
			</div>
		</div>
		<!-- end modal edit -->
		<?php } ?>
	</tbody>
</table>
</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->


		<!-- Modal tambah -->
		<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Data kelas</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form role="form" method="post" action="">
							<div class="card-body">
								<div class="form-group">
									<label for="kelas">Kelas</label>
									<input required name="kelas" type="text" class="form-control" id="kelas" placeholder="kelas">
								</div>
							</div>
							<!-- /.card-body -->
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" name="tombol_tambah" class="btn btn-primary">Tambah Data</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- end modal tambah -->

		<!-- jQuery -->
		<script src="../../plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- SweetAlert2 -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

		<script type="text/javascript">
			$('.hapus_kelas').on('click',function(e){
				e.preventDefault();
				const href = $(this).attr('href')
				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
					if (result.value) {

						swal.fire({ 
							title: "BERHASIL",
							text: "Data berhasil di hapus",
							icon: "success", buttons: [false, "OK"], 
						}).then(function() { 
							document.location=href;
						}); 
					}
				})
			})
		</script>

	</body>
	</html>
	<?php 
// tambah data
// jika tombol tambah di klik
	if (isset($_POST['tombol_tambah'])) {
// mengambil data dari form
		$kelas = mysqli_escape_string($conn,$_POST['kelas']);

// mengirim data ke database
		$sql = "INSERT INTO kelas VALUES ('','$kelas')";
		$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if ($query) {
			?>
			<script type="text/javascript">
				swal.fire({ 
					title: "BERHASIL",
					text: "Data Telah ditambahkan",
					icon: "success", buttons: [false, "OK"],
				}).then(function() { 
					window.location.href="<?= baseUrl('view/admin?page=data_kelas') ?>"; 
				});
			</script>
			<?php
		}
	}

// ubah data
// jika tombol ubah di klik
	if (isset($_POST['tombol_ubah'])) {
		$id_ubah = mysqli_real_escape_string($conn,$_POST['id_ubah']);
		$kelas = mysqli_real_escape_string($conn,$_POST['kelas']);

	// update data di database
		$sql = "UPDATE kelas SET nama_kelas = '$kelas' WHERE id_kelas = '$id_ubah' ";
		$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if ($query) {
			?>
			<script type="text/javascript">
				swal.fire({ 
					title: "BERHASIL",
					text: "Data Telah di ubah",
					icon: "success", buttons: [false, "OK"],
				}).then(function() { 
					window.location.href="<?= baseUrl('view/admin?page=data_kelas') ?>"; 
				});
			</script>
			<?php
		}
	}
	?>