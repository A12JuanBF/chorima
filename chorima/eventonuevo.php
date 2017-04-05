<!DOCTYPE html>
<?php
include '../clases/administrar.php';
$option = new administrar("idfn");
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
        <link href="css/jquery.timepicker.css" rel="stylesheet">


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

                </ul>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Panel de administración</h1>
                            <p>Herramienta para introducir nuevos platos <a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Ocultar menu</a></p>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <form id="eventonuevo" enctype="multipart/form-data">
                                <div class="col-lg-6 form-group">
                                    <label >Imagen del evento</label>
                                    <input  name="fichero" type="file" >
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label >Nombre (artista, espectáculo, grupo) </label>
                                    <input type="text" class="form-control" 
                                           placeholder="Nombre" required="required">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label >Tipo de evento</label>
                                    <input type="text" class="form-control" 
                                           placeholder="Tipo" required="required">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label >Desripción del evento</label>
                                    <textarea class="form-control" required="required"></textarea>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label >Link</label>
                                    <input type="text" class="form-control" 
                                           placeholder="Link a su perfil, web, etc." >
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label >Vídeo youtube</label>
                                    <input type="text" class="form-control" 
                                           placeholder="Vídeo de youtube" >
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-3 form-group">
                                        <label >Fecha</label>
                                        <input type="date" class="form-control" 
                                               required="required">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label >Hora</label>
                                        <input id="hora" type="datetime" class="form-control" 
                                               required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <button class="btn btn-default" type="reset">Borrar</button>
                                    <button class="btn btn-warning" type="submit">Crear evento</button>

                                </div>
                                <div id="load" style="display: none;" class="col-lg-6 form-group"><p>Creando evento espere... </p> <img  class="img-responsive pull-left"  src="img/load.gif"/></div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>

            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <script src="js/crearevento.js"></script>
        <script src="js/jquery.timepicker.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Menu Toggle Script -->
        <script>
            $(document).ready(function() {
                $("#menu-toggle").click(function(e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });


            });
        </script>
        <script>
            $(function() {
                $('#hora').timepicker({timeFormat: 'H:i'});
            });
        </script>


    </body>

</html>


