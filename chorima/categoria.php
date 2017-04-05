<!DOCTYPE html>
<?php
include '../clases/administrar.php';
$option = new administrar("chor");
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <scrip src="js/script-dolce.js"></scrip>
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
                        <div class="col-lg-8">
                            <form id="categoria" role="form" >
                                <div class="col-lg-6 form-group">
                                    <label >Sección de la carta español</label>
                                    <input type="text" class="form-control" id="tipo"
                                           placeholder="Español" required="require">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label >Sección de la carta gallego</label>
                                    <input type="text" class="form-control" id="tipogl"
                                           placeholder="Gallego" required="require">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label >Sección de la carta inglés</label>
                                    <input type="text" class="form-control" id="tipoen"
                                           placeholder="Inglés" required="require">
                                </div>

                                <div class="col-lg-8 form-group">
                                <button type="submit" class="btn btn-warning">Crear</button>
                                <button type="reset" class="btn btn-default">Cancelar</button>
                                </div>

                        </div>
                        </form>
                    </div>
                    <div id="borrar" class="row col-lg-12">
                        <h3>Borrar categorías de la carta</h3>
                        <?php
                        $array = json_decode($option->mostrarcarta());
                        foreach ($array as $value) {
                            echo "<div class='col-lg-3' ><p>" . $value->nombre . "<a href='#' id='$value->id'><i class='glyphicon glyphicon-remove-circle'></i> </a></p></div>";
                        }
                        ?>
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

    <!-- Menu Toggle Script -->
    <script>
        $(document).ready(function() {
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
            $("#categoria").submit(function(e) {
                e.preventDefault();
                dest = "include/peti-chor.php?op=3";
                param = {
                    "tipo": $("#tipo").val(),
                    "tipogl":$("#tipogl").val(),
                    "tipoen":$("#tipoen").val()
                };
                $.ajax({
                    url: dest,
                    data: param,
                    type: 'POST',
                    beforeSend: function() {

                        //$("#contenedor_respuesta").html("Procesando, espere por favor...");

                    },
                    success: function(respuesta) {

                        alert(respuesta);
                        location.reload();
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus);
                        alert("Error: " + errorThrown);
                    }
                });
            });
            $("#borrar a").click(function(e) {
                e.preventDefault();
                id = $(this).attr('id');

                if (confirm("¿Está seguro que quiere borrar esta categoría?"))
                {
                    dest = "include/peti-chor.php?op=4";
                    param = {
                        "id": id
                    };
                    $.ajax({
                        url: dest,
                        data: param,
                        type: 'POST',
                        beforeSend: function() {

                            //$("#contenedor_respuesta").html("Procesando, espere por favor...");

                        },
                        success: function(respuesta) {

                            alert(respuesta);
                            location.reload();
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert("Status: " + textStatus);
                            alert("Error: " + errorThrown);
                        }
                    });
                }
            });

        });
    </script>

</body>

</html>


