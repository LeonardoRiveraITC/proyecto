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

$sql="select e.asiento, t.descripcion, t.precio, f.fecha, f.horaInicio, 
p.nombre, s.clave, c.nombre as nombreCine from entrada e
inner join tipoEntrada t on e.claveTipoEntrada = t.clave
inner join funcion f on e.claveFuncion = f.clave
inner join pelicula p on f.clavePelicula = p.clave
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
