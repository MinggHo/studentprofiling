<?php
require_once 'connection.php';
global $conn;

$data = $_POST;

$password = $data['password'];
$notel = $data['notel'];
$emel = $data['emel'];
$bangsa = $data['bangsa'];
$agama = $data['agama'];
$kad_matrik = $data['kad_matrik'];

$sql = "UPDATE maklumat_pengguna
SET katalaluan = '$password', notel = '$notel', emel = '$emel', bangsa = '$bangsa', agama = '$agama'
WHERE kad_matrik = '$kad_matrik'";

// echo $sql;
$result = $conn->query($sql);

// echo '<pre>' . var_export($data, true) . '</pre>';

?>
