<?php
header ("Access-Control-Allow-Origin: *");
$conn = new mysqli('localhost', 'root', '', 'cines');
if($conn->connect_error) {
  die('Could not connect to the database');
}
$response['error'] = false;
$numero= $_POST['numero'];
$asiento= $_POST['asiento'];
$claveFuncion= $_POST['claveFuncion'];
$claveTipoEntrada= $_POST['claveTipoEntrada'];

$insertQuery = $conn->query("INSERT INTO entrada
 VALUES ('$numero', '$asiento', '$claveFuncion', '$claveTipoEntrada')");
if ($insertQuery) {
  $response['message'] = 'New record inserted sucessfully';
} else {
  $response['error'] = true;
  $response['message'] = $conn->error;
}
$conn->close();
header('content-type: application/json');
echo json_encode($response);
die();
?>
