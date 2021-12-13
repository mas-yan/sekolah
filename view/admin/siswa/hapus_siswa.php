<?php 

include '../../../include/koneksi.php';

$id_siswa = $_GET['id_siswa'];
$sql = "DELETE FROM siswa WHERE id_siswa = '$id_siswa' ";
$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if ($query) {
	header("location:../?page=data_siswa");
}

 ?>