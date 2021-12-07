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

$sql="select p.nombre, p.fechaEstreno, pr.nombre as nombreProd, 
d.nombre as nombreDir, pa.nombre as nombrePais, g.descripcion from pelicula p
inner join productora pr on p.claveProductora = pr.clave
inner join director d on p.claveDirector = d.clave
inner join pais pa on p.clavePais = pa.clave
inner join genero g on p.claveGenero = g.clave";
$res=$conn->query($sql);
$arr=array();
while ($row=$res->fetch_assoc()) {
	$arr[]=$row;
}
$res->free();


mysqli_close($conn); // cerrar conexion
echo (json_encode ($arr)); // return
?>
