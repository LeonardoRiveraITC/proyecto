<?php
header ("Access-Control-Allow-Origin: *");
$conn = new mysqli('localhost', 'root', '', 'cines');
if($conn->connect_error) {
  die('Could not connect to the database');
}
$response['error'] = false;
$clave= $_POST['clave'];
$nombre= $_POST['nombre'];
$claveActor= $_POST['claveActor'];
$claveRol= $_POST['claveRol'];

$insertQuery = $conn->query("INSERT INTO personaje
 VALUES ('$clave', '$nombre', '$claveActor', '$claveRol')");
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
