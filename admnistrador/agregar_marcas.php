<?php
    include('connect.php');
    
    $marca = $_POST['marca'];
    
    $query = "INSERT INTO marcas (Id_marcas, Nombre_marcas) VALUES (NULL, '$marca')";

    $db -> autocommit(FALSE);
    $db -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
            
    if( !$con = $db -> query($query) ) 
    {
        echo "A ocurrido un error al registrar los datos";
        $db ->rollback();
    }
    else
    {
        $db -> commit();
        echo "Registro exitoso";
    }   
            
    $db -> close();
    header("location: productos.php");
?>