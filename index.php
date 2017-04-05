<!--
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
if (!isset($_SESSION['lang'])) {
    require_once 'include/lenguagl.php';
}
if (isset($_SESSION['lang']) && $_SESSION['lang'] == "es") {
    require_once 'include/lenguaes.php';
}
if (isset($_SESSION['lang']) && $_SESSION['lang'] == "gl") {
    require_once 'include/lenguagl.php';
}
if (isset($_SESSION['lang']) && $_SESSION['lang'] == "en") {
    require_once 'include/lenguaen.php';
}

include 'vista/vista.php';
require_once 'clases/eventos.php';
$vista = new vista();
$eventoult = new eventos("chor");
$ideven = json_decode($eventoult->geteventofinalizado("default"));
?>
<!DOCTYPE html>
<html>
    <head>
        <title>A taberna da chorima</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!--Llamar a vista para las metas genéricas -->
        <?php $vista->getmeta("inicio"); ?>

        <?php $vista->geticon("inicio"); ?>


        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

        <link href="css/assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/assets/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />

        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/movingboxes.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="css/pluginstyle.css" />
        <link rel="stylesheet" type="text/css" href="pluginimg/css/elastislide.css" />
        <!-- js -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/cookiesmensaje.js"></script>
        <script >
            $(document).ready(function() {
            $(".idiomas").on("click", function(e) {
            e.preventDefault();
            idioma = $(this).attr('name');
            dest = "include/lengua.php";
            param = {
            "idioma": idioma

            };


            $.ajax({
            url: dest,
            data: param,
            type: 'POST',
            beforeSend: function() {

            //$("#contenedor_respuesta").html("Procesando, espere por favor...");

            },
            success: function(respuesta) {


            location.reload();

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
            }
            });
            });

            });

        </script>
        <script src="js/suscrip.js"></script>
        <script src="js/jquery.cookie.js"></script>
        <script src="js/jquery.movingboxes.js"></script>
        <script type="text/javascript" src="pluginimg/js/jquery.tmpl.min.js"></script>
        <script type="text/javascript" src="pluginimg/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="pluginimg/js/jquery.elastislide.js"></script>
        <script type="text/javascript" src="pluginimg/js/gallery.js"></script>

        <!-- //js -->
        <link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>

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
        <?php $vista->googleanalitycs("inicio"); ?>
    </head>


    <body>
        <div id="overbox3">
            <div id="infobox3">
                <p>Esta web utiliza cookies para obtener datos estadísticos de la navegación de sus usuarios. Si continúas navegando consideramos que aceptas su uso.
                    <a href="politica-privacidad/" rel="nofollow">Más información</a>
                    <a id="mensajecookies" style="cursor:pointer;">Cerrar</a></p>
            </div>
        </div>
        <!-- header -->
        <?php
        $directoryURI = $_SERVER['PHP_SELF'];

        if ($directoryURI == "/carta/index.php") {
            $resturante = " ";
            $carta = "active";
            $galeria = " ";
            $contacto = " ";
            $proxeven = " ";
            $anteven = " ";
        } elseif ($directoryURI == "/contacto/index.php") {
            $resturante = " ";
            $carta = " ";
            $galeria = " ";
            $contacto = "active";
            $proxeven = " ";
            $anteven = " ";
        } elseif ($directoryURI == "/galeria/index.php") {
            $resturante = " ";
            $carta = " ";
            $contacto = " ";
            $galeria = "active";
            $proxeven = " ";
            $anteven = " ";
        } elseif ($directoryURI == "/proximos_eventos/index.php") {
            $resturante = " ";
            $carta = " ";
            $contacto = " ";
            $galeria = " ";
            $proxeven = "active";
            $anteven = " ";
        } elseif ($directoryURI == "/anteriores_eventos/index.php") {
            $resturante = " ";
            $carta = " ";
            $contacto = " ";
            $galeria = " ";
            $proxeven = " ";
            $anteven = "active";
        } elseif ($directoryURI == "/index.php") {
            $resturante = "active";
            $carta = " ";
            $contacto = " ";
            $galeria = " ";
            $proxeven = " ";
            $anteven = " ";
        }
        ?>

        <div class="header">
            <div class="container">
                <div class="header-nav">
                    <div class="row"><div  class="pull-right"><a  class="idiomas" name="gl" href="#" rel="nofollow">Galego</a><a class="idiomas" name="es" href="#" rel="nofollow">Español</a><a class="idiomas" name="en" href="#" rel="nofollow">English</a></div></div>
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display --> 
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="col-md-12 col-xs-12 col-sm-12 hidden-lg"  href="/"><img class="img-responsive " src="http://www.atabernadachorima.es/images/logo.jpg" title="A taberna da chorima" alt="A taberna da chorima logo"/></a>    
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                            <a id="logo" class="col-lg-3 " href="/"><img class="img-responsive hidden-md hidden-sm hidden-xs" src="http://www.atabernadachorima.es/images/logo.jpg" title="A taberna da chorima" alt="A taberna da chorima logo"/></a>
                            <ul class="nav navbar-nav">
                                <li class="hvr-bounce-to-bottom <?php echo $resturante; ?>" ><a href="/"><?php echo nav_inicio ?> </a></li>

                                <li class="hvr-bounce-to-bottom <?php echo $carta; ?>"><a href="/carta/"><?php echo nav_carta ?></a></li>
                                <li class="hvr-bounce-to-bottom <?php echo $proxeven; ?>"><a href="/proximos_eventos/"><?php echo nav_prox ?></a></li>
                                <li class="hvr-bounce-to-bottom <?php echo $anteven; ?>"><a href="/anteriores_eventos/index.php?even=<?php echo $ideven[0]->id; ?>"><?php echo nav_ult ?></a></li>
                                <li class="hvr-bounce-to-bottom <?php echo $contacto; ?>"><a href="/contacto/"><?php echo nav_contacto ?></a></li>
                                <li id="vermas" class="fondoactive dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown"><?php echo nav_ver ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li ><a href="/galeria/"><?php echo nav_sobrenosotros ?></a></li>
                                        <li ><a href="/ofertas/"><?php echo nav_ofertas ?></a></li>

                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /navbar-collapse -->
                    </nav>
                </div>
            </div>
        </div>

        <!-- //header -->
        <!-- banner -->
        <div class="banner">
            <!-- Slider-starts-Here -->
            <script src="js/responsiveslides.min.js"></script>
            <script>
                // You can also use "$(window).load(function() {"
                $(function() {
                // Slideshow 4
                $("#slider3").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 3000,
                namespace: "callbacks",
                before: function() {
                $('.events').append("<li>before event fired.</li>");
                },
                after: function() {
                $('.events').append("<li>after event fired.</li>");
                }
                });



                });
            </script>
            <!--//End-slider-script -->
            <div  id="top" class="callbacks_container">
                <ul class="rslides" id="slider3">
                    <li>
                        <div class="banner-info">
                            <div class="baner-inf">
                                <h1><?php echo cuadro1inicioH; ?></h1>
                                <p><?php echo cuadro1inicio; ?></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="banner-info1">
                            <div class="baner-inf">
                                <h1><?php echo cuadro2inicioH; ?></h1>
                                <p><?php echo cuadro2inicio; ?></p>
                                <p><a href="https://twitter.com/tabernachorima"><span class="fa fa-twitter-square socialindex"></span></a>  <a href="https://www.facebook.com/A-taberna-da-Chorima-301522663516840/"><span class="fa fa-facebook-official socialindex"></span></a> <a href="#"><span class="fa fa-google-plus-square socialindex"></span></a></p>
                            </div>

                        </div>
                    </li>
                    <li>
                        <div class="banner-info2">
                            <div class="baner-inf">
                                <h1><?php echo cuadro3inicioH; ?></h1>
                                <p><?php echo cuadro3inicio; ?></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
        <!-- //banner -->
        <!-- banner-bottom1 -->
        <div class="banner-bottom1">
            <div class="container">
                <h3><?php echo bienvenidainicio; ?></h3>
                <div class="banner-bottom1-grids">
                    <div class="col-md-4 banner-bottom1-grid">
                        <img class="img-thumbnail img-rounded" src="images/CHORIMA-SANTIAGO-04.png" alt="Pasillo" title="Chorima pasillo" class="img-responsive" />
                    </div>
                    <div class="col-md-8 banner-bottom1-grid">
                        <h4><?php echo bienvenidoinicioh4; ?></h4>
                        <p><?php echo bienvenidoiniciop; ?></p>
                        <div class="more">
                            <a href="galeria/"><?php echo nav_sobrenosotros; ?></a>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <!-- //banner-bottom1 -->
        <!-- newsletter -->
        <div class="newsletter">
            <div class="container">
                <div class="get-in-grids">
                    <div class="row" style="margin-bottom:1em;">
                        <h2 class="text-center"><?php echo ofertabenvida; ?></h2>
                        <h4 class="text-center"><?php echo ofertabenvtexto; ?></h4>
                        <p class="text-center"><?php echo ofertaopcion1; ?></p>
                        <p class="text-center"><?php echo ofertao; ?></p>
                        <p class="text-center"><?php echo ofertaopcion2; ?></p>
                    </div>
                    <div class="get-in-grid-left">

                        <p ><?php echo subscripcion; ?></p>
                        <div id="loadsuscrip" style="width:25%; margin: 0 auto; display: none;">
                            <img class="img-responsive" src="images/load.gif" />
                        </div>
                    </div>
                    <div  class="get-in-grid-right">
                        <form  id="suscrip">

                            <input type="email" placeholder="<?php echo subscripcioninput; ?>" required/>
                            <input  type="submit" value="<?php echo subscripcionbutton; ?>" >
                            <div class="checkbox">
                                <label><input type="checkbox" value="" required><?php echo aceptarcondiciones; ?></label>
                            </div>

                        </form>
                        <small><a  class="chorimacolor" href="condiciones/"><?php echo subscripcionlink; ?></a></small>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="container">
                <div id="promocionindex">
                    <h3 class="text-center"><?php echo tituloh; ?></h3>
                    <p class="text-center"><?php echo descripcionp; ?></p>
                    <div style="margin-top:2em; margin-bottom: 2em" class="row">
                        <p class="text-center" ><a href="ofertas/"><?php echo linkofertas; ?></a></p>
                    </div>




                    <div class="clearfix"> </div>





                </div>

            </div>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8&appId=1199235446805985";
                fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            <div class="container" style="margin-bottom:1em;">
                <div class="text-center" style="margin-bottom:1em;">

                    <div class="fb-post" data-href="https://www.facebook.com/tabernadachorima/posts/423751061293999" data-width="700" data-show-text="true"><blockquote cite="https://www.facebook.com/tabernadachorima/posts/423751061293999" class="fb-xfbml-parse-ignore"><p>S&#xf3; valido para pedidos da carta ou men&#xfa;s especiais a partir de 25&#x20ac; at&#xe9; un m&#xe1;ximo de 300&#x20ac;. Oferta v&#xe1;lida s&#xf3; a trav&#xe9;s do servizo web para canxear na Taberna da Chorima.</p>Posted by <a href="https://www.facebook.com/tabernadachorima/">A taberna da Chorima</a> on&nbsp;<a href="https://www.facebook.com/tabernadachorima/posts/423751061293999">viernes, 17 de febrero de 2017</a></blockquote></div>



                </div>

                <div class="text-center" style="margin-bottom:1em;"> 

                    <!--Oferta de facebook insertar con html   -->


                    <div class="fb-post" data-href="https://www.facebook.com/tabernadachorima/posts/422336698102102" data-width="700" data-show-text="true"><blockquote cite="https://www.facebook.com/tabernadachorima/posts/422336698102102" class="fb-xfbml-parse-ignore"><p>Un vermut de La Galaica por 2 euros!!</p>Posted by <a href="https://www.facebook.com/tabernadachorima/">A taberna da Chorima</a> on&nbsp;<a href="https://www.facebook.com/tabernadachorima/posts/422336698102102">miércoles, 15 de febrero de 2017</a></blockquote></div>

                    <!--Oferta de facebook insertar con html   -->

                </div>
            </div>
        </div>

    </div>
    <!-- //newsletter -->
    <!-- news -->
    <div class="news">
        <?php
        $vista->eventosinicio();
        ?>
    </div>
    <!-- //news -->
    <!-- customer -->
    <div class="customer">
        <div class="container">

            <div class="customer-grids">
                <!-- MovingBoxes Slider -->
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

                                    <li><a href="#"><img src="images/CHORIMA-SANTIAGO-06.png" data-large="images/CHORIMA-SANTIAGO-06.png" alt="Muro barra" data-description="A nosa taberna" /></a></li>

                                    <li><a href="#"><img src="images/CHORIMA-SANTIAGO-08.png" data-large="images/CHORIMA-SANTIAGO-08.png" alt="" data-description="A nosa taberna" /></a></li>

                                    <li><a href="#"><img src="images/CHORIMA-SANTIAGO-09.png" data-large="images/CHORIMA-SANTIAGO-09.png" alt="" data-description="A nosa taberna" /></a></li>
                                    <li><a href="#"><img src="images/plato.JPG" data-large="images/plato.JPG" alt="" data-description="A nosa taberna" /></a></li>
                                    <li><a href="#"><img src="images/CHORIMA-SANTIAGO-11.png" data-large="images/CHORIMA-SANTIAGO-11.png" alt="" data-description="A nosa taberna" /></a></li>
                                    <li><a href="#"><img src="images/CHORIMA-SANTIAGO-01.png" data-large="images/CHORIMA-SANTIAGO-01.png" alt="" data-description="A nosa taberna" /></a></li>
                                    <li><a href="#"><img src="images/CHORIMA-SANTIAGO-16.png" data-large="images/CHORIMA-SANTIAGO-16.png" alt="" data-description="A nosa taberna" /></a></li>
                                    <li><a href="#"><img src="images/CHORIMA-SANTIAGO-19.png" data-large="images/CHORIMA-SANTIAGO-19.png" alt="" data-description="A nosa taberna" /></a></li>
                                    <li><a href="#"><img src="images/banner2.JPG" data-large="images/banner2.JPG" alt="" data-description="A nosa taberna" /></a></li>
                                    <li><a href="#"><img src="images/banner.JPG" data-large="images/banner.JPG" alt="" data-description="A nosa taberna" /></a></li>

                                    <li><a href="#"><img src="images/CHORIMA-SANTIAGO-13.png" data-large="images/CHORIMA-SANTIAGO-13.png" alt="" data-description="A taberna da chorima" /></a></li>
                                    <li><a href="#"><img src="images/CHORIMA-SANTIAGO-15.png" data-large="images/CHORIMA-SANTIAGO-15.png" alt="" data-description="A nosa taberna" /></a></li>
                                    <li><a href="#"><img src="images/CHORIMA-SANTIAGO-04.png" data-large="images/CHORIMA-SANTIAGO-04.png" alt="" data-description="A taberna da chorima" /></a></li>
                                    <li><a href="#"><img src="images/banner1.JPG" data-large="images/banner1.JPG" alt="" data-description="A nosa taberna" /></a></li>

                                    <li><a href="#"><img src="images/CHORIMA-SANTIAGO-14.png" data-large="images/CHORIMA-SANTIAGO-14.png" alt="" data-description="A nosa taberna" /></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Elastislide Carousel Thumbnail Viewer -->
                    </div><!-- rg-thumbs -->
                </div><!-- rg-gallery -->

            </div>
        </div>
    </div>
    <!-- //customer -->
    <!--- footer --->
    <div class="footer">
        <div class="container">
            <div class="footer-grids">
                <div class="col-md-3 footer-grid">
                    <h3>A taberna da chorima</h3>
                    <p><?php echo piedescripcion; ?></p>
                </div>
                <div class="col-md-3 footer-grid">
                    <h3><?php echo nav_ult; ?></h3>
                    <?php $vista->geteventosfinalizados("inicio"); ?>

                </div>
                <div class="col-md-3 footer-grid">
                    <h3><?php echo pielinks; ?></h3>
                    <ul>
                        <li><a  href="http://galeguesa.com/index.php?lang=es">A Galeguesa</a></li>
                        <li><a href="https://www.gulagalega.com/">A Gula Galega</a></li>
                        <li><a href="http://www.ladestileriadelasideas.com/">La Destilería de las ideas</a></li>
                        <li><a href="http://cervexanasa.com/">Cervexa NASA</a></li>

                    </ul>
                </div>
                <div class="col-md-3 footer-grid">
                    <h3><?php echo piecontacto; ?></h3>
                    <p>Rúa do Vilar 47</p>
                    <p>Santiago de Compostela</p>
                    <p>C.P - 15704</p>
                    <div class="footer-grid-address">
                        <p>Tel. 981 56 13 45</p>


                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <div class="clear"> </div>
    <div class="copy-right">
        <p>A taberna da chorima © 2016.  | <a href="https://twitter.com/tabernachorima"><span class="fa fa-twitter"></span></a>  <a href="https://www.facebook.com/A-taberna-da-Chorima-301522663516840/"><span class="fa fa-facebook"></span></a>  <a href="#"><span class="fa fa-google-plus"></span></a>

        </p>
    </div>


    <!--- //footer --->
    <!-- for bootstrap working -->
    <script src="js/bootstrap.js"></script>

    <!-- //for bootstrap working -->
</body>
</html>