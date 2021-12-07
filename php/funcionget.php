<?php
$servername = "localhost";
$database = "cines";
$username = "root";
$password = "";
// Create connection
header ("Access-Control-Allow-Origin: *"); 
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="select p.nombre, c.nombre as nombreCine, c.direccion, f.fecha, f.duracion, f.horaInicio, pr.fechaInicio, pr.fechaFin, s.clave from funcion f
inner join pelicula p on f.clavePelicula = p.clave
inner join programacion pr on f.claveProgramacion = pr.clave
inner join sala s on f.claveSala = s.clave
inner join cine c on s.claveCine = c.clave";
$res=$conn->query($sql);
$arr=array();
while ($row=$res->fetch_assoc()) {
	$arr[]=$row;
}
$res->free();


mysqli_close($conn); // cerrar conexion
echo (json_encode ($arr)); // return
?>
