<?php 
require 'connect_db.php';

$username   = $_POST['username'];
$password   = $_POST['password'];

$query      = "SELECT * FROM siswa WHERE username='$username' AND password='$password'";
$odj_query  = mysqli_query($koneksi, $query);
$data       = mysqli_fetch_array($odj_query);


if ($data) {
    echo json_encode(
        array(
            'response' => true,
            'payload' => array(
                "id_siswa" => $data["id_siswa"],
                "username" => $data["username"],
                "nama_siswa" => $data["nama_siswa"]
            ) 
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