<?php 

include '../../../include/koneksi.php';

$id_petugas = $_GET['id_petugas'];
$sql = "DELETE FROM petugas WHERE id_petugas = '$id_petugas' ";
$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if ($query) {
	header("location:../?page=data_petugas");
}

 ?>