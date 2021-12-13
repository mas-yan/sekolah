<?php 

$conn = mysqli_connect("localhost","root","","sekolah") or die(mysqli_connect_error());


function baseUrl($url = null){
	$baseUrl = "http://localhost/sekolah";

	if ($url != null) {
		return $baseUrl."/".$url;
	}
	else{
		return $baseUrl;
	}
}

 ?>