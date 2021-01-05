<?php
    session_start();
?>
<!DOCTYPE HTML>
<html lang="es">
   <head>
        <title>Iniciar sesion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
    
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script src="../js/jquery-1.10.2.min.js"></script>
        <link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link href="../css/style.css" rel='stylesheet' type='text/css' />
        <link href="../css/font-awesome.css" rel="stylesheet"> 
        <link href='/fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />
    </head> 

    <body>
        <!--/login-->
        <div class="error_page">
            <!--/login-top-->
            <div class="error-top">
                <h2 class="inner-tittle page">Papeleria ALVAM</h2>
                <div class="login">
                    <h3 class="inner-tittle t-inner">Ingresa tu numero de ticket</h3>
                     <?php
                        if( isset($_SESSION['Mensaje_error2']) && is_array($_SESSION['Mensaje_error2']) && count($_SESSION['Mensaje_error2']) > 0 )
                        {
                            foreach($_SESSION['Mensaje_error2'] as $mensaje) 
                            {
                                echo '<div style="color: red; text-align: center;">',$mensaje,'</div><br>'; 
                            }
                            unset($_SESSION['Mensaje_error2']);
                        }
                    ?>
                    
                    <form action="login_fun.php" method="post">
                        <input type="text" id="ticket" name="ticket" required="" placeholder="Numero de ticket" />
                        <div class="submit">
                            <input type="submit" value="Ingresar a la encuesta" >
                        </div>

                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
            <!--//login-top-->
        </div>
        <!--//login-->
        <!--footer section start-->
        <div class="footer">
            <div class="error-btn"></div>
        </div>
        <!--footer section end-->
       
       <!--js -->
        <script src="../js/jquery.nicescroll.js"></script>
        <script src="../js/scripts.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>