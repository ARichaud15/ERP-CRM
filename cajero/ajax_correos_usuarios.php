<?php
    include('connect.php');
    
    $datos = $_REQUEST["dato"];
    $band = false;

    $result = $db -> query( "SELECT * FROM usuarios where Correo_usuarios like '".$datos."%'");
    $nfilas = $result -> num_rows;

    for($F=0; $F<$nfilas; $F++)
    {
        $fila = $result -> fetch_row();

        if($fila[4] == $datos)
            $band = true;
        else
            $band = false;  
    }

    if($band == false)
        echo '<input type="hidden" id="band_correo" value="false"/>';
    else
    {
        echo '<input type="hidden" id="band_correo" value="true"/>';
        echo "<span style='color: red;'>Correo ya registrado</span>";
    }
?>