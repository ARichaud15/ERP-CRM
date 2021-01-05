<?php 
    require_once('auth.php');
    include('connect.php');
    $result = $db->query("SELECT Id_productos FROM productos");
    $rowcount = $result-> num_rows;

    date_default_timezone_set('America/Mexico_City');
 ?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Productos - ERP</title>
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
                                <li class="active">Productos</li>
                            </ol>
                        </div>
                       
                        <div class="graph-visual tables-main">
                            <h3 class="inner-tittle two" style="text-align: center;"> <i class="fa fa-list-alt"></i> Productos </h3>
                            <h4 class="inner-tittle two" style="text-align: center;"> Total de Productos: <?php echo $rowcount;?> </h4>
                            
                            <div class="graph">
                                <a  href="panel.php">
                                    <button class="btn blue" style="float: left;"><i class="fa fa-arrow-left"></i> Volver</button>
                                </a>

                                <a>
                                    <input type="text" style="padding:11px; float:center; width:470px; height:49px; margin: 9px" name="filter" value="" id="filter" placeholder="Buscar Producto..." autocomplete="off" />

                                    <button class="btn blue" data-toggle="modal" data-target="#Modal_agregar"><i class="fa fa-plus"></i> Agregar producto</button>

                                    <button class="btn blue" data-toggle="modal" data-target="#Modal_agregar_marca"><i class="fa fa-plus"></i> Agregar marca</button>
                                </a>

                                <div class="tables">
                                    <table class="table table-hover table-bordered" id="resultTable" data-responsive="table">
                                        <thead>
                                            <tr>
                                                <th> Proveedor </th>
                                                <th> Codigo </th>
                                                <th> Producto </th>
                                                <th> Marca </th>
                                                <th> Cantidad </th>
                                                <th> Presentacion </th>
                                                <th> Precio distribuidor </th>
                                                <th> Precio de Venta </th>
                                                <th> Fecha de compra </th>
                                                <th> Accion </th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
                                                
                                                $consulta = $db -> query( "SELECT * FROM productos ORDER BY Id_productos DESC" );
                                                $nfilas = $consulta -> num_rows;
                                    
                                                for($F=0; $F < $nfilas; $F++)
                                                {
                                                    $fila = $consulta -> fetch_row();
                                                    $cantidad = $fila[5];
                                    
                                                    if ($cantidad < 10) 
                                                        echo '<tr class="danger">';
                                                    else 
                                                    
                                                        echo '<tr>';
                                            ?>
                                                            <td><?php echo $fila[1]; ?></td>
                                                            <td><?php echo $fila[2]; ?></td>
                                                            <td><?php echo $fila[3]; ?></td>
                                                            <td><?php echo $fila[4]; ?></td>
                                                            <td><?php echo $fila[5]; ?></td>
                                                            <td><?php echo $fila[6]; ?></td>
                                                            <td><?php $oprice=$fila[7]; echo formatMoney($oprice, true);?></td>
                                                            <td><?php $pprice=$fila[8]; echo formatMoney($pprice, true); ?></td>
                                                            <td><?php echo $fila[10]; ?></td>
                                    
                                                            <td>
                                                                <a rel="facebox" title="Click para editar el producto" href="editar_producto.php?id=<?php echo $fila[0]; ?>"><button class="btn btn-warning"><i class="fa fa-edit"></i></button> 
                                                                </a>
                                                                
                                                                <a href="#" id="<?php echo $fila[0]; ?>" class="delbutton" title="Click para borrar el producto"><button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
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
                                        <h2 class="modal-title">Agregar producto</h2>
                                    </div>
                                    <form action="agregar_productos.php" method="post">

                                        <div class="modal-body">
                                            <div class="col-md-12 form-group1">
                                                <div class="graph">
                                                    <div class="tables">
                                                        <table class="table">
                                                            <tbody>
                                                                
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td><span>Fecha:</span> <?php echo date('d/m/Y');?> </td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td><span>Codigo</span><input type="number" name="codigo" Required/></td>
                                                                    <td>
                                                                        <span>Proveedor</span>
                                                                        <select name="proveedor" class="form-control1">
                                                                            <?php
                                                                                $consulta = $db -> query( "SELECT * FROM proveedores" );
                                                                                $nfilas = $consulta -> num_rows;
                                                                                                        
                                                                                for($F=0; $F < $nfilas; $F++)
                                                                                {
                                                                                    $fila = $consulta -> fetch_row();
                                                                                    echo " <option>$fila[1]</option> ";
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                    
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td><span>Producto</span><input type="text" name="producto" Required/></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <span>Marca</span>
                                                                        <select name="marca" class="form-control1">
                                                                            <?php
                                                                                $consulta = $db -> query( "SELECT * FROM marcas" );
                                                                                $nfilas = $consulta -> num_rows;
                                                                                                        
                                                                                for($F=0; $F < $nfilas; $F++)
                                                                                {
                                                                                    $fila = $consulta -> fetch_row();
                                                                                    echo " <option>$fila[1]</option> ";
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                    
                                                                    <td><span>Cantidad</span><input type="number" min="0" name="cantidad"/></td>

                                                                    <td>
                                                                        <span>Unidad</span>
                                                                        <select name="unidad" class="form-control1">
                                                                            <option>Piezas</option>
                                                                            <option>Cajas</option>
                                                                            <option>Bolsas</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>
                                                                        <span>Precio del proveedor</span><input type="text" id="txt2" name="precio_p" onkeyup="sum();" Required/>
                                                                    </td>

                                                                    <td>
                                                                        <span>Precio de venta</span><input type="text" id="txt1" name="precio_v" onkeyup="sum();" Required/>
                                                                    </td>

                                                                    <td><input type="hidden" id="txt3" name="ganancia"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" value="Agregar" class="btn btn-primary">Agregar producto</button>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

                        <div class="modal fade" id="Modal_agregar_marca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title">Agregar marca</h2>
                                    </div>
                                    <form action="agregar_marcas.php" method="post">

                                        <div class="modal-body">
                                            <div class="col-md-12 form-group1">
                                                <div class="graph">
                                                    <div class="tables">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td><span>Marca</span><input type="text" name="marca" autocomplete="off" Required/></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" id="boton">Agregar marca</button>
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
                function sum() 
                {
                    var txtFirstNumberValue = document.getElementById('txt1').value;
                    var txtSecondNumberValue = document.getElementById('txt2').value;
                    var result = parseFloat(txtFirstNumberValue) - parseFloat(txtSecondNumberValue);
                        
                    if (!isNaN(result)) 
                    {
                        var result2 = trunc(result, 2);

                        document.getElementById('txt3').value = result2;

                    }
                }

                function trunc (x, posiciones = 0) 
                {
                    var s = x.toString()
                    var l = s.length
                    var decimalLength = s.indexOf('.') + 1
                    var numStr = s.substr(0, decimalLength + posiciones)
                    
                    return Number(numStr)
                }
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
                    if(confirm("¿Estás seguro de eliminar el producto?"))
                    {
                        $.ajax({
                           type: "GET",
                           url: "eliminar_producto.php",
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
            time_is_widget.init({Mexico_z159:{template:"<center>TIME</center>DATE", time_format:"12hours:minutes:seconds AMPM", date_format:"dayname, dnum monthname year"}});
        </script>
        <script src="../js/jquery.nicescroll.js"></script>
        <script src="../js/scripts.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>