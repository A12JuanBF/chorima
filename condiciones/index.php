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
include '../clases/eventos.php';
include '../include/meses.php';
$vista = new vista();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Política de cookies</title>
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
    </head>

    <body>

        <!-- header -->
        <?php
        $vista->cabecera("default");
        ?>
        <!-- //header -->
        <!-- typo -->
        <div class="typo">
            <div class="container ">
                <div class="text-justify">
                   <h3>PROTECCIÓN DE DATOS</h3><p>De conformidad con lo establecido en el Art. 5 de la Ley Orgánica 15/1999 de diciembre de Protección de Datos de Carácter Personal, por el que se regula el derecho de información en la recogida de datos le informamos de los siguientes extremos:</p>"
                    <ul>
                        <li>Los datos de carácter personal que nos ha suministrado en esta y otras comunicaciones mantenidas con usted serán objeto de tratamiento en los ficheros responsabilidad de <b>ESUGANI S.L.</b></li>"
                        <li>La finalidad del tratamiento es la de gestionar de forma adecuada la prestación del servicio que nos ha requerido. Asimismo estos datos no serán cedidos a terceros, salvo las cesiones legalmente permitidas.</li>"
                        <li>Los datos solicitados a través de esta y otras comunicaciones son de suministro obligatorio para la prestación del servicio. Estos son adecuados, pertinentes y no excesivos.</li>"
                        <li>Su negativa a suministrar los datos solicitados implica la imposibilidad prestarle el servicio.</li>"
                        <li>Asimismo, le informamos de la posibilidad de ejercitar los correspondiente derechos de acceso, rectificación, cancelación y oposición de conformidad con lo establecido en la Ley 15/1999 ante ESUGANI S.L. como responsables del fichero. Los derechos mencionados los puede ejercitar a través de los siguientes medios: <a href='http://atabernadachorima.es/baja/'>haga click aquí</a> </li>
                    </ul>
                   <br>
                    




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
        <script src="../js/bootstrap.js"> </script>
        <!-- //for bootstrap working -->
    </body>
</html>