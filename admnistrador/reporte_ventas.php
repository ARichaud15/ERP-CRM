<?php 
    require_once('auth.php');
    include('connect.php');

 ?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Reporte de ventas - ERP</title>
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
        <link rel="stylesheet" type="text/css" href="../css/tcal.css" />
        <script type="text/javascript" src="../js/tcal.js"></script>
        
        <script src="../js/jquery-1.10.2.min.js"></script>
        <script src="//widget.time.is/es.js"></script>

        <script language="javascript">
            function Clickheretoprint()
            {    
                var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,"; 
                disp_setting += "scrollbars=yes,width=1120, height=500, left=100, top=25"; 
                var content_vlue = document.getElementById("content").innerHTML; 
  
                var docprint=window.open("","",disp_setting); 
                docprint.document.open(); 
                docprint.document.write('</head><body onLoad="self.print()" style="width: 1100px; font-size: 13px; font-family: arial;">');
                docprint.document.write(content_vlue); 
                docprint.document.close(); 
                docprint.focus(); 
            }

            function limpiar_session()
            {
                $_SESSION['RS'] = ' ';
                location.href ="index.php";
            }
        </script>
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
                                <li class="active">Reporte de ventas</li>
                            </ol>
                        </div>
                       
                        <div class="graph-visual tables-main">
                            <h3 class="inner-tittle two" style="text-align: center;"> <i class="glyphicon glyphicon-stats"></i> Reporte de ventas </h3>
                            
                            <div class="graph">
                                <a  href="panel.php">
                                    <button class="btn blue" style="float: left;"><i class="fa fa-arrow-left"></i> Volver</button>
                                </a>

                                <a href="javascript:Clickheretoprint()">
                                    <button class="btn green" style="float: right;"><i class="glyphicon glyphicon-print"></i> Imprimir</button>
                                </a><br><br><br><br>

                                <form action="reporte_ventas.php" method="get">
                                    <center>
                                        <strong>
                                            De : <input type="date" name="d1" class="tcal" value="" required="" />
                                            A: <input type="date" name="d2" class="tcal" value="" required="" />
                                                
                                            <button class="btn btn-info" type="submit"><i class="fa fa-search"></i> Buscar</button>
                                        </strong>
                                    </center>
                                </form>
                            </div>    
                        </div>
                        
                        <div class="tables" id="content">
                        <div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
                            Reporte Ventas de&nbsp;<?php echo $_GET['d1'] ?>&nbsp;a&nbsp;<?php echo $_GET['d2'] ?>
                        </div>
                        
                        <table class="table table-hover table-bordered" data-responsive="table" cellpadding="5" cellspacing="0" border="1" style="text-align: left;">
                            <thead>
                                <tr>
                                    <th width="13%"> ID Transaccion </th>
                                    <th width="13%"> Fecha de venta </th>
                                    <th width="20%"> Cajero </th>
                                    <th width="20%"> Cliente </th>
                                    <th width="10%"> Total de la venta </th>
                                    <th width="10%"> Total de la venta con descuento </th>
                                    <th width="10%"> Dinero recibido </th>
                                    <th width="10%"> Cambio </th>
                                    <th width="10%"> Detalles </th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php
                                    
                                    $d1=$_GET['d1'];
                                    $d2=$_GET['d2'];
                                    
                                    $consulta = $db->query("SELECT * FROM ventas WHERE Fecha_ventas BETWEEN '$d1' AND '$d2'");
                                    @$nfilas = $consulta -> num_rows;
                                    
                                    for($F=0; $F < $nfilas; $F++)
                                    {
                                        $fila = $consulta -> fetch_row();
                                ?>
                                        <tr class="record">
                                            <td><?php echo $fila[0]; ?></td>
                                            <td><?php echo $fila[9]; ?></td>
                                            <td><?php echo $fila[1]; ?></td>
                                            <td><?php echo $fila[2]; ?></td>
                                            <td><?php $venta=$fila[4]; echo formatMoney($venta, true); ?></td>
                                            <td><?php $venta=$fila[5]; echo formatMoney($venta, true); echo " (".$fila[6]."%)"; ?></td>
                                            <td><?php $recibido=$fila[7]; echo formatMoney($recibido, true); ?></td>
                                            <td><?php $cambio=$fila[8]; echo formatMoney($cambio, true); ?></td>
                                            
                                            
                                            <td width="10">
                                                <a href="preview_ventas.php?invoice=<?php echo $fila[0];?>&d1=<?php echo $d1;?>&d2=<?php echo $d2;?>">
                                                    <button class="btn btn-success btn-block btn-large">
                                                        <i class="fa fa-chain"></i> Ticket 
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                            
                            <thead>
                                <tr class="info">
                                    <th colspan="4" style="border-top:1px solid #999999"> Total: </th>
                                    <th colspan="1" style="border-top:1px solid #999999"> 
                                    
                                        <?php
                                            function formatMoney($number, $fractional=false) 
                                            {
                                                if ($fractional) 
                                                    $number = sprintf('%.2f', $number);
                        
                                                while (true)
                                                {
                                                    $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                                                    if ($replaced != $number) 
                                                        $number = $replaced;
                                                    else
                                                        break;
                                                }
                                                return $number;
                                            }

                                            $d1=$_GET['d1'];
                                            $d2=$_GET['d2'];
                                            $total_ventas = 0;
                    
                                            $consulta = $db->query("SELECT * FROM ventas WHERE Fecha_ventas BETWEEN '$d1' AND '$d2'");
                                            $nfilas = $consulta -> num_rows;
                                                                
                                            for($F=0; $F < $nfilas; $F++)
                                            {
                                                $fila = $consulta -> fetch_row();
                                            
                                                @$total_ventas += $fila[4]; 
                                            }
                                            echo formatMoney($total_ventas, true);
                                        ?>
                                    </th>
                                    
                                    
                                    <th colspan="1" style="border-top:1px solid #999999">
                                        
                                        <?php 
                                            $total_ventac = 0;

                                            $consulta = $db->query("SELECT * FROM ventas WHERE Fecha_ventas BETWEEN '$d1' AND '$d2'");
                                            $nfilas = $consulta -> num_rows;
                                            
                                            for($F=0; $F < $nfilas; $F++)
                                            {
                                                $fila = $consulta -> fetch_row();
                                            
                                                $total_ventac+=$fila[5];
                                            }
                                            echo formatMoney($total_ventac, true);
                                        ?>
                                    </th>

                                    <th colspan="1" style="border-top:1px solid #999999">
                                        
                                        <?php 
                                            $total_recibido = 0;

                                            $consulta = $db->query("SELECT * FROM ventas WHERE Fecha_ventas BETWEEN '$d1' AND '$d2'");
                                            $nfilas = $consulta -> num_rows;
                                            
                                            for($F=0; $F < $nfilas; $F++)
                                            {
                                                $fila = $consulta -> fetch_row();
                                            
                                                $total_recibido+=$fila[7];
                                            }
                                            echo formatMoney($total_recibido, true);
                                        ?>
                                    </th>

                                    <th colspan="1" style="border-top:1px solid #999999">
                                        
                                        <?php 
                                            $total_cambio = 0;

                                            $consulta = $db->query("SELECT * FROM ventas WHERE Fecha_ventas BETWEEN '$d1' AND '$d2'");
                                            $nfilas = $consulta -> num_rows;
                                            
                                            for($F=0; $F < $nfilas; $F++)
                                            {
                                                $fila = $consulta -> fetch_row();
                                            
                                                @$total_cambio+=$fila[8];
                                            }
                                            echo formatMoney($total_cambio, true);
                                        ?>
                                    </th>

                                    
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
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