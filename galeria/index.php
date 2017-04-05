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
$vista = new vista();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Galería | A taberna da chorima</title>
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
        <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
        <script src="../js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

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
        <!-- about -->
        <div class="about">
            <div class="container">
                <h3><?php echo bienvenidogaleria; ?></h3>
                <p class="eum"><?php echo galeriabienvenidop; ?></p>
                <div class="fig-text">
                    <img id="equipoimg" class=" img-responsive" src="../images/equipo.jpg" alt="Susana" class="img-responsive" />
                    <p><?php echo galeriabienvenidop2; ?></p>
                </div>
                <div id="redescociales" class="col-lg-12">
                    
                        <div class="col-md-12 history-left">
                            <div class="history-left-grid">
                                <div class="row">
                                    <a href="http://www.ladestileriadelasideas.com/"><img class=" col-lg-2 col-lg-offset-5 col-md-6 col-xs-6 col-sm-6 img-responsive pull-left" src="../images/ideas.jpg"/></a>

                                </div>
                                <h4 class="text-center"><a href="http://www.ladestileriadelasideas.com/">La destilería de las ideas</a></h4>
                                
                                <p class="aut"><?php echo destileriatexto1; ?></p>
                                
                                <!--<img src="../images/GALAICA.jpg" class="col-lg-2 pull-right hidden-xs hidden-sm img-thumbnail"  title="La Galaica" alt="La Galaica"/>-->
                                <p class="aut"><?php echo destileriatexto2; ?></p>
                                <p class="aut chorimacolor"><i class="glyphicon glyphicon-new-window"></i> <a class="chorimacolor" href="http://www.ladestileriadelasideas.com/" target="_blank">La Destilería de las ideas</a></p>

                            </div>
                        </div>
                        <div class="col-md-12 history-left">
                            <div class="history-left-grid">
                                <div class="row">
                                    <a href=""><img class=" col-lg-2 col-lg-offset-5 col-md-6 col-xs-6 col-sm-6 img-responsive pull-left" src="../images/nasa.png"/></a>

                                </div>
                                <h4 class="text-center"><a href="http://cervexanasa.com/">Cervexa NASA</a></h4>
                                
                                <p class="aut"><?php echo nasatexto1; ?></p>
                                
                                
                                <p class="aut"><?php echo nasatexto2; ?></p>
                                <p class="aut"><?php echo nasatexto3; ?></p>
                                <p class="aut"><?php echo nasatexto4; ?></p>
                                <p class="aut chorimacolor"><i class="glyphicon glyphicon-new-window"></i> <a class="chorimacolor" href="http://cervexanasa.com/" target="_blank">NASA</a></p>

                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="advantages">
            <div class="container">
                <h3><?php echo imagenesgaleria; ?></h3>
                <div class="our-advantages-grids">
                    <ul class="gallery clearfix">

                        <li class="col-lg-4"><a href="../images/fuera.JPG" rel="prettyPhoto"><img class="img-responsive img-thumbnail" src="../images/fuera.JPG"  alt="" title=""/></a></li>
                        <li class="col-lg-4"><a href="../images/CHORIMA-SANTIAGO-06.png" rel="prettyPhoto"><img class="img-responsive img-thumbnail" src="../images/CHORIMA-SANTIAGO-06.png"  alt="" title=""/></a></li>
                        <li class="col-lg-4"><a href="../images/comedor.JPG" rel="prettyPhoto"><img class="img-responsive img-thumbnail" src="../images/comedor.JPG"  alt="" title=""/></a></li>
                        <li class="col-lg-4"><a href="../images/CHORIMA-SANTIAGO-16.png" rel="prettyPhoto"><img class="img-responsive img-thumbnail" src="../images/CHORIMA-SANTIAGO-16.png"  alt="" title=""/></a></li>

                        <li class="col-lg-4"><a href="../images/CHORIMA-SANTIAGO-04.png" rel="prettyPhoto"><img class="img-responsive img-thumbnail" src="../images/CHORIMA-SANTIAGO-04.png"  alt="" title=""/></a></li>
                        <li class="col-lg-4"><a href="../images/plato.JPG" rel="prettyPhoto"><img class="img-responsive img-thumbnail" src="../images/plato.JPG"  alt="" title=""/></a></li>
                        <li class="col-lg-4"><a href="../images/CHORIMA-SANTIAGO-08.png" rel="prettyPhoto"><img class="img-responsive img-thumbnail" src="../images/CHORIMA-SANTIAGO-08.png"  alt="" title=""/></a></li>
                        <li class="col-lg-4"><a href="../images/CHORIMA-SANTIAGO-09.png" rel="prettyPhoto"><img class="img-responsive img-thumbnail" src="../images/CHORIMA-SANTIAGO-09.png"  alt="" title=""/></a></li>
                        <li class="col-lg-4"><a href="../images/CHORIMA-SANTIAGO-11.png" rel="prettyPhoto"><img class="img-responsive img-thumbnail" src="../images/CHORIMA-SANTIAGO-11.png"  alt="" title=""/></a></li>
                    </ul>


                    <div class="clearfix"> </div>
                </div>

            </div>
        </div>
        <div class="history">
            <div class="container">
                <div class="col-md-12 history-left">
                    <div class="history-left-grid">
                        <div class="row">
                            <a href="http://www.gulagalega.com/"><img class=" col-lg-2 col-lg-offset-5 col-md-6 col-xs-6 col-sm-6 img-responsive pull-left" src="../images/gulagalega.jpg"/></a>

                        </div>
                        <h4 class="text-center"><a href="http://www.gulagalega.com/">Gula Galega</a></h4>
                        <p class="aut"><?php echo gulatexto1; ?></p>
                        <img src="../images/thor.jpg" class="col-lg-3 pull-right hidden-xs hidden-sm img-thumbnail"  title="Thor" alt="Thor"/>
                        <p class="aut"><?php echo gulatexto2; ?></p>

                        <p class="aut"><?php echo gulatexto3; ?></p>
                        <img src="../images/platu.jpg" class="col-lg-3 pull-left hidden-xs hidden-sm img-thumbnail"  title="Platu" alt="Platu"/>
                        <p class="aut"><?php echo gulatexto4; ?></p>

                        <p class="aut"><?php echo gulatexto5; ?></p>

                        <p class="aut"><?php echo gulatexto6; ?></p>

                        <p class="aut chorimacolor"><i class="glyphicon glyphicon-new-window"></i> <a class="chorimacolor" href="http://www.gulagalega.com/" target="_blank"><?php echo gulalink; ?></a></p>
                    </div>
                </div>
                <div class="col-md-12 history-left" style="margin-bottom: 3em;">	

                    <div class="history-left-grid">

                        <div class="row">
                            <a href="http://galeguesa.com/"><img class=" col-lg-2 col-lg-offset-5 col-md-6 col-xs-6 col-sm-6 img-responsive pull-left" src="../images/galeguesa.png"/></a>

                        </div>
                        <h4 class="text-center"><a href="http://galeguesa.com/">A Galeguesa</a></h4>
                        <p class="aut"><?php echo galeguesa1; ?></p>
                        <p class="aut"><?php echo galeguesa2; ?></p>
                        <img src="../images/vacas.JPG" class="col-lg-2 pull-left hidden-xs hidden-sm img-thumbnail"  title="vacas" alt="vacas"/>
                        <p class="aut"><?php echo galeguesa3; ?></p>

                        <p class="aut"><?php echo galeguesa4; ?></p>

                        <p class="aut chorimacolor"><i class="glyphicon glyphicon-new-window"></i> <a class="chorimacolor" href="http://galeguesa.com/" target="_blank"><?php echo galeguesalink; ?></a></p>
                    </div>


                </div>
                <div class="row" >
                    <div class="col-md-8 history-left hidden-xs hidden-sm">
                        <?php
                        $vista->facebooktimeline();
                        ?>
                    </div>
                    <div class="col-md-4 history-right">
                        <h3><?php echo opiniongaleria; ?></h3>

                        <?php $vista->setopiniontripadvisor(); ?>

                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //about -->
        <!--- footer --->
        <?php
        $vista->pie();
        ?>
        <!--- //footer --->
        <!-- for bootstrap working -->
        <script src="../js/bootstrap.js"> </script>
        <!-- //for bootstrap working -->
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
            $("area[rel^='prettyPhoto']").prettyPhoto();

            $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:10000, autoplay_slideshow: true});
            $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'slow',slideshow:10000, hideflash: true});


            });
        </script>

    </body>
</html>