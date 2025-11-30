<?php
include("classes/connect.php");

$database = new Database();

session_start();


if (isset($_SESSION['simalas_userid'])) {
    $userid = $_SESSION['simalas_userid'];

$sql = "SELECT Tegangan, Arus, Daya, Suhu, Kelembapan, Energi FROM data_sensor WHERE userid = '$userid' ORDER BY date DESC LIMIT 1";
$result = $database->read($sql); 

if ($result) {
    echo json_encode($result[0]); 
} else {
    echo json_encode([]);
}

}
?>
