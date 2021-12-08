<?php
header ("Access-Control-Allow-Origin: *");
$conn = new mysqli('localhost', 'root', '', 'cines');
if($conn->connect_error) {
  die('Could not connect to the database');
}
$response['error'] = false;
$clavePersonaje= $_POST['clavePersonaje'];
$clavePelicula= $_POST['clavePelicula'];

$insertQuery = $conn->query("UPDATE reparto
 SET clavePersonaje='$clavePersonaje', clavePelicula='$clavePelicula' WHERE clavePersonaje='$clavePersonaje'");
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
