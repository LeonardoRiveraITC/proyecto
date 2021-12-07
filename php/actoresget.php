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

$sql="select a.nombre, pe.nombre as nombrePel, r.descripcion from actor a
inner join personaje pe on a.clave = pe.claveActor
inner join rol r on pe.claveRol = r.clave
inner join reparto re on re.clavePersonaje = pe.clave
inner join pelicula p on re.clavePelicula = p.clave
where p.nombre = 'Spiderman: No Way Home'";
$res=$conn->query($sql);
$arr=array();
while ($row=$res->fetch_assoc()) {
	$arr[]=$row;
}
$res->free();


mysqli_close($conn); // cerrar conexion
echo (json_encode ($arr)); // return
?>
