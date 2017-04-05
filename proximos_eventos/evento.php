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
$vista = new vista();
require_once '../clases/eventos.php';
include '../include/meses.php';
$eventopend = new eventos("chor");

$arrmeta = json_decode($eventopend->geteventopendiente($_GET['id']));
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Próximos Eventos | A taberna da chorima</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php if (isset($arrmeta)): ?>
            <?php foreach ($arrmeta as $value) : ?>
                <?php
                $arrhora = explode(":", $value->hora);
                $arrfecha = explode("-", $value->fecha);
                $dia = $arrfecha[2];
                $mes = $arrfecha[1];
                $mes = getmes($mes);
                $hora = $arrhora[0] . ":" . $arrhora[1];
                ?>
                <meta name="keywords" content="Evento, <?php echo $value->nombre; ?> , <?php echo $value->tipo; ?>, A Taberna da Chorima" />
                <meta name="description" content="A Taberna da Chorima - <?php echo $value->descripcion; ?>" />
                <meta name="date" content="<?php echo $arrfecha[2] . "-" . $arrfecha[1] . "-" . $arrfecha[0]; ?>, <?php echo $value->hora; ?>"/>
                <meta name="Title" content="<?php echo $value->tipo; ?> - <?php echo $value->nombre; ?>"/>
                <meta name="twitter:card" content="<?php echo $value->descripcion; ?>">
                <meta name="twitter:site" content="@tabernachorima">
                <meta name="twitter:title" content="<?php echo $value->nombre; ?>">
                <meta name="twitter:description" content="<?php echo $value->descripcion; ?>">
                <meta name="twitter:creator" content="A taberna da chorima">
                <meta property="fb:app_id" content="301522663516840">
                <meta property="og:title" content="<?php echo $value->tipo; ?> - <?php echo $value->nombre; ?>">
                <meta property="og:url" content="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/proximos_eventos/evento.php?id=" . $value->id; ?>">
                <meta property="og:image" content="http://www.atabernadachorima.es/img-eventos/<?php echo $arrmeta[0]->imagenperfil; ?>">
                <meta property="og:type"  content="website" />
                <meta property="og:description"  content="<?php echo $value->descripcion; ?>" />

                <meta itemprop="name" content="<?php echo $value->nombre; ?>">
                <meta itemprop="description" content="<?php echo $value->descripcion; ?>">
                <meta itemprop="image" content="http://www.atabernadachorima.es/img-eventos/<?php echo $value->imagenperfil; ?>">

            <?php endforeach; ?>
        <?php else : ?>
            <meta name="keywords" content="Eventos, Programación, música, Espectáculos" />
            <meta name="description" content="Na taberna da chorima prográmanse eventos musicais e de outro tipo, segue a nosa web" />

            <meta name="Title" content="Próximos eventos"/>
            <meta name="twitter:card" content="Na taberna da chorima prográmanse eventos musicais e de outro tipo, segue a nosa web">
            <meta name="twitter:site" content="@tabernachorima">
            <meta name="twitter:title" content="A taberna da chorima">
            <meta name="twitter:description" content="Na taberna da chorima prográmanse eventos musicais e de outro tipo, segue a nosa web">
            <meta name="twitter:creator" content="A taberna da chorima">
            <meta property="fb:app_id" content="301522663516840">
            <meta property="og:title" content="A taberna da chorima">
            <meta property="og:url" content="<?php echo "http://" . $_SERVER['HTTP_HOST']; ?>">
            <meta property="og:image" content="http://atabernadachorima.es/images/logo.JPG">
            <meta property="og:type"  content="Eventos" />
            <meta property="og:description"  content="Na taberna da chorima prográmanse eventos musicais e de outro tipo, segue a nosa web" />

            <meta itemprop="name" content="A taberna da chorima">
            <meta itemprop="description" content="Na taberna da chorima prográmanse eventos musicais e de outro tipo, segue a nosa web">
            <meta itemprop="image" content="http://atabernadachorima.es/images/logo.JPG">
        <?php endif; ?>
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
            <div class="container ">

                <div  class="col-lg-12 panel panel-default">

                    <?php foreach ($arrmeta as $value) : ?>
                        <h1 class=" text-center chorimacolor"><b><?php echo $value->nombre; ?></b></h1>
                        <div class="col-lg-12 panel-heading">
                            <h3 class="panel-title text-center"><?php echo $value->tipo; ?></h3>
                        </div>
                        <div class="col-lg-12 panel-body">
                            <div class="col-lg-5"><img class="img-responsive" src="../img-eventos/<?php echo $value->imagenperfil; ?>" alt="<?php echo $value->nombre; ?>" title="<?php echo $value->nombre; ?>"/>
                                <div class=" news-grid-left">
                                    <p><?php echo $dia; ?><span><?php echo $mes; ?></span></p>
                                </div>
                                <div ><h3 class="text-center"><i class="glyphicon glyphicon-time"></i> <?php echo $hora; ?></h3></div>
                            </div>
                            <div class="col-lg-7"><p><?php echo $value->descripcion; ?></p>

                            </div>
                            <div class="col-lg-7 ">
                                <?php if ($value->video != ""): ?>
                                    <div style="margin-top: 1em;">
                                        <iframe  type="text/html" width="100%" height="270"
                                                src="https://www.youtube.com/embed/<?php echo $value->video; ?>"
                                                frameborder="0"></iframe>

                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-12">

                                <?php if ($value->link != ""): ?>
                                    <p class="textoevento" ><a class="linkevento" href="<?php echo $value->link; ?>"><i class="glyphicon glyphicon-new-window"></i> Ver máis sobre <?php echo $value->nombre; ?></a></p>
                                <?php endif; ?>

                            </div>
                        </div>


                    <?php endforeach; ?>


                </div>
                <div class="col-lg-12">
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_google_plus"></a>
                    </div>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>

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
        <!-- //for bootstrap working -->
    </body>
</html>