<?php
header ("Access-Control-Allow-Origin: *");
$conn = new mysqli('localhost', 'root', '', 'cines');
if($conn->connect_error) {
  die('Could not connect to the database');
}
$response['error'] = false;
$clave= $_POST['clave'];
$fechaInicio= $_POST['fechaInicio'];
$fechaFin= $_POST['fechaFin'];
$claveCine= $_POST['claveCine'];

$insertQuery = $conn->query("INSERT INTO programacion
 VALUES ('$clave', '$fechaInicio', '$fechaFin', '$claveCine')");
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
