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
include '../clases/carta.php';
$vista = new vista();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Carta | A taberna da chorima</title>
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
        <script src="../js/ampliarimg.js"></script>
        <script type="text/javascript" src="../js/jquery.fancybox.pack.js"></script>
        <!-- //js -->
        <link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/jquery.fancybox.css" type="text/css" media="screen" />

         <?php $vista->googleanalitycs("default"); ?>
    </head>

    <body>
        <?php
        $vista->mensajecookies();
        ?>
        <!-- header -->
        <!-- header -->
        <?php
        $vista->cabecera("default");
        ?>
        <!-- //header -->
        <!-- //header -->
        <!-- menu -->
        <div class="menuche">
            <?php
            $vista->getcategoria();
            if (!isset($_GET['cat'])) :
                ?>
                <h4 class='text-center'><?php echo cartaescoger; ?></h4>
                <section id='textocarta'>
				<div class="row">
					<div class="col-lg-6">
					<h3>Entrantes</h3>
						<ul class="list-group">
							<li class="list-group-item">Caldo<span class="badge">5,50</span></li>
							<li class="list-group-item">Croquetas<span class="badge">7,00</span></li>
							<li class="list-group-item">Ensalada mixta<span class="badge">7,00</span></li>
							<li class="list-group-item">Ensalada completa<span class="badge">8,90</span></li>
							<li class="list-group-item">Táboa de queixos<span class="badge">10,00</span></li>
							<li class="list-group-item">Verduras á prancha<span class="badge">8,90</span></li>
                                                        <li class="list-group-item">Tortilla<span class="badge">8,00</span></li>
                                                        <li class="list-group-item">Tortilla con pementos e cebola<span class="badge">9,00</span></li>
                                                        <li class="list-group-item">Revoltos<span class="badge">8,50</span></li>
						</ul>
					</div>
					<div class="col-lg-6">
					<h3>Racións</h3>
						<ul class="list-group">
							<li class="list-group-item">Polbo<span class="badge">11,90</span></li>
							<li class="list-group-item">Mexillóns<span class="badge">6,50</span></li>
							<li class="list-group-item">Berberechos<span class="badge">7,90</span></li>
							<li class="list-group-item">Zamburiñas<span class="badge">11,00</span></li>
							<li class="list-group-item">Langostinos á prancha<span class="badge">8,90</span></li>
                                                        <li class="list-group-item">Vieiras ao forno (2 ud)<span class="badge">10,00</span></li>
							
						</ul>
					</div>
					</div>
					<div class="row">
					<div class="col-lg-6">
					<h3>Pratos</h3>
						<ul class="list-group">
							<li class="list-group-item">Chipiróns a prancha<span class="badge">8,90</span></li>
							<li class="list-group-item">Pescada á galega<span class="badge">14,00</span></li>
							<li class="list-group-item">Bacallau á prancha<span class="badge">15,00</span></li>
							<li class="list-group-item">Bacallau á galega<span class="badge">15,00</span></li>
							<li class="list-group-item">Entrecot<span class="badge">15,00</span></li>
                                                        <li class="list-group-item">Lomo con queixo<span class="badge">10,00</span></li>
                                                        <li class="list-group-item">Raxo<span class="badge">8,90</span></li>
                                                        <li class="list-group-item">Codillo ó forno<span class="badge">9,50</span></li>
							
						</ul>
					</div>
					
					<div class="col-lg-6">
					<h3>Postres</h3>
						<ul class="list-group">
							<li class="list-group-item">Queixo con marmelo<span class="badge">4,50</span></li>
							<li class="list-group-item">Tarta da Chorima<span class="badge">5,50</span></li>
							<li class="list-group-item">Filloas recheas caseiros<span class="badge">6,90</span></li>
							
							
						</ul>
					</div>
					</div>
					<h4 style="margin-top:1em;"></h4>
					<p><small></small></p>
                    <p style="margin-top:1em;"><?php echo cartap; ?></p>
                    <div class="col-lg-4"><?php $vista->tripadrecomienda(); ?></div>
                    <div class="col-lg-8 hidden-md hidden-sm hidden-xs"><?php $vista->getopiniontripad(); ?></div>
                </section>

            <?php endif; ?>

            <div class="container">
                <?php $vista->getvistaplatos(); ?>


            </div>
        </div>
        <!-- //menu -->
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