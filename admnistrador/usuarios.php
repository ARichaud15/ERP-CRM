<?php 
    require_once('auth.php');
    include('connect.php');
    $result = $db->query("SELECT Id_usuarios FROM usuarios");
    $rowcount = $result-> num_rows;

    date_default_timezone_set('America/Mexico_City');
 ?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Usuarios - ERP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link href="../css/style.css" rel='stylesheet' type='text/css' />
        <link href="../css/font-awesome.css" rel="stylesheet"> 
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />
        
        <script src="../js/jeffartagame.js" type="text/javascript" charset="utf-8"></script>
        <script src="../js/jquery.js" type="text/javascript"></script>
        <script src="../js/application.js" type="text/javascript" charset="utf-8"></script>
        
        <link href="../src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
        <script src="../src/facebox.js" type="text/javascript"></script>
        
        <script src="../js/jquery-1.10.2.min.js"></script>
        <script src="//widget.time.is/es.js"></script>
    </head> 

    <?php
        $RS=$_SESSION['RS'];

        if($RS == ' ')
        {
            function createRandomPassword() 
            {
                $chars = "003232303232023232023456789";
                srand((double)microtime()*1000000);
                $i = 0;
                $pass = '';
                        
                while ($i <= 7) 
                {
                    $num = rand() % 33;
                    $tmp = substr($chars, $num, 1);
                    $pass = $pass . $tmp;
                    $i++;
                }
                return $pass;
            }
            $finalcode='RS-'.createRandomPassword();
            $_SESSION['RS'] = $finalcode;
        }
        else
            $finalcode = $RS;
    ?>
    <a href="https://time.is/Mexico" id="time_is_link" rel="nofollow"></a>
    <body>
        <div class="page-container">
            <!--/content-inner-->
            <div class="left-content">
                <div class="inner-content">
                    <!-- header-starts -->
                    <div class="header-section">
                        <!--menu-right-->
                        <div class="top_menu">
                            <!--/profile_details-->
                            <div class="profile_details_left">
                                <ul class="nofitications-dropdown">
                                    <li class="dropdown note">
                                        <span id="Mexico_z159" style="font-size:20px"></span>
                                    </li>                                           
                                    <div class="clearfix"></div>    
                                </ul>
                            </div>
                            <div class="clearfix"></div>    
                            <!--//profile_details-->
                        </div>
                        <!--//menu-right-->
                        <div class="clearfix"></div>
                    </div>
                    <!-- //header-ends -->
                    <div class="outter-wp">
                        <div class="sub-heard-part">
                            <ol class="breadcrumb m-b-0">
                                <li><a href="panel.php">Panel de administracion</a></li>
                                <li class="active">Empleados</li>
                            </ol>
                        </div>
                       
                        <div class="graph-visual tables-main">
                            <h3 class="inner-tittle two" style="text-align: center;"> <i class="fa fa-briefcase"></i> Empleados </h3>
                            <h4 class="inner-tittle two" style="text-align: center;"> Total de empleados: <?php echo $rowcount;?> </h4>
                            
                            <div class="graph">
                                <a  href="panel.php">
                                    <button class="btn blue" style="float: left;"><i class="fa fa-arrow-left"></i> Volver</button>
                                </a>

                                <a>
                                    <input type="text" style="padding:11px; float:center; width:683px; height:49px; margin: 9px" name="filter" value="" id="filter" placeholder="Buscar usuario..." autocomplete="off" />

                                    <button style="float: right;" class="btn blue" data-toggle="modal" data-target="#Modal_agregar"><i class="fa fa-plus"></i> Agregar usuario</button>
                                </a>

                                <div class="tables">
                                    <table class="table table-hover table-bordered" id="resultTable" data-responsive="table">
                                        <thead>
                                            <tr>
                                                <th> Nombre </th>
                                                <th> Cargo </th>
                                                <th> Telefono </th>
                                                <th> Correo </th>
                                                <th> Accion </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $consulta = $db -> query( "SELECT * FROM usuarios ORDER BY Cargo_usuarios ASC" );
                                                $nfilas = $consulta -> num_rows;
                                    
                                                for($F=0; $F < $nfilas; $F++)
                                                {
                                                    $fila = $consulta -> fetch_row();
                                                    
                                                    echo '<tr>';
                                            ?>
                                                    <td><?php echo $fila[1]; ?></td>
                                                    <td><?php echo $fila[2]; ?></td>
                                                    <td><?php echo $fila[3]; ?></td>
                                                    <td><?php echo $fila[4]; ?></td>
                                                            
                                                    <td>
                                                        <a rel="facebox" title="Click para editar al usuario" href="editar_usuarios.php?id=<?php echo $fila[0]; ?>"><button class="btn btn-warning"><i class="fa fa-edit"></i></button> 
                                                        </a>
                                                                
                                                        <a href="#" id="<?php echo $fila[0]; ?>" class="delbutton" title="Click para borrar al usuario"><button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                                        </a>
                                                    </td>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="clearfix"></div>
                                </div>
                            </div>    
                        </div>

                        <div class="modal fade" id="Modal_agregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title">Agregar usuario</h2>
                                    </div>
                                    <form action="agregar_usuarios.php" method="post">

                                        <div class="modal-body">
                                            <div class="col-md-12 form-group1">
                                                <div class="graph">
                                                    <span id="txtHint"></span>
                                                    <div class="tables">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <span>Nombre</span>
                                                                        <input type="text" name="nombre" autocomplete="off" Required/>
                                                                    </td>
                                                                    <td>
                                                                        <span>Telefono</span>
                                                                        <input type="text" name="telefono" autocomplete="off" maxlength="10" pattern=".{10,10}" Required/>
                                                                    </td>
                                                                    <td>
                                                                        <span>Puesto</span>
                                                                        <select name="puesto" class="form-control1">
                                                                            <option>Administrador</option>
                                                                            <option>Cajero</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                   <td>
                                                                        <span>Correo</span>
                                                                        <input type="email" name="correo" autocomplete="off" onkeyup="showHint(this.value)" Required/>
                                                                    </td>
                                                                    <td>
                                                                        <span>Contraseña</span>
                                                                        <input type="text" name="password" autocomplete="off" Required/>
                                                                    </td>
                                                                </tr>

                                                                
                                                            </tbody>
                                                        </table>

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer" id="txtHint">
                                            <button type="submit" class="btn btn-primary" id="boton" style="display:none;">Agregar usuario</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                    <footer>
                        <p>© 2018 ERP Papeleria. Derechos Reservados</p>
                    </footer>
                </div>
            </div>
            
            <!--/sidebar-menu-->
            <div class="sidebar-menu">
                <header class="logo">
                    <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
                </header>
            
                <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
        <!--/down-->
                    <div class="down">  
                        <a><span class=" name-caret">
                            <?php echo $_SESSION['SESION_NOMBRE_USUARIO'];?>
                        </span></a>
                            
                        <p><?php echo $_SESSION['SESION_CARGO_USUARIO'];?></p>
                        <ul>
                            <li>
                                <a class="tooltips" href="cerrar_sesion.php"><span>Cerrar sesion</span><i class="glyphicon glyphicon-log-out"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!--//down-->

                    <div class="menu">
                        <ul id="menu" >
                            <li>
                                <a href="panel.php">
                                    <i class="fa fa-tachometer"></i> 
                                    <span> Panel de administracion </span> 
                                </a>
                            </li>
                            
                            <li id="menu-academico" >
                                <a href="ventas.php?id=cash&invoice=<?php echo $finalcode ?>">
                                    <i class="fa fa-shopping-cart"></i> 
                                    <span> Ventas </span> 
                                 </a>
                            </li>
                            <li id="menu-academico" >
                                <a href="productos.php">
                                    <i class="fa fa-list-alt"></i> 
                                    <span> Productos </span> 
                                 </a>
                            </li>
                            <li id="menu-academico" >
                                <a href="proveedores.php">
                                    <i class="fa fa-truck"></i> 
                                    <span> Proveedores </span> 
                                 </a>
                            </li>
                            <li id="menu-academico" >
                                <a href="clientes.php">
                                    <i class="fa fa-address-card-o"></i> 
                                    <span> Clientes </span> 
                                 </a>
                            </li>
                            <li id="menu-academico" >
                                <a href="usuarios.php">
                                    <i class="fa fa-briefcase"></i> 
                                    <span> Empleados </span> 
                                 </a>
                            </li>
                            <li id="menu-academico" >
                                <a href="encuestas.php">
                                    <i class="fa fa-pie-chart"></i> 
                                    <span> Encuestas </span> 
                                 </a>
                            </li>
                            <li id="menu-academico" >
                                <a href="reporte_ventas.php?d1=0&d2=0">
                                    <i class="glyphicon glyphicon-stats"></i> 
                                    <span> Reporte de ventas </span> 
                                 </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>        
            </div>
            
            <script>
                var toggle = true;
                $(".sidebar-icon").click(function() 
                {                
                    if (toggle)
                    {
                        $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                        $("#menu span").css({"position":"absolute"});
                    }
                    else
                    {
                        $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                        setTimeout(function() 
                        {
                            $("#menu span").css({"position":"relative"});
                        }, 400);
                    }
                    toggle = !toggle;
                });
            </script>
            
            
        <script type="text/javascript">
            $(function() 
            {
                $(".delbutton").click(function()
                {
                    //Save the link in a variable called element
                    var element = $(this);

                    //Find the id of the link that was clicked
                    var del_id = element.attr("id");

                    //Built a url to send
                    var info = 'id=' + del_id;
                    if(confirm("¿Estás seguro de eliminar al usuario?"))
                    {
                        $.ajax({
                           type: "GET",
                           url: "eliminar_usuario.php",
                           data: info,
                           success: function()
                           {}
                        });
                        
                        $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
                        .animate({ opacity: "hide" }, "slow");
                    }
                    return false;
                });
            });
        </script>
        <script>
            function showHint(str)
            {
                var xhttp;
                if (str.length == 0)
                {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                }
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function()
                {
                    if (this.readyState == 4 && this.status == 200)
                        document.getElementById("txtHint").innerHTML = this.responseText;

                    if(document.getElementById('band_correo').value == "true")
                        document.getElementById('boton').style.display = 'none';
                    else
                        document.getElementById('boton').style.display = '';
                };
                xhttp.open("GET", "ajax_correos_usuarios.php? dato="+str, true);
                xhttp.send();
            }
        </script>
        <script>
            time_is_widget.init({Mexico_z159:{template:"<center>TIME</center>DATE", time_format:"12hours:minutes:seconds AMPM", date_format:"dayname, dnum monthname year"}});
        </script>
        <script src="../js/jquery.nicescroll.js"></script>
        <script src="../js/scripts.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>