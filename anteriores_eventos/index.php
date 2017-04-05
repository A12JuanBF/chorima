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
$evento = new eventos("chor");
if (isset($_GET['even'])) {
    $id = $_GET['even'];
} else {
    $id = "default";
}

@$eventofinalizado = json_decode($evento->geteventofinalizado($id));
if(isset($eventofinalizado)){
$arrhora = explode(":", $eventofinalizado[0]->hora);
$arrfecha = explode("-", $eventofinalizado[0]->fecha);
//echo $eventofinalizado[0]->id;
$dia = $arrfecha[2];
$mes = $arrfecha[1];
$mes = getmes($mes);
$year = $arrfecha[0];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php if(isset($eventofinalizado[0])) :?>
        <title><?php echo $eventofinalizado[0]->nombre; ?></title>
        <!-- for-mobile-apps -->
        
        <!--Metas dinámicas -->
        <meta name="keywords" content="Evento, <?php echo $eventofinalizado[0]->nombre; ?> , <?php echo $eventofinalizado[0]->tipo; ?> ,<?php echo  " ".$arrfecha[2] . "-" . $arrfecha[1] . "-" . $arrfecha[0]; ?>" />
        <meta name="description" content="<?php echo $eventofinalizado[0]->descripcion; ?>" />
        <meta name="date" content="<?php echo $arrfecha[2] . "-" . $arrfecha[1] . "-" . $arrfecha[0]; ?>, <?php echo $eventofinalizado[0]->hora; ?>"/>
        <meta name="Title" content="<?php echo $eventofinalizado[0]->nombre; echo " ".$arrfecha[2] . "-" . $arrfecha[1] . "-" . $arrfecha[0];?>"/>
        <meta name="twitter:card" content="<?php echo $eventofinalizado[0]->descripcion; ?>">
        <meta name="twitter:site" content="@tabernachorima">
        <meta name="twitter:title" content="<?php echo $eventofinalizado[0]->nombre; echo " ".$arrfecha[2] . "-" . $arrfecha[1] . "-" . $arrfecha[0];?>">
        <meta name="twitter:description" content="<?php echo $eventofinalizado[0]->descripcion; echo " ".$arrfecha[2] . "-" . $arrfecha[1] . "-" . $arrfecha[0];?>">
        <meta name="twitter:creator" content="A taberna da chorima">
        <meta property="fb:app_id" content="301522663516840">
        <meta property="og:title" content="<?php echo $eventofinalizado[0]->nombre; echo " ".$arrfecha[2] . "-" . $arrfecha[1] . "-" . $arrfecha[0]; ?>">
        <meta property="og:url" content="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/anteriores_eventos/.index.php?even=".$eventofinalizado[0]->id.""; ?>">
        <meta property="og:image" content="http://www.atabernadachorima.es/img-eventos/<?php echo $eventofinalizado[0]->imagenperfil; ?>">
        <meta property="og:type"  content="<?php echo $eventofinalizado[0]->tipo; ?>" />
        <meta property="og:description"  content="<?php echo $eventofinalizado[0]->critica; echo " ".$arrfecha[2] . "-" . $arrfecha[1] . "-" . $arrfecha[0];?>" />

        <meta itemprop="name" content="<?php echo $eventofinalizado[0]->nombre; ?>">
        <meta itemprop="description" content="<?php echo $eventofinalizado[0]->descripcion; ?>">
        <meta itemprop="image" content="http://www.atabernadachorima.es/img-eventos/<?php echo $eventofinalizado[0]->imagenperfil; ?>">

        <?php        endif; ?>
        <!--Fin, Metas dinámicas -->
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

        <script src="../js/idioma.js"></script>

        <!-- //js -->
        <link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css" href="../pluginimg/css/style.css" />
        <link rel="stylesheet" type="text/css" href="../pluginimg/css/elastislide.css" />
        <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css' />

        <noscript>
        <style>
            .es-carousel ul{
                display:block;
            }
        </style>
        </noscript>
        <script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
            <div class="rg-image-wrapper">
            {{if itemsCount > 1}}
            <div class="rg-image-nav">
            <a href="#" class="rg-image-nav-prev">Previous Image</a>
            <a href="#" class="rg-image-nav-next">Next Image</a>
            </div>
            {{/if}}
            <div class="rg-image"></div>
            <div class="rg-loading"></div>
            <div class="rg-caption-wrapper">
            <div class="rg-caption" style="display:none;">
            <p></p>
            </div>
            </div>
            </div>
        </script>
        <?php $vista->googleanalitycs("default"); ?>
    </head>

    <body>

        <!-- header -->
        <?php
        $vista->cabecera("default");
        ?>
        <!-- //header -->
        <!-- single -->
        <div class="single">
            <?php ?>
            <div class="container">
                <div class="col-lg-9 proxevent">
                    <?php if(isset($eventofinalizado[0])) :?>
                    <h3><?php echo $eventofinalizado[0]->nombre ?></h3>
                    <div class="single-left">
                        <p><?php echo evenantedia; ?><span><?php echo $dia; ?> de <?php echo $mes; ?>, <?php echo $year; ?></span></p>
                        <img src="../img-eventos/<?php echo $eventofinalizado[0]->imagenperfil ?>" alt="<?php echo $eventofinalizado[0]->nombre ?>" title="<?php echo $eventofinalizado[0]->nombre ?>" class="img-responsive" />
                    </div>
                    <div class="single-right">
                        <h4><?php echo tipoevento; ?><?php echo $eventofinalizado[0]->tipo ?></h4>
                        <p><?php echo nl2br($eventofinalizado[0]->critica); ?></p>
                        <?php
                        if ($eventofinalizado[0]->link != "") {
                            echo "<p><a href='" . $eventofinalizado[0]->link . "'><i class='glyphicon glyphicon-new-window'></i> Ver máis sobre " . $eventofinalizado[0]->nombre . "</a></p>";
                        }
                        ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-3">
                    <?php $vista->contactoartista(); ?>
                </div>
                <div class="col-lg-3">

                    <div class="col-lg-12 chrotwit hidden-sm hidden-xs">
                        <?php
                        $vista->twitter();
                        ?> 

                    </div>

                </div>
                <div class="clearfix"> </div>

                <!-- AddToAny BEGIN -->
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_google_plus"></a>
                </div>
                <script async src="https://static.addtoany.com/menu/page.js"></script>
                <div class="tags-cate col-lg-12">
                    <!-- Carrusel de immágenes -->
                    <?php if(isset($eventofinalizado[0])) :?>
                    <?php if ($eventofinalizado[0]->imagen1 != "" || $eventofinalizado[0]->imagen2 != "" || $eventofinalizado[0]->imagen3 != "" || $eventofinalizado[0]->imagen4 != "") : ?>
                        <div  id="rg-gallery" class="rg-gallery">
                            <div class="rg-thumbs">
                                <!-- Elastislide Carousel Thumbnail Viewer -->
                                <div class="es-carousel-wrapper">
                                    <div class="es-nav">
                                        <span class="es-nav-prev">Anterior</span>
                                        <span class="es-nav-next">Seguinte</span>
                                    </div>
                                    <div class="es-carousel">
                                        <ul>
                                            <!--<li><a href="#"><img src="../pluginimg/images/thumbs/1.jpg" data-large="../pluginimg/images/1.jpg" alt="image01" data-description="From off a hill whose concave womb reworded" /></a></li>-->
                                            <?php
                                            if ($eventofinalizado[0]->imagen1 != "") {
                                                echo "<li><a href='#'><img class='img-responsive' src='../img-eventos/" . $eventofinalizado[0]->imagen1 . "' data-large='../img-eventos/" . $eventofinalizado[0]->imagen1 . "' alt=''../img-eventos/" . $eventofinalizado[0]->imagen1 . "''  /></a></li>";
                                            }
                                            if ($eventofinalizado[0]->imagen2 != "") {
                                                echo "<li><a href='#'><img class='img-responsive' src='../img-eventos/" . $eventofinalizado[0]->imagen2 . "' data-large='../img-eventos/" . $eventofinalizado[0]->imagen2 . "' alt=''../img-eventos/" . $eventofinalizado[0]->imagen2 . "''  /></a></li>";
                                            }
                                            if ($eventofinalizado[0]->imagen3 != "") {
                                                echo "<li><a href='#'><img class='img-responsive' src='../img-eventos/" . $eventofinalizado[0]->imagen3 . "' data-large='../img-eventos/" . $eventofinalizado[0]->imagen3 . "' alt=''../img-eventos/" . $eventofinalizado[0]->imagen3 . "''  /></a></li>";
                                            }
                                            if ($eventofinalizado[0]->imagen4 != "") {
                                                echo "<li><a href='#'><img class='img-responsive' src='../img-eventos/" . $eventofinalizado[0]->imagen4 . "' data-large='../img-eventos/" . $eventofinalizado[0]->imagen4 . "' alt=''../img-eventos/" . $eventofinalizado[0]->imagen4 . "''  /></a></li>";
                                            }
                                            if ($eventofinalizado[0]->imagenperfil != "") {
                                                echo "<li><a href='#'><img src='../img-eventos/" . $eventofinalizado[0]->imagenperfil . "' data-large='../img-eventos/" . $eventofinalizado[0]->imagenperfil . "' alt=''../img-eventos/" . $eventofinalizado[0]->imagenperfil . "''  /></a></li>";
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                </div>
                                <!-- End Elastislide Carousel Thumbnail Viewer -->
                            </div><!-- rg-thumbs -->
                        </div><!-- rg-gallery -->
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="three-com">
                    <?php $vista->getdisqus(); ?>
                </div>
                <div class="leave-comment">
                    <!-- Disqus ??? -->
                </div>
            </div>
            <div class="container">
                <?php
                if (!isset($_GET['even'])) {
                    @$id = $eventofinalizado[0]->id;
                } else {
                    $id = $_GET['even'];
                }
                @$pagina = json_decode($evento->paginareventos($id));
                ?>
                <ul class="pagination">
                    <?php if(isset($pagina)) :?>
                    <?php foreach ($pagina as $key => $value): ?>

                        <li><a class="chorimacolor" href="index.php?even=<?php echo $value->id; ?>"><?php
                                if ($key == 'Siguiente') {
                                    echo $key . "&raquo";
                                } if ($key == 'Anterior') {
                                    echo "&laquo" . $key;
                                }
                                ?></a></li>

                    <?php endforeach; ?>
                        <?php endif; ?>
                </ul>
            </div>
        </div>
        <!-- //single -->
        <!--- footer --->
        <?php
        $vista->pie();
        ?>
        <!--- //footer --->
        <!-- for bootstrap working -->
        <script src="../js/bootstrap.js"></script>
        <!-- //for bootstrap working -->

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript" src="../pluginimg/js/jquery.tmpl.min.js"></script>
        <script type="text/javascript" src="../pluginimg/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="../pluginimg/js/jquery.elastislide.js"></script>
        <script type="text/javascript" src="../pluginimg/js/gallery.js"></script>
    </body>
</html>