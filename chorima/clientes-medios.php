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
                        <form id="medios" role="form" >
                            <div class="col-lg-8 form-group">
                                <label >Añadir medio de comunicación</label>
                                <input type="text" class="form-control" 
                                       placeholder="Nombre del medio de comunicación" required>

                            </div>
                            <div class="col-lg-8 form-group">
                                <input type="email" class="form-control" id="mail"
                                       placeholder="email del medio" required>
                            </div>


                            <div class="col-lg-8 form-group">
                                <button type="submit" class="btn btn-warning">Añadir</button>
                                <button type="reset" class="btn btn-default">Cancelar</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="row">
                    <select id="seleccionarclientes" class="form-control-static">
                        <option>Selecciona clientes/medios</option>
                        <option value="Medios">Medios de comunicación</option>
                        <option value="cliente">Clientes</option>
                    </select>
                </div>
                <div class="row">
                    
<?php
$objeto = new clientes("chor");
if (isset($_GET['tipo'])) {


    $array = json_decode($objeto->getmedios($_GET['tipo']));
    echo "<h3>Medios de comunicación</h3>";
    foreach ($array as $value) {
        echo "<div class='col-lg-3' ><p><h5>" . $value->nombre . "</h5> <span class='label label-default'>" . $value->email . "</span><a href='#' id='$value->id'> <i class='glyphicon glyphicon-remove-circle'></i> </a></p></div>";
    }
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
        $("#medios").submit(function(e) {
            e.preventDefault();
            dest = "include/peti-clientes.php?op=1";
            param = {
                "nombre": $("#medios input:eq(0)").val(),
                "email": $("#medios input:eq(1)").val(),
                "tipo": "Medios"
            };
            $.ajax({
                url: dest,
                data: param,
                type: 'POST',
                beforeSend: function() {

                    

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

        $("#seleccionarclientes").change(function() {
            val = $(this).val();
            window.location.href = "clientes-medios.php?tipo=" + val + "";
        });
    });
</script>

</body>

</html>


