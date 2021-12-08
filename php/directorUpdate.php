<?php
header ("Access-Control-Allow-Origin: *");
$conn = new mysqli('localhost', 'root', '', 'cines');
if($conn->connect_error) {
  die('Could not connect to the database');
}
$response['error'] = false;
$clave= $_POST['clave'];
$nombre= $_POST['nombre'];
$edad= $_POST['edad'];
$sexo= $_POST['sexo'];

$insertQuery = $conn->query("UPDATE director
 SET clave='$clave', nombre='$nombre', edad='$edad', sexo='$sexo' WHERE clave='$clave'");
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
