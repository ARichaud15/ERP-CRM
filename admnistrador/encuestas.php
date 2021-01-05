<?php 
	require_once('auth.php');
	include('connect.php');
    $result = $db->query("SELECT Id_encuesta FROM encuestas");
    $rowcount = $result-> num_rows;

    date_default_timezone_set('America/Mexico_City');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Encuestas - ERP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link href="../css/style.css" rel='stylesheet' type='text/css' />
        <link href="../css/font-awesome.css" rel="stylesheet"> 
        <link href='../fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />
        
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="//widget.time.is/es.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                                <li class="active">Encuestas</li>
                            </ol>
                        </div>

                        <div class="graph-visual tables-main">
                            <h3 class="inner-tittle two" style="text-align: center;"> <i class="fa fa-pie-chart"></i> Encuestas </h3>
                            <h4 class="inner-tittle two" style="text-align: center;"> Total de encuestas: <?php echo $rowcount;?> </h4>
                            
                            <div class="graph">
                                <a  href="panel.php">
                                    <button class="btn blue" style="float: left;"><i class="fa fa-arrow-left"></i> Volver</button>
                                </a>
                                <br><br><br><br>

                                <div class="tables">
                                    <table class="table" id="resultTable" data-responsive="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div style="width: 500px; height: 350px;" id="pregunta_1"></div>
                                                </td>
                                                <td>
                                                   <div style="width: 500px; height: 350px;" id="pregunta_2"></div> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                   <div style="width: 500px; height: 350px;" id="pregunta_3"></div> 
                                                </td>
                                                <td>
                                                   <div style="width: 500px; height: 350px;" id="pregunta_4"></div> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div style="width: 500px; height: 350px;" id="pregunta_5"></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() 
                {
                    var data_1 = google.visualization.arrayToDataTable([
                        ['Language', 'Rating'],
                        <?php
                            $respuesta_1 = 0;
                            
                            $respuesta_1A = 0;
                            $respuesta_1B = 0;
                            $respuesta_1C = 0;
                            
                            $consulta = $db -> query( "SELECT * FROM encuestas" );
                            $nfilas = $consulta -> num_rows;
                            
                            for($F=0; $F < $nfilas; $F++)
                            {
                                $fila = $consulta -> fetch_row();
                                $respuesta_1 = $fila[2];
                                    
                                if ($respuesta_1 == 'A') 
                                    $respuesta_1A += 1;
                                else if ($respuesta_1 == 'B') 
                                    $respuesta_1B += 1;
                                else if ($respuesta_1 == 'C') 
                                    $respuesta_1C += 1;
                            }
                            echo "['Diariamente', ".$respuesta_1A."],";
                            echo "['Semanalmente', ".$respuesta_1B."],";
                            echo "['Ocasionalmente', ".$respuesta_1C."],";
                        ?>
                    ]);

                    var data_2 = google.visualization.arrayToDataTable([
                        ['Language', 'Rating'],
                        <?php
                            $respuesta_2 = 0;
                           
                            $respuesta_2A = 0;
                            $respuesta_2B = 0;
                            $respuesta_2C = 0;
                            $respuesta_2D = 0;

                            $consulta = $db -> query( "SELECT * FROM encuestas" );
                            $nfilas = $consulta -> num_rows;
                            
                            for($F=0; $F < $nfilas; $F++)
                            {
                                $fila = $consulta -> fetch_row();
                                $respuesta_2 = $fila[3];
                                    
                                if ($respuesta_2 == 'A') 
                                    $respuesta_2A += 1;
                                else if ($respuesta_2 == 'B') 
                                    $respuesta_2B += 1;
                                else if ($respuesta_2 == 'C') 
                                    $respuesta_2C += 1;
                                else if ($respuesta_2 == 'D') 
                                    $respuesta_2D += 1;
                            }
                            echo "['Bajos', ".$respuesta_2A."],";
                            echo "['Accesibles', ".$respuesta_2B."],";
                            echo "['Elevados', ".$respuesta_2C."],";
                            echo "['Muy elevados', ".$respuesta_2D."],";
                        ?>
                    ]);

                    var data_3 = google.visualization.arrayToDataTable([
                        ['Language', 'Rating'],
                        <?php
                            $respuesta_3 = 0;
                            
                            $respuesta_3A = 0;
                            $respuesta_3B = 0;
                            $respuesta_3C = 0;
                            $respuesta_3D = 0;
                            
                            $consulta = $db -> query( "SELECT * FROM encuestas" );
                            $nfilas = $consulta -> num_rows;
                            
                            for($F=0; $F < $nfilas; $F++)
                            {
                                $fila = $consulta -> fetch_row();
                                $respuesta_3 = $fila[4];
                                    
                                if ($respuesta_3 == 'A') 
                                    $respuesta_3A += 1;
                                else if ($respuesta_3 == 'B') 
                                    $respuesta_3B += 1;
                                else if ($respuesta_3 == 'C') 
                                    $respuesta_3C += 1;
                                else if ($respuesta_3 == 'D') 
                                    $respuesta_3D += 1;
                            }
                            echo "['Siempre', ".$respuesta_3A."],";
                            echo "['Casi siempre', ".$respuesta_3B."],";
                            echo "['A veces', ".$respuesta_3C."],";
                            echo "['Nunca', ".$respuesta_3D."],";
                        ?>
                    ]);

                    var data_4 = google.visualization.arrayToDataTable([
                        ['Language', 'Rating'],
                        <?php
                            $respuesta_4 = 0;
                            
                            $respuesta_4A = 0;
                            $respuesta_4B = 0;

                            $consulta = $db -> query( "SELECT * FROM encuestas" );
                            $nfilas = $consulta -> num_rows;
                            
                            for($F=0; $F < $nfilas; $F++)
                            {
                                $fila = $consulta -> fetch_row();
                                $respuesta_4 = $fila[5];
                                    
                                if ($respuesta_4 == 'A') 
                                    $respuesta_4A += 1;
                                else if ($respuesta_4 == 'B') 
                                    $respuesta_4B += 1;
                            }
                            echo "['Si', ".$respuesta_4A."],";
                            echo "['No', ".$respuesta_4B."],";
                        ?>
                    ]);

                    var data_5 = google.visualization.arrayToDataTable([
                        ['Language', 'Rating'],
                        <?php
                            $respuesta_5 = 0;
                            
                            $respuesta_5A = 0;
                            $respuesta_5B = 0;

                            $consulta = $db -> query( "SELECT * FROM encuestas" );
                            $nfilas = $consulta -> num_rows;
                            
                            for($F=0; $F < $nfilas; $F++)
                            {
                                $fila = $consulta -> fetch_row();
                                $respuesta_5 = $fila[6];
                                    
                                if ($respuesta_5 == 'A') 
                                    $respuesta_5A += 1;
                                else if ($respuesta_5 == 'B') 
                                    $respuesta_5B += 1;
                            }
                            echo "['Si', ".$respuesta_5A."],";
                            echo "['No', ".$respuesta_5B."],";
                        ?>
                    ]);
                    
                    var options_1 = {
                        title: '¿Con que frecuencia visitas nuestra papeleria "ALVAM"?',
                        width: 550,
                        height: 350,
                        pieHole: 0.5
                    };

                    var options_2 = {
                        title: '¿Consideras que los precios de nuestra papeleria son?',
                        width: 550,
                        height: 350,
                        pieHole: 0.5
                    };

                    var options_3 = {
                        title: '¿Encuentras lo que buscas?',
                        width: 550,
                        height: 400,
                        pieHole: 0.5
                    };

                    var options_4 = {
                        title: '¿Te gustan las promociones que ofrece la papeleria?',
                        width: 550,
                        height: 400,
                        pieHole: 0.5
                    };

                    var options_5 = {
                        title: '¿Regresarias a comprar en nuestra papleria "ALVAM"?',
                        width: 550,
                        height: 400,
                        pieHole: 0.5
                    };
                    
                    var pregunta_1 = new google.visualization.PieChart(document.getElementById('pregunta_1'));
                    var pregunta_2 = new google.visualization.PieChart(document.getElementById('pregunta_2'));
                    var pregunta_3 = new google.visualization.PieChart(document.getElementById('pregunta_3'));
                    var pregunta_4 = new google.visualization.PieChart(document.getElementById('pregunta_4'));
                    var pregunta_5 = new google.visualization.PieChart(document.getElementById('pregunta_5'));
                    
                    pregunta_1.draw(data_1, options_1);
                    pregunta_2.draw(data_2, options_2);
                    pregunta_3.draw(data_3, options_3);
                    pregunta_4.draw(data_4, options_4);
                    pregunta_5.draw(data_5, options_5);
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