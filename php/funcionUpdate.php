<?php 
header ("Access-Control-Allow-Origin: *"); 
$conn = new mysqli('localhost', 'root', '', 'cines');
if($conn->connect_error) {
  die('Could not connect to the database');
}
$response['error'] = false;
$clave= $_POST['clave'];
$fecha= $_POST['fecha'];
$duracion= $_POST['duracion'];
$horaInicio= $_POST['horaInicio'];
$clavePelicula= $_POST['clavePelicula'];
$claveProgramacion= $_POST['claveProgramacion'];
$claveSala= $_POST['claveSala'];

$insertQuery = $conn->query("UPDATE funcion
 SET clave='$clave', fecha='$fecha', duracion='$duracion', horaInicio='$horaInicio', clavePelicula='$clavePelicula', 
 claveProgramacion='$claveProgramacion', claveSala='$claveSala' WHERE clave='$clave'");
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