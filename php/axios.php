<?php
    	 header ("Access-Control-Allow-Origin: *"); // Esto debe estar escrito, de lo contrario se informará un error
    	 $mysqli = new mysqli ('localhost', 'root', '', 'usuarios'); // Complete de acuerdo con su propia base de datos
     
    	$sql="select * from users";
    	$res=$mysqli->query($sql);
     
    	$arr=array();
    	while ($row=$res->fetch_assoc()) {
    		$arr[]=$row;
    	}
    	$res->free();
    	 // Cerrar la conexión
    	$mysqli->close();
    	
    	 echo (json_encode ($ arr)); // Aquí usa echo en lugar de return
     
    ?>