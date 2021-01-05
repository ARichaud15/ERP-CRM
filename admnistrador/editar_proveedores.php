<?php 
    require_once('auth.php');
    include('connect.php');
    $id=$_GET['id'];
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Editar proveedor - ERP</title>
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
        require_once('auth.php');

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
                                <li>Proveedores</li>
                                <li class="active">Editar proveedores</li>
                            </ol>
                        </div>
                       
                        <div class="graph-visual tables-main">
                            <h3 class="inner-tittle two" style="text-align: center;"> <i class="fa fa-edit"></i> Editar proveedor </h3>
                            
                            <div class="graph">
                                <a  href="proveedores.php">
                                    <button class="btn blue" style="float: left;"><i class="fa fa-arrow-left"></i> Volver</button>
                                </a>
                                    <div class="set-1">
                                        <div class="graph-2 general">
                                            <div class="grid-1">
                                                <div class="form-body">
                                                    <?php 
                                                        $consulta = $db -> query("SELECT * FROM proveedores WHERE Id_proveedores = $id");
                                                        $nfilas = $consulta -> num_rows;
                                                        
                                                        for($F=0; $F < $nfilas; $F++)
                                                        {
                                                            $fila = $consulta -> fetch_row();
                                                    ?> 

                                                            <form action="modificar_proveedores.php" method="post">
                                                                <input type="hidden" name="memi" id="memi" value="<?php echo $id; ?>">
                                                                
                                                                <div class="tables">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <label>Nombre Proveedor</label>
                                                                                        <input type="text" class="form-control" name="name" value="<?php echo $fila[1]; ?>" autocomplete="off" required>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <label>Direccion</label>
                                                                                        <input type="text" class="form-control" name="address" value="<?php echo $fila[2]; ?>" autocomplete="off" required>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <label>Telefono </label>
                                                                                        <input type="text" class="form-control" name="contact" maxlength="10" pattern=".{10,10}" value="<?php echo $fila[3]; ?>" autocomplete="off" required>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <label>Correo electronico </label>
                                                                                        <input type="email" class="form-control" name="cperson" value="<?php echo $fila[4]; ?>" autocomplete="off" required>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                                <div class="tables">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="form-group">
                                                                                        <label>Notas</label>
                                                                                        <textarea name="note" cols="50" rows="4" class="form-control" autocomplete="off"><?php echo $fila[5]; ?></textarea>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" value="Agregar" class="btn btn-primary">Modificar proveedor</button>
                                                                </div>
                                                            </form>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>    
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
        <script>
            time_is_widget.init({Mexico_z159:{template:"<center>TIME</center>DATE", time_format:"12hours:minutes:seconds AMPM", date_format:"dayname, dnum monthname year"}});
        </script>
        <script src="../js/jquery.nicescroll.js"></script>
        <script src="../js/scripts.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>