<!DOCTYPE html>
<html>
<head>
	<title>data siswa</title>
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
				<h3 class="card-title">Data Siswa</h3>
			</div>

<!-- /.card-header -->
<div class="card-body">
<div class="alert alert-danger" role="alert">
			<i>Menghapus siswa berarti menghapus user dan semua tagihan di table spp</i>
		</div>
<button data-toggle="modal" data-target="#modal-tambah" style="margin-bottom: 20px" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</button>

<table id="example1" class="table table-bordered table-striped">
<thead>
	<tr>
		<th>No.</th>
		<th>NIS</th>
		<th>Nama</th>
		<th>Tanggal Lahir</th>
		<th>Alamat</th>
		<th>Kelas</th>
		<th>aksi</th>
	</tr>
</thead>
<tbody>
	<?php
	$queryTampil = mysqli_query($conn,"SELECT * FROM siswa,kelas WHERE siswa.id_kelas = kelas.id_kelas ") or die(mysqli_error($conn));
	$no = 1;
	foreach ($queryTampil as $data) {
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $data['NIS']; ?></td>
			<td><?= $data['nama']; ?></td>
			<td><?= $data['tanggal_lahir']; ?></td>
			<td><?= $data['alamat']; ?></td>
			<td><?= $data['nama_kelas']; ?></td>
			<td class="text-center">
				<button type="button" data-toggle="modal" data-target="#modal-edit<?= $data['id_siswa']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</button>
				<form style="display: inline;" method="post">
					<input type="hidden" name="id_hapus" value="<?= $data['id_siswa']; ?>"></input>
					|
					<a href="siswa/hapus_siswa.php?id_siswa=<?=$data['id_siswa']?>" type="button" type="submit" name="hapus" class="hapus_siswa btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
				</form>
			</tr>
			<!-- Modal edit -->
			<div class="modal fade" id="modal-edit<?= $data['id_siswa']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
			<form role="form" method="post" action="">
				<input name="id_ubah" type="hidden" value="<?= $data['id_siswa'] ?>">
				<div class="card-body">
					<div class="form-group">
						<label for="nis">NIS</label>
						<input required name="nis" type="text" class="form-control" value="<?= $data['NIS'] ?>">
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input required name="nama" type="text" class="form-control" value="<?= $data['nama'] ?>">
					</div>
					<div class="form-group">
						<label for="tanggal_lahir">Tanggal Lahir</label>
						<input required name="tanggal_lahir" type="date" class="form-control" value="<?= $data['tanggal_lahir'] ?>">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input required name="alamat" type="text" class="form-control" value="<?= $data['alamat'] ?>">
					</div>
					<div class="form-group">
						<label>Kelas</label>
						<select name="kelas" class="form-control">
							<?php
							$kelas = mysqli_query($conn,"SELECT * FROM kelas") or die(mysqli_error($conn));
							foreach ($kelas as $nama_kelas) {
								$select = $nama_kelas['id_kelas'] == $data['kelas']?"selected":"";
								echo "<option value='$nama_kelas[id_kelas]'$select>$nama_kelas[nama_kelas]</option>";
								} 
								?>
							</select>
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
						<h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form role="form" method="post" action="">
							<input type="hidden" value="Siswa" name="level"></input>
							<div class="card-body">
								<div class="form-group">
									<label for="nis">NIS</label>
									<input required name="nis" type="text" class="form-control" id="nis" placeholder="NIS">
								</div>
								<div class="form-group">
									<label for="nama">Nama</label>
									<input required name="nama" type="text" class="form-control" id="nama" placeholder="Nama">
								</div>
								<div class="form-group">
									<label for="tanggal_lahir">Tanggal Lahir</label>
									<input required name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir" value="<?= date('Y-m-d') ?>">
								</div>
								<div class="form-group">
									<label for="alamat">Alamat</label>
									<input required name="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat">
								</div>

								<div class="form-group">
									<label>Kelas</label>
									<select name="kelas" class="form-control">
									<?php
									$kelas = mysqli_query($conn,"SELECT * FROM kelas") or die(mysqli_error($conn));
									foreach ($kelas as $nama_kelas) {
									 	?>
									 	<option value="<?= $nama_kelas['id_kelas'] ?>"><?= $nama_kelas['nama_kelas'] ?></option>
									 	<?php } ?>
									 </select>
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
			$('.hapus_siswa').on('click',function(e){
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
		$nis = mysqli_escape_string($conn,$_POST['nis']);
		$nama = mysqli_escape_string($conn,$_POST['nama']);
		$tanggal_lahir = mysqli_escape_string($conn,$_POST['tanggal_lahir']);
		$alamat = mysqli_escape_string($conn,$_POST['alamat']);
		$kelas = mysqli_escape_string($conn,$_POST['kelas']);
		$level = mysqli_escape_string($conn,$_POST['level']);
		$password = md5(mysqli_escape_string($conn,$_POST['tanggal_lahir']));

// mengirim data ke database
		$sql = "INSERT INTO siswa VALUES ('','$nis','$nama','$tanggal_lahir','$alamat','$kelas')";
		$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$id = mysqli_insert_id($conn);
		$sql_user = "INSERT INTO user VALUES ('','$id',NULL,'$nis','$password','$nama','$level')";
		$query_user = mysqli_query($conn,$sql_user);
		if ($query && $query_user) {
			?>
			<script type="text/javascript">
				swal.fire({ 
					title: "BERHASIL",
					text: "Data Telah ditambahkan",
					icon: "success", buttons: [false, "OK"],
				}).then(function() { 
					window.location.href="<?= baseUrl('view/admin?page=data_siswa') ?>"; 
				});
			</script>
			<?php
		}
	}

// ubah data
// jika tombol ubah di klik
	if (isset($_POST['tombol_ubah'])) {
		$id_ubah = mysqli_real_escape_string($conn,$_POST['id_ubah']);
		$nis = mysqli_real_escape_string($conn,$_POST['nis']);
		$nama = mysqli_real_escape_string($conn,$_POST['nama']);
		$tanggal_lahir = mysqli_real_escape_string($conn,$_POST['tanggal_lahir']);
		$alamat = mysqli_real_escape_string($conn,$_POST['alamat']);
		$kelas = mysqli_real_escape_string($conn,$_POST['kelas']);
		$password = md5(mysqli_real_escape_string($conn,$_POST['tanggal_lahir']));

	// update data di database
		$sql = "UPDATE siswa SET nis = '$nis',nama = '$nama',tanggal_lahir = '$tanggal_lahir',alamat = '$alamat',id_kelas = '$kelas' WHERE id_siswa = '$id_ubah'";
		$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$sql_user = "UPDATE user SET username = '$nis',nama = '$nama',password = '$password'  WHERE id_siswa = '$id_ubah'";
		$query_user = mysqli_query($conn,$sql_user);
		if ($query) {
			?>
			<script type="text/javascript">
				swal.fire({ 
					title: "BERHASIL",
					text: "Data Telah di ubah",
					icon: "success", buttons: [false, "OK"],
				}).then(function() { 
					window.location.href="<?= baseUrl('view/admin?page=data_siswa') ?>"; 
				});
			</script>
			<?php
		}
	}
	?>