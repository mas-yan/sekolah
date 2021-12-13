<?php 

include '../../../include/koneksi.php';

$id_kelas = $_GET['id_kelas'];
$sql = "DELETE FROM kelas WHERE id_kelas = '$id_kelas' ";
$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if ($query) {
	header("location:../?page=data_kelas");
}

 ?>