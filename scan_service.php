<?php 
require 'connect_db.php';

$id_siswa       = $_POST['id_siswa'];
$status         = $_POST['status'];

$query      = "SELECT * FROM absen WHERE id_siswa='$id_siswa' AND tgl_absen =NOW()";
$odj_query  = mysqli_query($koneksi, $query);
$data       = mysqli_fetch_array($odj_query);

if ($data) {
    echo json_encode(
        array(
            'response' => false,
            'payload' => "sudah absen"
        )
    );
}else {
    $query      = "INSERT INTO absen VALUES('', '$id_siswa', NOW() ,'$status')";
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
}




header('Content-Type: application/json');



?>