<?php
    include('connect.php');
    
    $monto = 0;
    $descuento= 0;
    $total_venta = 0;
    $total_venta_aux = 0;

    $datos = $_REQUEST["dato"];
    $invoice = $_REQUEST["invoice"];

    $result1 = $db -> query( "SELECT * FROM clientes where Numero_clientes like '".$datos."%'");
    $nfilas1 = $result1 -> num_rows;

    $consulta = $db->query("SELECT * FROM ticket WHERE Numero_venta_ticket = '$invoice'");
    $nfilas = $consulta -> num_rows;
                                            
    for($F=0; $F < $nfilas; $F++)
    {
        $fila = $consulta -> fetch_row();
        $total_venta_aux += $fila[8];
    }
    
    if( $nfilas1 > 0 )  
    {
?>      <thead>
            <tr>
                <th>Nombre</th>
                <th>Numero de cliente</th>
                <th>Correo</th>
                <th></th>
            </tr>
        </thead>
<?php
        for($F=0; $F<$nfilas1; $F++)
        {
            $fila = $result1 -> fetch_row();
            
            if($fila[5] <= 10)
                $descuento = 5;
            else if( ($fila[5] > 10) && ($fila[5] <= 20) )
                $descuento= 10;
            else if( ($fila[5] > 20) && ($fila[5] <= 30) )
                $descuento= 20;
            else if( $fila[5] > 30 )
                $descuento= 30;

            $monto = ($total_venta_aux * $descuento) / 100;
            $total_venta = $total_venta_aux - $monto;
?>
            <tr>
                <td><?php echo $fila[1]; ?></td>
                <td><?php echo $fila[0]; ?></td>
                <td><?php echo $fila[2]; ?></td>
                <td>
                    <a class="btn blue open-Modal" data-toggle="modal" data-target="#Modal_ticket" data-dismiss="modal" 
                    data-id="<?php echo $fila[0]; ?>" data-nombre="<?php echo $fila[1]; ?>" data-correo="<?php echo $fila[2]; ?>" data-descuento="<?php echo $descuento ?>" data-total_descuento="<?php echo $monto ?>" data-total="<?php echo $total_venta ?>">Seleccionar</a>
                </td>
            </tr>
<?php
        }
    }
    else
        echo "<td>No se encontro algun cliente registrado con ese correo o numero de cliente</td>";
?>


