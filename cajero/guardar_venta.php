 <?php
 	header("Content-Type: text/html;charset=utf-8");
 	
 	session_start();
	include('connect.php');

	$orden = "Por favor, dedique un momento a completar esta pequeña encuesta, la informaci&oacute;n que nos proporcione será utilizada para mejorar nuestro servicio.\r\n";

	$orden .= "Sus respuestas serán tratadas de forma confidencial y no serán utilizadas para ningún propósito distinto a la investigación llevada a cabo por Papeleria ALVAM.\r\n";

	$orden .= "Esta encuesta dura aproximadamente 5 minutos.\r\n";

	$orden .= "http://localhost/ERP/nuevo/admnistrador/ventas.php?id=&invoice=RS-0228\r\n"; 
	
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=utf-8\r\n"; 
	$headers .= "From:Papeleria ALVAM \r\n";
	
	$invoice = $_POST['invoice'];
	$cajero = $_POST['cajero'];
	$id_cliente = $_POST['id'];
	$correo_cliente = $_POST['correo'];
	$total_venta_sdescuento = $_POST['total_venta'];
	$correo = $_SESSION['SESION_CORREO_USUARIO'];
	

	if($id_cliente == 'S/N')
	{
		$cliente = $_POST['cname11'];
		$total_venta_cdescuento = $_POST['total11'];
		$dinero_recibido = $_POST['cash2'];
		$descuento = $_POST['descuento2'];
		$cambio = $dinero_recibido - $total_venta_cdescuento;
	}
	else
	{
		$cliente = $_POST['cname1'];
		$total_venta_cdescuento = $_POST['total1'];
		$dinero_recibido = $_POST['cash'];
		$descuento = $_POST['descuento1'];
		$cambio = $dinero_recibido - $total_venta_cdescuento;
		mail($correo_cliente,"Encuesta de satisfaccion",$orden,$headers);
	}
	
	$fecha = date('Y-m-d');

	$sql = "INSERT INTO ventas (Id_ventas, Cajero_ventas, Cliente_ventas, Id_cliente_ventas, Total_ventas_sdescuento, Total_ventas_cdescuento, Descuento_ventas, Dinero_recibido_ventas, Cambio_ventas, Fecha_ventas, Correo_cajero) VALUES ( '$invoice', '$cajero', '$cliente', '$id_cliente', '$total_venta_sdescuento', '$total_venta_cdescuento', '$descuento', '$dinero_recibido', '$cambio', '$fecha', '$correo')";
		
	$db -> autocommit(FALSE);
	$db -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
				
	if( !$con = $db -> query($sql) ) 
	{
		echo "A ocurrido un error al registrar los datos";
		$db ->rollback();
	}
	else
	{
		$db -> commit();
		echo "Registro exitoso";
	}
	
	if($cliente != 'Cliente')
	{
		$sql = "UPDATE clientes SET Numero_compras_clientes = Numero_compras_clientes + 1 WHERE Numero_clientes = '$id_cliente'";

		$db -> autocommit(FALSE);
		$db -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
						
		if( !$con = $db -> query($sql) ) 
		{
			echo "A ocurrido un error al registrar los datos1";
			$db ->rollback();
		}
		else
		{
			$db -> commit();
			echo "Registro exitoso1";
		}
	}
	$db -> close();
		
	header("location: ticket.php?invoice=$invoice");
	exit();
?>
