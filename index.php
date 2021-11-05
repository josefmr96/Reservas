<?php
    require_once("reserva/config/conexion.php");
    if(isset($_POST["enviar"]) and $_POST["enviar"]=="si"){ 
        require_once("reserva/models/Usuario.php");
        $usuario = new Usuario(); //INSTANCIA DE CLASE
        $usuario->login(); //BUSCANDO USUARIO CON LOS DATOS RECIBIDOS 
    }
?>
<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login</title>

	<link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="img/favicon.png" rel="icon" type="image/png">
	<link href="img/favicon.ico" rel="shortcut icon">

    <link rel="stylesheet" href="reserva/public/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="reserva/public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="reserva/public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="reserva/public/css/main.css">
</head>
<body>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
            
                <form class="sign-box" action="" method="post" id="login_form">
                    <div class="sign-avatar">
                        <img src="/reserva/public/2.jpg" alt="" id="imgtipo">
                    </div>
                   
                    <header class="sign-title" id="lbltitulo">Ingresar</header>
                    <!-- //MANEJO DE ERRORES SEGUN PARAMETROS ENVIADOS  -->
                    <?php
                        if (isset($_GET["m"])){
                            switch($_GET["m"]){
                                case "1";
                                    ?>
                                        <div class="alert alert-warning alert-icon alert-close alert-dismissible fade in" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <i class="font-icon font-icon-warning"></i>
                                            El Usuario y/o Contraseña son incorrectos.
                                        </div>
                                    <?php
                                break;

                                case "2";
                                    ?>
                                        <div class="alert alert-warning alert-icon alert-close alert-dismissible fade in" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <i class="font-icon font-icon-warning"></i>
                                            Los campos estan vacios.
                                        </div>
                                    <?php
                                break;
                            }
                        }
                    ?>

                    <div class="form-group">
                        <input type="text" id="usu_nom" name="usu_nom" class="form-control" placeholder="Ingrese su usuario"/>
                    </div>
                    <div class="form-group">
                        <input type="password" id="usu_pass" name="usu_pass" class="form-control" placeholder="Ingrese su contraseña"/>
                    </div>
      
                    <input type="hidden" name="enviar" class="form-control" value="si">
                    <button type="submit" class="btn btn-rounded">Acceder</button>
                </form>
            </div>
        </div>
    </div>

<script src="/reserva/public/js/lib/jquery/jquery.min.js"></script>
<script src="/reserva/public/js/lib/tether/tether.min.js"></script>
<script src="/reserva/public/js/lib/bootstrap/bootstrap.min.js"></script>
<script src="/reserva/public/js/plugins.js"></script>
<script type="text/javascript" src="public/js/lib/match-height/jquery.matchHeight.min.js"></script>
<script> // centrado de login por height
    $(function() {
        $('.page-center').matchHeight({
            target: $('html')
        });

        $(window).resize(function(){
            setTimeout(function(){
                $('.page-center').matchHeight({ remove: true });
                $('.page-center').matchHeight({
                    target: $('html')
                });
            },100);
        });
    });
</script>


</body>
</html>