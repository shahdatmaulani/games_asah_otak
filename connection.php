<?php
$host	= "localhost";
$userdb	= "root";
$db	= "asah_otak";
$passdb = "";

$mysqli = new mysqli($host, $userdb, $passdb, $db);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($mysqli){
	$kode="1";
	$pesan="Sukses";
}else{
	$kode="0";
	$pesan="Gagal";
}

$response = array();
$response['kode']=$kode;
$response['pesan']=$pesan;
//echo json_encode($response);
?>