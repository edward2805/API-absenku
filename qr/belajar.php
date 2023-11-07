<!DOCTYPE html>
<html>
<head>
    <title>Generate and Display QR Code</title>
</head>
<script>
        setTimeout(function() {
            location.href = "belajar.php";
        }, 6000); // 6000 milidetik = 1 menit
    </script>
    <style type="text/css">
        body{
            /*background: orange;*/
        }
 
        h2,h3{
            text-align: center;
        }
 
        .kotak{
            width: 500px;
            border: 1px dashed black;
            margin: 10px auto;
            padding: 20px;
            text-align: center;
        }
 
        .hasil{
            text-align: center;
        }
    </style>
<body>
    
    <div class="kotak">
        <h1>Generate and Display QR Code</h1>
        <form method="POST" action="">
            <button type="submit" name="generate">Generate QR Code</button>
        </form>
    </div>
    <div class="hasil">
    <?php
    
    require 'function.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['generate'])) {
        function generateRandomString($length = 30) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $randomString;
        }
    
        $randomString = generateRandomString(30);
    
        // Simpan random string ke dalam database
        $db = new mysqli("localhost","root", "", "absenku");
    
        if ($db->connect_error) {
            die("Koneksi database gagal: " . $db->connect_error);
        }
    
        $isi = $randomString;
    
        // Ganti "qr_code" dengan nama tabel yang sesuai
        $query = "INSERT INTO qr_code VALUES (NULL, '$isi')";
    
        if ($db->query($query) === TRUE) {
        } else {
            $db->error;
        }
    
        $db->close();
    
        // Generate QR Code and display it
        $penyimpanan = "temp/";
    
        if (!file_exists($penyimpanan)) {
            mkdir($penyimpanan);
        }
    
        include "phpqrcode/qrlib.php";
    
        QRcode::png($isi, $penyimpanan.'hasil_qrcode.png', QR_ECLEVEL_L, 10, 5);
        echo '<img src="'.$penyimpanan.'hasil_qrcode.png">';
        echo "<p>QR Code: $randomString</p>";
    }
    ?>
    </div>
</body>
</html>
