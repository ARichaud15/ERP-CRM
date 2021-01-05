<?php
	include '../connect.php';

	session_start();
	
	$ticket = $_POST['ticket'];
	$array_mensaje = array();
	$array_mensaje[] = 'Numero de ticket invalido';
	$array_mensaje1[] = 'El numero de ticket ya respondio la encuesta';
	
	$consulta = $db -> query( "SELECT * FROM ventas WHERE Id_ventas='$ticket'" );
	$nfilas = $consulta -> num_rows;
	
	if($nfilas == 1)
	{
		$consulta1 = $db -> query( "SELECT * FROM encuestas WHERE Id_ticket_encuesta='$ticket'" );
		$nfilas1 = $consulta1 -> num_rows;

		if($nfilas1 == 1)
		{
			$_SESSION['Mensaje_error2'] = $array_mensaje1;
			$_SESSION['Ticket'] = '';
			session_write_close();
			header("location: index.php");
			exit();
		}
		else
		{
			$fila = $consulta -> fetch_row();
			$_SESSION['Ticket'] = $ticket;
			session_write_close();
			header("location: encuesta.php");
			exit();
		}
	}
	else
	{
		$_SESSION['Mensaje_error2'] = $array_mensaje;
		$_SESSION['Ticket'] = '';
		session_write_close();
		header("location: index.php");
		exit();
	}
?>