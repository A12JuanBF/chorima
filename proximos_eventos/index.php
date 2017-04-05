<?php
session_start();
if(!isset($_SESSION['lang'])){
    require_once   '../include/lenguagl.php';
}
if(isset($_SESSION['lang']) && $_SESSION['lang']=="es"){
    require_once  '../include/lenguaes.php';
}
if(isset($_SESSION['lang']) && $_SESSION['lang']=="gl"){
    require_once  '../include/lenguagl.php';
}
if(isset($_SESSION['lang']) && $_SESSION['lang']=="en"){
    require_once  '../include/lenguaen.php';
}
include '../vista/vista.php';
$vista = new vista();
require_once  '../clases/eventos.php';
include '../include/meses.php';
$meta = new eventos("chor");
$posi = 0;
$arrmeta = json_decode($meta->geteventos(1));
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Próximos Eventos | A taberna da chorima</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php if (isset($arrmeta)): ?>
            <?php foreach (@$arrmeta as $value): ?>
                <?php
                $arrhora = explode(":", $value->hora);
                $arrfecha = explode("-", $value->fecha);
                //echo $eventofinalizado[0]->id;
                $dia = $arrfecha[2];
                $mes = $arrfecha[1];
                
                $year = $arrfecha[0];
                ?>
                <meta name="keywords" content="Evento, <?php echo $value->nombre; ?> , <?php echo $value->tipo; ?>" />
                <meta name="description" content="<?php echo $value->descripcion; ?>" />
                <meta name="date" content="<?php echo $arrfecha[2] . "-" . $arrfecha[1] . "-" . $arrfecha[0]; ?>, <?php echo $value->hora; ?>"/>
                <meta name="Title" content="<?php echo $value->nombre; ?>"/>
                <meta name="twitter:card" content="<?php echo $value->descripcion; ?>">
                <meta name="twitter:site" content="@tabernachorima">
                <meta name="twitter:title" content="<?php echo $value->nombre; ?>">
                <meta name="twitter:description" content="<?php echo $value->descripcion; ?>">
                <meta name="twitter:creator" content="A taberna da chorima">
                <meta property="fb:app_id" content="301522663516840">
                <meta property="og:title" content="<?php echo $value->nombre; ?>">
                <meta property="og:url" content="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
                <meta property="og:image" content="http://www.atabernadachorima.es/img-eventos/<?php echo $value->imagenperfil; ?>">
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
                <meta property="og:url" content="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
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
                <div class="col-lg-9">
                <h2 class="text-center"><i class="glyphicon glyphicon-calendar"></i> <?php echo agendacultural; ?></h2>
                </div>
                <div  class="col-lg-9 proxevent">
                    
                    <?php
                    $vista->eventos();
                    ?>
                </div>
                <div class="col-lg-3">
                    <?php
                    $vista->contactoartista();
                    ?>
                </div>
                <div class="col-lg-3 twitter-timeline chrotwit hidden-sm hidden-xs">
                    <?php
                    $vista->twitter();
                    ?>
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