<?php

	$db_host = '127.0.0.1';
	$db_database = 'erp'; 
	$db_username = 'root';
	$db_password = '';
	
	@ $db = new mysqli ( $db_host, $db_username, $db_password, $db_database);

	if( mysqli_connect_errno() )
	{
		echo '¡error fatal! ';
		
		if( mysqli_connect_errno() == 1049 )
			echo "<br> 1049 - base de datos no encontrada";
		else 
			if(mysqli_connect_errno() == 1045)
				echo "<br> 1045 - acceso denegado";
			else
				if(mysqli_connect_errno() == 2002)
					echo "<br> 2002 - Se produjo un error durante el intento de conexion, no respondio adecuadamente tras un periodo de tiempo, o bien se produjo un error en la conexion establecida ya que el host conectado no ha podido responder";
		exit;
	}
?>