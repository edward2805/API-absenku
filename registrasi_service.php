<?php 
require 'connect_db.php';


$username       = $_POST['username'];
$password       = $_POST['password'];
$nama_siswa   = $_POST['nama_siswa'];

$query      = "INSERT INTO siswa VALUES('', '$username', '$password', '$nama_siswa')";
$odj_query  = mysqli_query($koneksi, $query);


if ($odj_query) {
    echo json_encode(
        array(
            'response' => true,
            'payload' => null
        )
    );
}else {
    echo json_encode(
        array(
            'response' => false,
            'payload' => null
        )
    );
}

header('Content-Type: application/json');



?>