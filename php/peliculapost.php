<?php
header ("Access-Control-Allow-Origin: *");
$conn = new mysqli('localhost', 'root', '', 'cines');
if($conn->connect_error) {
  die('Could not connect to the database');
}
$response['error'] = false;
$clave= $_POST['clave'];
$nombre= $_POST['nombre'];
$fechaEstreno= $_POST['fechaEstreno'];
$claveProductora= $_POST['claveProductora'];
$claveDirector= $_POST['claveDirector'];
$clavePais= $_POST['clavePais'];
$claveGenero= $_POST['claveGenero'];

$insertQuery = $conn->query("INSERT INTO pelicula
 VALUES ('$clave', '$nombre', '$fechaEstreno', '$claveProductora','$claveDirector','$clavePais','$claveGenero')");
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
