<?php
header ("Access-Control-Allow-Origin: *");
$conn = new mysqli('localhost', 'root', '', 'cines');
if($conn->connect_error) {
  die('Could not connect to the database');
}
$response['error'] = false;
$clave= $_POST['clave'];
$primeraFuncion= $_POST['primeraFuncion'];
$ultimaFuncion= $_POST['ultimaFuncion'];
$duracionPublicidad= $_POST['duracionPublicidad'];

$insertQuery = $conn->query("INSERT INTO horario
 VALUES ('$clave', '$primeraFuncion', '$ultimaFuncion', '$duracionPublicidad')");
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
