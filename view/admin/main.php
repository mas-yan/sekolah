<?php 
$page = @$_GET['page'];

if (isset($_GET['lihat_siswa'])) {
	include 'spp/lihat_siswa.php';
}

if ($page == 'data_siswa') {
	include 'siswa/data_siswa.php';
}elseif ($page == 'data_petugas') {
	include 'petugas/data_petugas.php';
}elseif ($page == 'data_kelas') {
	include 'kelas/data_kelas.php';
}elseif ($page == 'spp') {
	include 'spp/spp.php';
}elseif ($page == 'lihat_siswa') {
	include 'spp/lihat_siswa.php';
}elseif ($page == 'user') {
	include 'user/user.php';
}

 ?>