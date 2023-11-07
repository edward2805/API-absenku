<?php 
require 'connect_db.php';

$id_siswa = $_POST['id_siswa'];
$id_siswa = (int)$id_siswa;

$query      = "SELECT * FROM absen WHERE id_siswa='$id_siswa'";
$odj_query  = mysqli_query($koneksi, $query) or die("Erro in query $odj_query.".mysqli_error($koneksi));

$result = array();
while ($data  = mysqli_fetch_array($odj_query)) {
    array_push($result, array(
        "id_siswa" => $data['id_siswa'],
        "tgl_absen" => $data['tgl_absen'],
        "status" => $data['status']
    ));
}
echo json_encode(
    $result
);

header('Content-Type: application/json');



?>