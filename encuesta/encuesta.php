<?php 
    require_once('auth.php');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Encuesta de satisfaccion</title>
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
    </head> 
    <body>
        <div class="page-container">
            <div class="inner-content">
                <div class="header-section">
                    <div class="top_menu">
                        <div class="profile_details_left">
                            <ul class="nofitications-dropdown">
                                <li class="dropdown note">
                                    <a><span class="badge blue1"></span></a>
                                </li>                                           
                                <div class="clearfix"></div>    
                            </ul>
                        </div>
                        <div class="clearfix"></div>    
                    </div>
                    <div class="clearfix"></div>
                </div>
                    
                <div class="outter-wp">
                    <div class="graph-visual tables-main">
                        <h3 class="inner-tittle two" style="text-align: center;"> Papeleria ALVAM </h3>
                            <div class="graph">
                                <p>Esta encuesta trata sobre los servicios que ofrece nuestra papelería "ALVAM"</p>

                                <form action="enviar_encuesta.php" method="post">
                                    <div class="form-group">
                                        <label for="radio" class="col-sm-12 control-label">1) ¿Con que frecuencia visitas nuestra papeleria "ALVAM"?</label> 
                                         
                                        <div class="col-sm-12">
                                            <div class="radio block"> <label><input type="radio" name="P1" value="A">A) Diariamente</label></div>
                                            <div class="radio block"><label><input type="radio" name="P1" value="B">B) Semanalmente</label></div>
                                            <div class="radio block"><label><input type="radio" name="P1" value="C">C) Ocasionalmente</label></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                         <label for="radio" class="col-sm-12 control-label">2) ¿Consideras que los precios de nuestra papeleria son?</label> 
                                             
                                        <div class="col-sm-12">
                                            <div class="radio block"> <label><input type="radio" name="P2" value="A">A) Bajos</label></div>
                                            <div class="radio block"><label><input type="radio" name="P2" value="B">B) Accesibles</label></div>
                                            <div class="radio block"><label><input type="radio" name="P2" value="C">C) Elevados</label></div>
                                            <div class="radio block"><label><input type="radio" name="P2" value="D">D) Muy elevados</label></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                         <label for="radio" class="col-sm-12 control-label">3) ¿Encuentras lo que buscas?</label> 
                                             
                                        <div class="col-sm-12">
                                            <div class="radio block"> <label><input type="radio" name="P3" value="A">A) Siempre</label></div>
                                            <div class="radio block"><label><input type="radio" name="P3" value="B">B) Casi siempre</label></div>
                                            <div class="radio block"><label><input type="radio" name="P3" value="C">C) A veces</label></div>
                                            <div class="radio block"><label><input type="radio" name="P3" value="D">D) Nunca</label></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                         <label for="radio" class="col-sm-12 control-label">4) ¿Te gustan las promociones que ofrece la papeleria?</label> 
                                             
                                        <div class="col-sm-12">
                                            <div class="radio block"> <label><input type="radio" name="P4" value="A">A) Si</label></div>
                                            <div class="radio block"><label><input type="radio" name="P4" value="B">B) No</label></div>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                         <label for="radio" class="col-sm-12 control-label">5) ¿Regresarias a comprar en nuestra papleria "ALVAM"?</label> 
                                             
                                        <div class="col-sm-12">
                                            <div class="radio block"> <label><input type="radio" name="P5" value="A">A) Si</label></div>
                                            <div class="radio block"><label><input type="radio" name="P5" value="B">B) No</label></div>
                                            
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <button type="submit" class="btn blue">Enviar encuesta</button>
                                </form>
                            </div>
                    </div>
                </div>

                <footer>
                    <p>© 2018 ERP Papeleria. Derechos Reservados</p>
                </footer>
            </div>
        </div>
        
        <script src="../js/jquery.nicescroll.js"></script>
        <script src="../js/scripts.js"></script>
        <script src="../js/bootstrap.min.js"></script>

    </body>
</html>