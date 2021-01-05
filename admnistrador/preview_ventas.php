<?php 
    require_once('auth.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Ticket - ERP</title>
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

        <script language="javascript">
            function Clickheretoprint()
            {    
                var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,"; 
                disp_setting += "scrollbars=yes,width=800, height=500, left=100, top=25"; 
                var content_vlue = document.getElementById("content").innerHTML; 
  
                var docprint=window.open("","",disp_setting); 
                docprint.document.open(); 
                docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');
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

        <?php
            include('connect.php');

            $invoice=$_GET['invoice'];
                
            $result = $db->query("SELECT * FROM ventas WHERE Id_ventas = '$invoice'");
            $nfilas = $result -> num_rows;
                
            for($F=0; $F < $nfilas; $F++)
            {
                $fila = $result -> fetch_row();

                $cname = $fila[2];
                $invoice = $fila[0];
                $date = $fila[9];
                $cashier = $fila[1];
                $cash = $fila[7];
                $amount = $fila[8];
                $total = $fila[4];
                $descuento = $fila[6];
                $total_pagar = $fila[5];

                $descuento_aux = ($total * $descuento) / 100;
            }
            $_SESSION['RS'] = ' ';
        ?>
    </head> 
    
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
                                <li class="active">Ventas</li>
                            </ol>
                        </div>
                       
                        <div class="graph-visual tables-main">
                            <div class="graph">
                                <a  href="panel.php">
                                    <button class="btn blue" style="float: left;"><i class="fa fa-arrow-left"></i> Volver</button>
                                </a>

                                <div class="table" id="content">
                                    <div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">
                                        <div style="width: 100%; height: 190px;" >
                                            <div style="width: 900px; float: left;">
                                                <center>
                                                    <h3>Ticket</h3>
                                                    Papeleria Alvam <br>
                                                </center>
                                            </div>
                                    
                                            <div class="tables">
                                                <table class="table">
                                                    <tr>
                                                        <td>Ticket: <?php echo $invoice?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Cajero: <?php echo $cashier?></td>
                                                        <td>Cliente: <?php echo $cname?></td>
                                                        <td>Fecha: <?php echo $date ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <br><br>
                                
                                        <div class="tables">
                                            <table class="table table-bordered" cellpadding="5" cellspacing="0" border="1">
                                                <thead>
                                                    <tr>
                                                        <th>Cantidad</th>
                                                        <th>Producto</th>
                                                        <th>Marca</th>
                                                        <th>Precio</th>
                                                        <th>Importe</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $id=$_GET['invoice'];
                                                        $result = $db->query("SELECT * FROM ticket WHERE Numero_venta_ticket = '$id'");
                                                        @$nfilas = $result -> num_rows;

                                                        for($F=0; $F < $nfilas; $F++)
                                                        {
                                                            $fila = $result -> fetch_row();
                                                    ?>
                                                            <tr class="record">
                                                                <td><?php echo $fila[6]; ?></td>
                                                                <td><?php echo $fila[4]; ?></td>
                                                                <td><?php echo $fila[5]; ?></td>
                                                                <td><?php $ppp=$fila[7]; echo formatMoney($ppp, true); ?></td>
                                                                <td><?php $dfdf=$fila[8]; echo formatMoney($dfdf, true); ?></td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    ?>
                    
                                                    <tr>
                                                        <td colspan="4" style=" text-align:right;">
                                                            <strong>Monto: &nbsp;</strong>
                                                        </td>
                                                        <td colspan="2">
                                                            <strong><?php echo formatMoney($total, true); ?></strong>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="4" style=" text-align:right;">
                                                            <strong>Descuento(<span><?php echo $descuento;?></span>%):&nbsp;</strong>
                                                        </td>
                                                        <td colspan="2">
                                                            <strong> <?php echo formatMoney($descuento_aux, true);?> </strong>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="4" style=" text-align:right;">
                                                            <strong>Total a pagar: &nbsp;</strong>
                                                        </td>
                                                        <td colspan="2">
                                                            <strong><?php echo formatMoney($total_pagar, true);?></strong>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="4"style=" text-align:right;">
                                                            <strong>Dinero recibido:&nbsp;</strong>
                                                        </td>
                                                                
                                                        <td colspan="2">
                                                            <strong><?php echo formatMoney($cash, true); ?></strong>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td colspan="4" style=" text-align:right;">
                                                            <strong>Cambio:&nbsp;</strong>
                                                        </td>

                                                        <td colspan="2">
                                                            <strong>
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
                                                                    echo formatMoney($amount, true);
                                                                ?>
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="pull-right" style="margin-right:100px;">
                                    <a href="javascript:Clickheretoprint()" style="font-size:20px;">
                                        <button onclick="limpiar_session()" class="btn btn-success btn-large"><i class="glyphicon glyphicon-print"></i> Imprimir</button>
                                    </a>
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