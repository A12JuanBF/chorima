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
$oferta = new clientes("chor");
$option = json_decode($oferta->getofertas());
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ofertas | A taberna da chorima</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--Llamar a vista para las metas genéricas -->
        <meta name="keywords" content="Taberna, chorima, restaurante, ofertas, promocións" />
        <meta name="description" content="A nosa web ofrece un servizo de ofertas e descontos para os nosos clientes suscritos." />

        <meta name="title" content="A Taberna da Chorima"/>
        <meta name="twitter:card" content="A nosa web ofrece un servizo de ofertas e descontos para os nosos clientes suscritos."/>
        <meta name="twitter:site" content="@tabernachorima">
        <meta name="twitter:title" content="A Taberna da Chorima">
        <meta name="twitter:description" content="A nosa web ofrece un servizo de ofertas e descontos para os nosos clientes suscritos."/>
        <meta name="twitter:creator" content="A Taberna da Chorima"/>


        <meta property="og:title" content="A Taberna da Chorima"/>
        <meta property="og:url" content="http://atabernadachorima.es/ofertas"/>
        <meta property="og:image" content="http://atabernadachorima.es/images/ofertabienvenida.png">
        
        <meta property="og:description"  content="A nosa web ofrece un servizo de ofertas e descontos para os nosos clientes suscritos." />

        <meta itemprop="name" content="A Taberna da Chorima">
        <meta itemprop="description" content="A nosa web ofrece un servizo de ofertas e descontos para os nosos clientes suscritos.">
        <meta itemprop="image" content="http://atabernadachorima.es/images/ofertabienvenida.png">
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
        <script src="../js/promojs.js"></script>
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

            <img class="img-responsive hidden-xs hidden-sm" style="width: 25%; margin: 0 auto;" src="http://atabernadachorima.es/images/ofertabienvenida.png" title="Oferta web" alt="Oferta web"/>

            <div class="container panel panel-default">
                <div style="margin-bottom: 1.3em; margin-top: 1.3em;" class="row">
                    <h2 class="text-center text-info"><?php echo pedircodigoh; ?></h2>
                </div>

                <form id="getcodigo" role="form" class="form-horizontal col-lg-5">
                    <div class="form-group">

                        <select class="form-control" required>
                            <option value="0"><?php echo selectcodigo; ?></option>
                            <?php if (isset($option)) : ?>
                                <?php foreach ($option as $value) : ?>
                                    <?php if ($value->dias <= 30 && $value->id != 1) : ?>
                                        <option value="<?php echo $value->id; ?>"><?php echo $value->nombre; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <option value="0"><?php echo snoofertas; ?></option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <button class="btn btn-primary" type="submit"><?php echo codigoboton; ?></button>
                            </div>
                            <div class="col-lg-2">
                                <img id="load2" class="img-responsive pull-left" src="../images/load.gif" alt="loading" title="loading"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">



                        <p id="respuestacodigo"></p>
                    </div>
                </form>
                <div id="descripcion" class="col-lg-7">
                    <h4 class="text-center"><?php echo ofertadescripcion; ?></h4>
                    <p class="text-center"></p>
                </div>

            </div>
            <div class="container">
                <a href="../baixa/" ><small><i class="glyphicon glyphicon-remove-circle"></i> <?php echo baixah; ?></small></a>
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