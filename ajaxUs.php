<?php

    $q = $_REQUEST["dato"];

    $band = False;

    include('connect.php');

  	$result1 = $db -> query( "SELECT * FROM clientes where Numero_membresia_clientes like '".$q."%'");
    
    $nfilas1 = $result1 -> num_rows;
    
    if( ( ($nfilas1) == 1 ))
    {
        echo" <form action = '' method = 'post'> <table border = '0' > ";
        echo " <tr> <td colspan = '2' align = 'center'> <input types = 'text' name = 'Up1' size = '30' maxlength = '20' value = 4 style = 'visibility:hidden'/></td> </tr> </tr> ";

        $band = True;
    }
    
    if( ( ($nfilas1) > 0 )  )
    {
    
        if( ($band == True) || ($nfilas1 > 0) )
        {
            for($F = 0; $F < $nfilas1; $F++)
            {
                echo" <form action = '' method = 'post'> <table border = '0' > ";
                $fila = $result1 -> fetch_row();

                $nickname = $fila[0];
                $nombre = $fila[1];
                $app = $fila[2];
                $apm = $fila[3];
                $telefono = $fila[4];
                $genero = $fila[5];
                $correo = $fila[6];
                $password = $fila[7];
                
                echo "
                    <tr>
                        <td>Nickname</td>
                        <td align = 'center'><input types = 'text' name = 'txtNick' size = '30' maxlength = '30' value = $nickname readonly = 'readonly' /></td>
                    </tr>

                    <tr>
                        <td>Nombre</td>
                        <td align = 'center'><input types = 'text' name = 'txtNombre' size = '30' maxlength = '30' value = $nombre /></td>
                    </tr>

                    <tr>
                        <td>Apellido paterno</td>
                        <td align = 'center'><input types = 'text' name = 'txtAPP' size = '30' maxlength = '30' value = $app /></td>
                    </tr>

                    <tr>
                        <td>Apellido materno</td>
                        <td align = 'center'><input types = 'text' name = 'txtAPM' size = '30' maxlength = '30' value = $apm /></td>
                    </tr>

                    <tr>
                        <td>Telefono</td>
                        <td align = 'center'><input types = 'text' name = 'txtTelefono' size = '30' maxlength = '20' value = $telefono /></td>
                    </tr>

                    <tr>
                        <td>Correo</td>
                        <td align = 'left'><input types = 'email' name = 'txtCorreo' size = '30' maxlength = '30' value = $correo /></td>
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td align = 'center'><input types = 'text' name = 'txtContraseña' size = '30' maxlength = '20' value = $password /></td>
                    </tr> </tr> ";

                    if($genero == 'Hombre')
                    {
                        echo"
                        <tr>
                            <td> Genero </td>
                            <td align = 'left'>
                            <input type = radio name = Genero value = Hombre checked> Hombre <br>
                            <input type = radio name = Genero value = Mujer> Mujer <br>
                            </td>
                        </tr> ";
                    }
                    else
                    {
                        echo"
                        <tr>
                            <td> Genero </td>
                            <td align = 'left'>
                            <input type = radio name = Genero value = Hombre> Hombre <br>
                            <input type = radio name = Genero value = Mujer checked> Mujer <br>
                            </td>
                        </tr> ";  
                    }

                    if( ($nfilas1) == 1 )
                    {
                        echo "
                        <tr>
                            <td colspan = '2' align = 'center'><input type = 'submit' name = 'submit_actualizar' value = 'Actualizar'  /></td>
                        </tr> 
                        
                        <tr> 
                            <td colspan = '2' align = 'center'> <input types = 'text' name = 'Up' size = '30' maxlength = '20' value = 1 style = 'visibility:hidden'/></td>
                        </tr> </tr> ";
                    }

                echo "</table> \n";
            }
        }

    }
    else
        echo "No hay coicidencias";
?>
