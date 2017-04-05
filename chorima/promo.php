<!DOCTYPE html>
<?php
require_once '../clases/clientes.php';
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

    <body>
    <scrip src="js/clientesmedios.js"></scrip>
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
                        <form id="crearpromo" role="form" >
                            <div class="col-lg-8 form-group">
                                <label >Nombre de la promoción</label>
                                <input type="text" class="form-control" 
                                       placeholder="Nombre de la promoción" required>

                            </div>
                            <div class="col-lg-8 form-group">
                                <label >Descripción</label>
                                <textarea class="form-control">
                                    
                                </textarea>
                            </div>
                            <div class="col-lg-8 form-group">
                                <label >Importe</label>
                                <input type="number" step="any"  required class="form-control"/>
                            </div>

                            <div class="col-lg-10 form-group">
                                <button type="submit" class="btn btn-warning">Crear</button>
                                <button type="reset" class="btn btn-default">Cancelar</button>
                            </div>
                            <div  class="col-lg-6 form-group">
                                <img id="load" style="display: none;" class="img-responsive pull-left"  src="img/load.gif"/>
                                <p id="mensaje" style="display: none;"></p>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="row">

                </div>
               <div class="row">

                    <?php
                    /*$objeto = new clientes("chor");

                    $arra = json_decode($objeto->getofertas());*/
                    ?>
                    <?php // foreach ($arra as $value) : ?>
                       <!-- <div class="col-lg-6">
                            <h3><?php // echo $value->nombre; ?></h3>
                            <p><?php // echo $value->descripcion; ?></p>
                            <p>Importe: <i><?php // echo $value->importe; ?></i></p>
                        </div> -->
                    <?php  //endforeach; ?>
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
        $("#crearpromo").submit(function(e) {
            e.preventDefault();
            dest = "include/peti-clientes.php?op=2";
            param = {
                "nombre": $("#crearpromo input:eq(0)").val(),
                "importe": $("#crearpromo input:eq(1)").val(),
                "descripcion": $("#crearpromo textarea").val()
            };
            $.ajax({
                url: dest,
                data: param,
                type: 'POST',
                beforeSend: function() {
                    $("#mensaje").hide();
                    $("#mensaje").text("");
                    $("#load").fadeIn();

                },
                success: function(respuesta) {
                    $("#load").hide();
                    if (respuesta !== 'error')
                    {
                        
                        $("#mensaje").text("Oferta creada, estará disponible en este mismo instante");
                        $("#mensaje").fadeIn();
                        //location.reload();
                    } else {
                        alert('ATENCIÓN! Ha ocurrido un error');
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
        });


    });
</script>

</body>

</html>


