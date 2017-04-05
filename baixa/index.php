<?php
session_start();
if (!isset($_SESSION['lang'])) {
    require_once '../include/lenguagl.php';
}
if (isset($_SESSION['lang']) && $_SESSION['lang'] == "es") {
    require_once '../include/lenguaes.php';
}
if (isset($_SESSION['lang']) && $_SESSION['lang'] == "gl") {
    require_once '../include/lenguagl.php';
}
if (isset($_SESSION['lang']) && $_SESSION['lang'] == "en") {
    require_once '../include/lenguaen.php';
}
include '../vista/vista.php';
require_once '../clases/eventos.php';
require_once '../clases/clientes.php';

$vista = new vista();
$cliente = new clientes("chor");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Baixa | A taberna da chorima</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--Llamar a vista para las metas genéricas -->
        <?php $vista->getmeta("default"); ?>
        <?php $vista->geticon("default"); ?>

        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

        <link href="../css/assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../css/assets/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />

        <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- js -->
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../js/cookiesmensaje.js"></script>
        <script src="../js/idioma.js"></script>
        <script src="../js/jquery.cookie.js"></script>

        <!-- //js -->
        <link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <?php $vista->googleanalitycs("default"); ?>
    </head>

    <body>
        <?php
        $vista->mensajecookies();
        ?>
        <!-- header -->
        <?php
        $vista->cabecera("default");
        ?>
        <!-- //header -->
        <!-- typo -->
        <div class="typo">
            <div class="container">
                <div class="row" style="margin-bottom: 2em;">
                    <h2 class="text-center"><?php echo baixah; ?></h2>
                    <p class="text-center"><?php echo baixatexto; ?></p>
                </div>
                <div class="col-md-4 col-md-offset-4 col-xs-11">
                    <form>
                        <div class="form-group">
                            <input class="form-control" placeholder="<?php echo baixainput; ?>"/>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><?php echo baixaboton; ?></button>
                        </div>
                    </form>
                    <img id="load2"  style="width: 30%;" src="../images/load.gif" alt="loading" title="loading"/>
                    <div id="mensaje">

                    </div>
                </div>
            </div>
        </div>	
        <!-- //typo -->
        <!--- footer --->
        <?php
        $vista->pie();
        ?>
        <!--- //footer --->
        <!-- for bootstrap working -->
        <script src="../js/bootstrap.js"></script>
        <script>
            $("form").submit(function(e) {
                e.preventDefault();

                dest = "../include/peticion.php?op=5";
                param = {
                    "email": $("form input").val()

                };
                $.ajax({
                    url: dest,
                    data: param,
                    type: 'POST',
                    beforeSend: function() {
                        $("#mensaje").html("");
                        $("#load2").fadeIn();


                    },
                    success: function(respuesta) {
                        $("form input").val("");
                        $("#load2").hide();
                        $("#mensaje").html(respuesta);


                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus);
                        alert("Error: " + errorThrown);
                    }
                });

            });
        </script>
        <!-- //for bootstrap working -->
    </body>
</html>