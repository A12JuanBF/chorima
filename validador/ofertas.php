<!DOCTYPE html>
<?php
require '../clases/clientes.php';
$ofertas = new clientes("chor");

$arra = json_decode($ofertas->getofertas());
?>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Validador JDBF</title>
        <link rel="shortcut icon" href="icon/favicon.ico">
        <!-- CSS de Bootstrap -->
        <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="../css/validador.css" rel="stylesheet" media="screen">


    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button id="codigopage" type="button" class="btn btn-default navbar-btn ">Canjear código</button>
                <button id="ofertapage" type="button" class="btn btn-default navbar-btn active">Ver ofertas</button>
                <a class="navbar-brand" href="#">Validador JDBF</a>
            </div>
        </nav>
        <section class="container">
            <h2 class="text-center">Ver ofertas disponibles</h2>
            <?php if (isset($_GET['id'])) : ?>
                <?php $ofer = $ofertas->getoferta($_GET['id']); ?>

                <h4 class="text-center"><?php echo $ofer; ?></h4>
                
                <p class="text-center"><a href="ofertas.php">Volver</a></p>

            <?php else : ?>
                <ul class=" list-group col-lg-4" style="margin-top: 2em;">
                    <?php foreach ($arra as $value) : ?>
                        <?php if ($value->dias < 60 || $value->id == 1) : ?>
                            <li class="list-group-item"><a href="ofertas.php?id=<?php echo $value->id; ?>"><i class="glyphicon glyphicon-new-window"></i> <?php echo $value->nombre; ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>




        </section>

        <footer>
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li  ><a href="http://atabernadachorima.es/chorima/validador/">Canjear código</a></li>
                    <li class="active">Ver ofertas</a</li>

                </ol>
            </div>
            <div class="col-md-6">
                <p class="pull-right"><small>Aplicación diseñada y desarrolada para A Taberna da Chorima</small></p>

            </div>
        </footer>
    </body>
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="../js/jquery-1.11.1.min.js"></script>
    <script>

        $("#codigopage").click(function(e) {
            e.preventDefault();
            window.location.href = "index.php";
        });
        $("#ofertapage").click(function(e) {
            e.preventDefault();
            window.location.href = "ofertas.php";
        });

    </script>
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="../js/bootstrap.js"></script>
</html>
