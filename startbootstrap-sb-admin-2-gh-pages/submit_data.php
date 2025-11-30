<?php
include ("classes/connect.php");

// Membuat instance dari class Database
$db = new Database();

// Validasi data POST
$tegangan = isset($_POST['tegangan']) ? $_POST['tegangan'] : null;
$arus = isset($_POST['arus']) ? $_POST['arus'] : null;
$daya = isset($_POST['daya']) ? $_POST['daya'] : null;
$energi = isset($_POST['energi']) ? $_POST['energi'] : null;
$suhu = isset($_POST['suhu']) ? $_POST['suhu'] : null;
$kelembapan = isset($_POST['kelembapan']) ? $_POST['kelembapan'] : null;
$used = isset($_POST['used']) ? $_POST['used'] : null;
$remaining = isset($_POST['remaining']) ? $_POST['remaining'] : null;

// Cek apakah semua data tersedia
if ($tegangan !== null && $arus !== null && $daya !== null && $energi !== null && $suhu !== null && $kelembapan !== null && $used !== null && $remaining !== null) {
    
    // Query untuk menyimpan data sensor
    $sql = "INSERT INTO sensor_data (tegangan, arus, daya, energi, suhu, kelembapan, used, remaining)
            VALUES ('$tegangan', '$arus', '$daya', '$energi', '$suhu', '$kelembapan', '$used', '$remaining')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: Data tidak lengkap.";
}

?>
