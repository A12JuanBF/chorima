<!DOCTYPE html>
<?php
require_once '../clases/estadisticas.php';
$estadistica = new estadisticas("chor");
$ofertas = $estadistica->getofertas();
if (isset($_GET['id'])) {
    $datos = $estadistica->getofertadatos($_GET['id']);
    $codigos = $estadistica->getnumcodigocanjeado($_GET['id']);
}
?>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>A taberna da chorima - administrador</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/simple-sidebar.css" rel="stylesheet">
        <link rel="stylesheet" href="css/material-design-iconic-font.min.css">

        <link rel="stylesheet" href="css/jquery.circliful.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="#">
                            A taberna da chorima
                        </a>
                    </li>
                    <li>
                        <a href="nuevo.php">Introducir nuevo plato</a>
                    </li>
                    <li>
                        <a href="modificar.php">Modificar plato</a>
                    </li>
                    <li>
                        <a href="categoria.php">Introducir categoria</a>
                    </li>
                    <li>
                        <a href="eventonuevo.php">Crear evento</a>
                    </li>
                    <li>
                        <a href="finalizarevento.php">Finalizar evento</a>
                    </li>
                    <li>
                        <a href="clientes-medios.php">Clientes</a>
                    </li>
                    <li>
                        <a href="promo.php">Crear promoción</a>
                    </li>
                    <li>
                        <a href="estadistica.php">Estadísticas</a>
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Panel de administración</h1>
                            <p>Herramienta para introducir nuevas secciones de la carta <a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Ocultar menu</a></p>


                        </div>
                    </div>
                    <div class="row">

                        <h3>Número de clientes registrados en nuestro servicio: <span><?php echo $num = $estadistica->getnumclientes(); ?></span></h3>
                        <h3>Facturación total del servicio web: <span><?php
                                $facturacion = $estadistica->getfacturacion();
                                echo round(@$facturacion, 1, PHP_ROUND_HALF_EVEN) . " eur";
                                ?></span></h3>
                    </div>
                    <div class="row">
                        <select id="ofertas" class="form-control-static">
                            <option>Seleciona oferta</option>
                            <?php foreach ($ofertas as $value) : ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row">
                        <?php if (isset($_GET['id'])) : ?>

                            <?php foreach ($datos as $value) : ?>
                                <?php
                                $nombre = $value['nombre'];
                                $descripcion = $value['descripcion'];
                                $importe = $value['importe'];

                                $importetotal = $value['importe'] * $estadistica->getnumcodigocanjeado($_GET['id']);

                                $cantidad = $value['cantidad'];
                                ?>
                            <?php endforeach; ?>
                            <div class="row" style="margin-top:2em;">
                                <h3 class="text-center"><?php echo $nombre; ?></h3>
                                <p class="text-center"><?php echo $descripcion; ?></p>
                            </div>
                            <div class="col-lg-6" >

                                <h4 class="text-center">Oferta solicitada</h4>
                                <span id="solicitado" style="display:none;"><?php echo $solicitado = ($cantidad * 100) / $num; ?></span>
                                <p class="text-center">Solicitado por <span class="badge"><?php echo $cantidad; ?></span> usuarios</p>
                                <div id="test-circle1"></div>

                            </div>
                            <div class="col-lg-6">


                                <h4 class="text-center">Códigos canjeados</h4>
                                <span id="canjeado" style="display:none;"><?php
                                    if ($codigos != 0) {
                                        echo $canjeadoo = ($codigos * 100) / $estadistica->getnumofertasolicitada($_GET['id']);
                                    }
                                    ?></span>
                                <p class="text-center">Canjeado por <span class="badge"><?php echo $estadistica->getnumcodigocanjeado($_GET['id']); ?></span> usuarios</p>
                                <div id="test-circle2"></div>


                            </div>
                            <div class="row">
                                <h4 >Importe por unidad: <span class="badge"><?php echo $importe; ?></span></h4>
                                <h3 class="text-right">Facturación total de la oferta: <span ><?php echo round(@$importetotal, 1, PHP_ROUND_HALF_EVEN); ?></span></h3>
                            </div>

                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <?php if (isset($_GET['id'])) : ?>
                            <h3>Oferta canjeada por los sigueintes usuarios:</h3>
                            <?php $cod = $estadistica->getcodigo($_GET['id']) ?>
                            <?php foreach ($cod as $value) : ?>

                                <?php if ($value['usado'] == "S") : ?>
                                    <div class="col-lg-4 col-md-6">

                                        <ul class="list-unstyled">
                                            <li><span class="label label-info"><i class="glyphicon glyphicon-user"></i> Usuario:</span> <?php echo $value['mail'] ?></li>
                                            <li><span class="label label-info"><i class="glyphicon glyphicon-time"></i> Fecha canjeado:</span> <?php echo $value['fechcanj'] ?></li>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                            <?php endforeach; ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.circliful.js"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $("#test-circle1").circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: $("#solicitado").text(),
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
            multiPercentage: 1,
            percentages: [10, 20, 30]
        });


        $("#test-circle2").circliful({
            animation: 1,
            animationStep: 5,
            foregroundBorderWidth: 15,
            backgroundBorderWidth: 15,
            percent: $("#canjeado").text(),
            textSize: 28,
            textStyle: 'font-size: 12px;',
            textColor: '#666',
            multiPercentage: 1,
            percentages: [10, 20, 30]
        });

        $("#ofertas").change(function() {

            id = $("#ofertas").val();
            $(location).attr('href', "estadistica.php?id=" + id);
        });

    </script>

</body>

</html>



