<?php 

include '../../../include/koneksi.php';

$id_user = $_GET['id_user'];
$sql = "DELETE FROM user WHERE id_user = '$id_user' ";
$query = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if ($query) {
	header("location:../?page=user");
}

 ?>