<?php 
    require_once('auth.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Ventas - ERP</title>
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
        <!-- <script src="../js/es.js"></script> -->
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
                                <li class="active">Ventas</li>
                            </ol>
                        </div>
                       
                        <div class="graph-visual tables-main">
                            <h3 class="inner-tittle two" style="text-align: center;"> <i class="fa fa-shopping-cart"></i> Ventas </h3>
                            
                            <div class="graph">
                                <a  href="panel.php">
                                    <button class="btn blue" style="float: left;"><i class="fa fa-arrow-left"></i> Volver</button>
                                </a>

                                <form action="guardar_producto.php" method="post" >
                                    <input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
                                    
                                    <select name="producto" style="padding:11px; float:center; width:650px; height:49px; margin: 9px" required class="form-control1">
                                        <?php
                                            include('connect.php');
                                            $consulta = $db -> query( "SELECT * FROM productos ORDER BY Id_productos DESC" );
                                            $nfilas = $consulta -> num_rows;
                                    
                                            for($F=0; $F < $nfilas; $F++)
                                            {
                                                $fila = $consulta -> fetch_row();
                                                
                                                if($fila[5] > 0)
                                                    echo" <option value='$fila[0]'> $fila[2] - $fila[3] $fila[4] </option> ";
                                            }
                                        ?>
                                    </select>

                                    <input type="number" name="cantidad" value="1" min="1" autocomplete="off" style="padding:11px; float:center; width:50px; height:49px; margin: 9px" / required>
                                    
                                    <Button type="submit" class="btn blue" style="padding:11px; float:center; width:120px; height:49px; margin: 9px" /><i class="fa fa-plus"></i> Agregar</button>
                                </form>
                                
                                <div class="tables">
                                    <table class="table table-bordered" data-responsive="table">
                                        <thead>
                                            <tr>
                                                <th> Codigo </th>
                                                <th> Producto</th>
                                                <th> Marca</th>
                                                <th> Precio unitario</th>
                                                <th> Cantidad </th>
                                                <th> Monto </th>
                                                
                                                <th> Accion </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $id=$_GET['invoice'];
                                            
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
                                            
                                            $consulta = $db -> query("SELECT * FROM ticket WHERE Numero_venta_ticket = '$id'");
                                            @$nfilas = $consulta -> num_rows;
                                    
                                            for($F=0; $F < $nfilas; $F++)
                                            {
                                                $fila = $consulta -> fetch_row();
                                        ?>
                                                <tr class="record">
                                                    <td><?php echo $fila[3]; ?></td>
                                                    <td><?php echo $fila[4]; ?></td>
                                                    <td><?php echo $fila[5]; ?></td>
                                                    <td><?php $ppp=$fila[7]; echo formatMoney($ppp, true);?></td>
                                                    <td><?php echo $fila[6]; ?></td>
                                                    <td><?php $dfdf=$fila[8]; echo formatMoney($dfdf, true);?></td>
                                                    
            
                                                    <td width="90">
                                                        <a href="eliminar_carrito.php?id=<?php echo $fila[0]; ?>&invoice=<?php echo $_GET['invoice']; ?>&cantidad=<?php echo $fila[6];?>&producto=<?php echo $fila[2];?>">
                                                            <button class="btn btn-danger">
                                                                <i class="fa fa-minus"></i> Quitar 
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        ?>
                                            <tr>
                                                <th> </th>
                                                <th> </th>
                                                <th> </th>
                                                <th> </th>
                                                <th> </th>
                                                
                                                <td> Monto Total: </td>
                                                
                                                <th> </th>
                                            </tr>
                                            
                                            <tr>
                                                <th colspan="5"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
                                                <td colspan="1"><strong style="font-size: 12px; color: #222222;">
                                                
                                                    <?php
                                                        $invoice=$_GET['invoice'];
                                                        $total_venta = 0;
                                                        $consulta = $db->query("SELECT * FROM ticket WHERE Numero_venta_ticket = '$invoice'");
                                                        $nfilas = $consulta -> num_rows;
                                            
                                                        for($F=0; $F < $nfilas; $F++)
                                                        {
                                                            $fila = $consulta -> fetch_row();
                                                            
                                                            $total_venta += $fila[8];
                                                        }
                                                        echo formatMoney($total_venta, true);
                                                    ?>
                                                </strong></td>
                                                
                                                
                                                <th></th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php 
                                        $invoice = $_GET['invoice'];
                                        $total_venta_aux = $total_venta;
                                        $cajero = $_SESSION['SESION_NOMBRE_USUARIO'];

                                        if($total_venta > 0)
                                        {
                                    ?>
                                            <a rel="facebox" >
                                                <button type="submit" class="btn btn-success btn-large btn-block" data-toggle="modal" data-target="#Modal_usuarios">
                                                    <i class="fa fa-dollar"></i> Cobrar
                                                </button>
                                            </a>
                                    <?php  
                                        }
                                    ?>

                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>    
                            
                        </div>

                        <div class="modal fade" id="Modal_usuarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title">Cliente</h2>
                                        <div style="text-align: right;width:220px"></div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-10 form-group1" style="text-align: right;width:598px">
                                            <div class="buttons-ui">
                                                <a class="btn blue open-Modal2" data-toggle="modal" data-target="#Modal" data-dismiss="modal" data-id="S/N" data-nombre="Cliente">Cliente no registrado</a>
                                                
                                                <a class="btn blue" data-toggle="modal" data-target="#Modal_registrado" data-dismiss="modal">Cliente registrado</a>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="modal-footer"></div>
                                    
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

                        <div class="modal fade" id="Modal_registrado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title">Buscar cliente</h2>
                                        <div style="text-align: right;width:220px"></div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-12 form-group1">
                                            
                                            <input type="text" style="width:548px; height:49px; margin: 9px" name="membresia" placeholder="Buscar cliente..." autocomplete="off" onkeyup="showHint(this.value, '<?php echo $invoice; ?>')" />

                                            <div class="tables">
                                                <table class="table table-bordered" id="txtHint"></table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer"></div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

                       <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title">Efectivo</h2>
                                    </div>

                                    <form action="guardar_venta.php" method="post">
                                        <div class="modal-body">
                                            <div class="col-md-12 form-group1">
                                                <div class="graph">
                                                    <div class="tables">
                                                        <table class="table">
                                                            <input type="hidden" name="invoice" value="<?php echo $invoice; ?>" />
                                                            <input type="hidden" name="cajero" value="<?php echo $cajero; ?>" />
                                                            <input type="hidden" name="total_venta" id="total_venta" value="<?php echo $total_venta_aux; ?>" />
                                                            <input type="hidden" id="total11" name="total11" value="<?php echo $total_venta_aux; ?>" />

                                                            <input type="hidden" id="id1" name="id"/>
                                                            <input type="hidden" id="cname11" name="cname11"/>
                                                            <input type="hidden" id="descuento2" name="descuento2" value="0" />
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <span>Cajero: <span><?php echo $_SESSION['SESION_NOMBRE_USUARIO'];?></span>
                                                                        </span>
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <span>Nombre del cliente: 
                                                                            <span id="cname2"></span>
                                                                        </span>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>
                                                                        <span>Monto a pagar: 
                                                                            <span><?php echo $total_venta_aux;?></span> 
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <span>Dinero recibido: </span><input type="number" step="any" name="cash2" id="cash2" onkeyup="verificar2()" required />
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" id="boton2" style="display:none;">Cobrar</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

                         <div class="modal fade" id="Modal_ticket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title">Efectivo</h2>
                                    </div>

                                    <form action="guardar_venta.php" method="post">
                                        <div class="modal-body">
                                            <div class="col-md-12 form-group1">
                                                <div class="graph">
                                                    <div class="tables">
                                                        <table class="table">
                                                            <input type="hidden" name="invoice" value="<?php echo $invoice; ?>" />
                                                            <input type="hidden" name="cajero" value="<?php echo $cajero; ?>" />
                                                            <input type="hidden" name="total_venta" id="total_venta" value="<?php echo $total_venta_aux; ?>" />
                                                            
                                                            <input type="hidden" name="id" id="id"/>
                                                            <input type="hidden" id="cname1" name="cname1"/>
                                                            <input type="hidden" id="total1" name="total1"/>
                                                            <input type="hidden" id="descuento1" name="descuento1"/>
                                                            <input type="hidden" id="correo" name="correo"/>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <span>Cajero: <span><?php echo $_SESSION['SESION_NOMBRE_USUARIO'];?></span>
                                                                        </span>
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <span>Nombre del cliente: 
                                                                            <span id="cname"></span>
                                                                        </span>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>
                                                                        <span>Total: 
                                                                            <span><?php echo $total_venta_aux;?></span> 
                                                                        </span>
                                                                        
                                                                        <tr>
                                                                            <td>
                                                                                <span>Descuento(<span id="descuento"></span>%):
                                                                                    <span id="total_descuento"></span>
                                                                                </span>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <span>Monto a pagar:
                                                                                    <span id="total"></span>
                                                                                </span>
                                                                            </td>
                                                                        </tr>
                                                                    </td>
                                                                    <td>
                                                                        <span>Dinero recibido: </span><input type="number" step="any" name="cash" id="cash" onkeyup="verificar()" required />
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" id="boton" style="display:none;">Cobrar</button>
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
                function verificar()
                {
                    if(document.getElementById("cash").value == '')
                        var recibido = 0;
                    else
                        var recibido = parseFloat(document.getElementById("cash").value);

                    var total = parseFloat(document.getElementById("total1").value); 
                    
                    if(recibido < total)
                        document.getElementById('boton').style.display = 'none';
                    else
                        document.getElementById('boton').style.display = '';
                }

                function verificar2()
                {
                    if(document.getElementById("cash2").value == '')
                        var recibido = 0;
                    else
                        var recibido = parseFloat(document.getElementById("cash2").value);

                    var total = parseFloat(document.getElementById("total11").value); 
                    
                    if(recibido < total)
                        document.getElementById('boton2').style.display = 'none';
                    else
                        document.getElementById('boton2').style.display = '';
                }
            </script>

            <script>
                function showHint(str, invoice)
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
                        {
                          document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "ajax_clientes.php? dato="+str+"&invoice="+invoice, true);
                    xhttp.send();
                }
            </script>

            <script type="text/javascript">
                $(document).on("click", ".open-Modal", function () {
                    document.getElementById("cname1").value = $(this).data('nombre');
                    document.getElementById("total1").value = $(this).data('total');
                    document.getElementById("descuento1").value = $(this).data('descuento');
                    document.getElementById("correo").value = $(this).data('correo');
                    
                    document.getElementById("id").value = $(this).data('id');
                    document.getElementById("cname").innerHTML = $(this).data('nombre');
                    document.getElementById("descuento").innerHTML = $(this).data('descuento');
                    document.getElementById("total_descuento").innerHTML = $(this).data('total_descuento');
                    document.getElementById("total").innerHTML = $(this).data('total');
                });
            </script>

            <script type="text/javascript">
                $(document).on("click", ".open-Modal2", function () {
                    document.getElementById("cname11").value = $(this).data('nombre');
                    document.getElementById("id1").value = $(this).data('id');
                    document.getElementById("cname2").innerHTML = $(this).data('nombre');
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