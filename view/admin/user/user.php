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

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

	<!-- Main content -->
<div class="col-12">
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Data User</h3>
	</div>

<!-- /.card-header -->
<div class="card-body">
<button data-toggle="modal" data-target="#modal-tambah" style="margin-bottom: 20px" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah User Admin</button>
	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No.</th>
				<th>Username</th>
				<th>Password</th>
				<th>nama</th>
				<th>level</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$queryTampil = mysqli_query($conn,"SELECT * FROM user") or die(mysqli_error($conn));
			$no = 1;
			foreach ($queryTampil as $data) {
				?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $data['username']; ?></td>
					<td><i>tidak di tampilkan</i></td>
					<td><?= $data['nama']; ?></td>
					<td><?= $data['level']; ?></td>
					<td class="text-center">
						<button type="button" data-toggle="modal" data-target="#modal-edit<?= $data['id_user']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah Password</button>
						<?php
						if ($data['level'] == 'Admin'){ ?>
						<form style="display: inline;" method="post">
					<input type="hidden" name="id_hapus" value="<?= $data['id_user']; ?>"></input>
					|
					<a href="user/hapus_user.php?id_user=<?=$data['id_user']?>" type="button" type="submit" name="hapus" class="hapus_user btn btn-danger"><i class="fas fa-trash"></i> Hapus Admin</a>
				</form>
						<?php } ?> 
					</td>
				</tr>

				<!-- Modal edit -->
<div class="modal fade" id="modal-edit<?= $data['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-danger" role="alert">
					<i>Pastikan sudah ada persetujuan dengan user.</i>
				</div>
				<form role="form" method="post" action="">
				<input name="id_ubah" type="hidden" value="<?= $data['id_user'] ?>">
					<div class="card-body">
						<div class="form-group">
							<label for="nis">Ubah Password</label>
							<input required autocomplete name="ubah_pass" placeholder="ubah password" type="password" class="form-control">
						</div>

					</div>

					<!-- /.card-body -->
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" name="tombol_ubah" class="btn btn-primary">Ubah Data</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

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
						<h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form role="form" method="post" action="">
							<input type="hidden" value="Siswa" name="level"></input>
							<div class="card-body">
								<div class="form-group">
									<label for="username">Username</label>
									<input required name="username" type="text" class="form-control" id="username" placeholder="username">
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input required autocomplete name="password" type="password" class="form-control" id="password" placeholder="password">
								</div>
								<div class="form-group">
									<label for="nama">Nama</label>
									<input name="nama" required type="text" class="form-control" id="nama" placeholder="nama">
								</div>
								<div class="form-group">
									<label for="level">level</label>
									<input required name="level" readonly value="Admin" type="text" class="form-control" id="level" placeholder="level">
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
</body>
</html>

<script type="text/javascript">
			$('.hapus_user').on('click',function(e){
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

<?php 

if (isset($_POST['tombol_ubah'])) {
	$Password = md5(mysqli_real_escape_string($conn,$_POST['ubah_pass']));
	$id_ubah = mysqli_real_escape_string($conn,$_POST['id_ubah']);
	$sql = "UPDATE user SET password = '$Password' WHERE id_user = '$id_ubah'";
	$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));

	if ($query) {
		?>
			<script type="text/javascript">
				swal.fire({ 
					title: "BERHASIL",
					text: "Data Telah di ubah",
					icon: "success", buttons: [false, "OK"],
				}).then(function() { 
					window.location.href="<?= baseUrl('view/admin?page=user') ?>"; 
				});
			</script>
			<?php
	}
}

if (isset($_POST['tombol_tambah'])) {
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$password = md5(mysqli_real_escape_string($conn,$_POST['password']));
	$nama = mysqli_real_escape_string($conn,$_POST['nama']);
	$level = mysqli_real_escape_string($conn,$_POST['level']);

	$sql_tambah = "INSERT INTO user VALUES (
					'',NULL,NULL,'$username','$password','$nama','$level'
	)";

	$query_tambah = mysqli_query($conn,$sql_tambah) or die(mysqli_error($conn));

	if ($query_tambah) {
		?>
		<script type="text/javascript">
				swal.fire({ 
					title: "BERHASIL",
					text: "Data Telah ditambahkan",
					icon: "success", buttons: [false, "OK"],
				}).then(function() { 
					window.location.href="<?= baseUrl('view/admin?page=user') ?>"; 
				});
			</script>
			<?php
	}
}

 ?>