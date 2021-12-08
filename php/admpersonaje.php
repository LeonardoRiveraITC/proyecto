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

$sql="select * from personaje";
$res=$conn->query($sql);
$arr=array();
while ($row=$res->fetch_assoc()) {
	$arr[]=$row;
}
$res->free();


mysqli_close($conn); // cerrar conexion
echo (json_encode ($arr)); // return
?>
