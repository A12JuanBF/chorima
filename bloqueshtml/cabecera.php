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
$eventoult = new eventos("chor");
$ideven = json_decode($eventoult->geteventofinalizado("default"));
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
                    <a class="col-md-12 col-xs-12 col-sm-12 hidden-lg"  href="../"><img class="img-responsive " src="http://www.atabernadachorima.es/images/logo.jpg" title="A taberna da chorima" alt="A taberna da chorima logo"/></a>    
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                    <a id="logo" class="col-lg-3 " href="../"><img class="img-responsive hidden-md hidden-sm hidden-xs" src="http://www.atabernadachorima.es/images/logo.jpg" title="A taberna da chorima" alt="A taberna da chorima logo"/></a>
                    <ul class="nav navbar-nav">
                        <li class="hvr-bounce-to-bottom <?php echo $resturante; ?>" ><a href="../"><?php echo nav_inicio ?> </a></li>

                        <li class="hvr-bounce-to-bottom <?php echo $carta; ?>"><a href="../carta/"><?php echo nav_carta ?></a></li>
                        <li class="hvr-bounce-to-bottom <?php echo $proxeven; ?>"><a href="../proximos_eventos/"><?php echo nav_prox ?></a></li>
                        <li class="hvr-bounce-to-bottom <?php echo $anteven; ?>"><a href="../anteriores_eventos/index.php?even=<?php echo $ideven[0]->id ?>"><?php echo nav_ult ?></a></li>
                        <li class="hvr-bounce-to-bottom <?php echo $contacto; ?> dropdown"><a href="../contacto/" ><?php echo nav_contacto ?></a></li>
                        <li class="hvr-bounce-to-bottom dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown"><?php echo nav_ver ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li ><a href="../galeria/"><?php echo nav_sobrenosotros ?></a></li>
                                <li ><a href="../ofertas/"><?php echo nav_ofertas ?></a></li>

                            </ul>
                        </li>
                    </ul>
                </div><!-- /navbar-collapse -->
            </nav>
        </div>
    </div>
</div>
