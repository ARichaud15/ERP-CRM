<?php
	include '../connect.php';
	session_start();
	date_default_timezone_set('America/Mexico_City');
	
	$ticket = $_SESSION['Ticket'];
	$pregunta_1 = $_POST['P1'];
	$pregunta_2 = $_POST['P2'];
	$pregunta_3 = $_POST['P3'];
	$pregunta_4 = $_POST['P4'];
	$pregunta_5 = $_POST['P5'];
	$fecha = date('Y-m-d');
	
	$query = "INSERT INTO encuestas (Id_encuesta, Id_ticket_encuesta, Pregunta1_encuesta, Pregunta2_encuesta, Pregunta3_encuesta,  	Pregunta4_encuesta, Pregunta5_encuesta, Fecha_encuesta) VALUES (NULL, '$ticket', '$pregunta_1', '$pregunta_2', '$pregunta_3', '$pregunta_4', '$pregunta_5', '$fecha')";

	$db -> autocommit(FALSE);
	$db -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
			
	if( !$con = $db -> query($query) ) 
	{
		$db ->rollback();

		include 'head.php';
					echo "<h2 align = 'center'>Lo sentimos a ocurrido un error.</h2>";
		    		echo "<meta http-equiv='Refresh' content='5;URL=index.php'>";
	    		echo "</div>";
	    	echo "</div>";
	    echo "</div>";
	}
	else
	{
		$db -> commit();
		
		include 'head.php';
					echo "<h2 align = 'center'>Gracias por contestar nuestra encuesta.</h2>";
		    		echo "<meta http-equiv='Refresh' content='5;URL=index.php'>";
	    		echo "</div>";
	    	echo "</div>";
	    echo "</div>";
	}	
			
	$db -> close();
	//header("location: clientes.php");
	unset($_SESSION['Ticket']);
?>