<!DOCTYPE html>
<?php
include '../clases/eventos.php';
$eventos = new eventos('chor');
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
                    <div class="col-lg-12">
                        <select id="seleccionar" class="form-control-static">
                            <option>Escoger tipo de evento</option>
                            <option value="Pendiente">Eventos pendientes</option>
                            <option value="Finalizado">Eventos finalizados</option>
                        </select>
                    </div>
                    <div class="row">

                        <div id="lista" class="col-lg-12">
                            <?php
                            if (isset($_GET['est'])) {
                                if (!isset($_GET['in'])) {
                                    $ini = 0;
                                } else {
                                    $ini = $_GET['in'];
                                }
                                if (!isset($_GET['fn'])) {
                                    $fn = 4;
                                } else {
                                    $fn = $_GET['fn'];
                                }
                                $arra = json_decode($eventos->geteventos($_GET['est'], $ini, $fn));
                            }
                            ?>
                            <?php if(isset($arra)):?>
                            <?php foreach (@$arra as $value): ?>
                                <div class=" eventos" id="<?php echo $value->id; ?>" style="margin:5px;" class="panel panel-default">
                                    <h4 style="text-align:center;">Carrusel de imágenes del evento</h4>
                                    <div  class="col-lg-6">

                                        <form class=" panel-body" name="<?php echo $value->imagen1; ?>"  role="form"  enctype="multipart/form-data">

                                            <label>Imagen 1: <?php echo $value->imagen1; ?></label>
                                            <input class="carrusel form-control" type="file" name="imagen1" />
                                        </form>


                                        <form class=" panel-body" name="<?php echo $value->imagen2; ?>"  role="form"  enctype="multipart/form-data">

                                            <label>Imagen 2: <?php echo $value->imagen2; ?></label>
                                            <input class="carrusel form-control" type="file" name="imagen2" />
                                        </form>
                                    </div>
                                    <div class="col-lg-6">
                                        <form class=" panel-body" name="<?php echo $value->imagen3; ?>"  role="form"  enctype="multipart/form-data">

                                            <label>Imagen 3: <?php echo $value->imagen3; ?></label>
                                            <input class="carrusel form-control" type="file" name="imagen3" />
                                        </form>


                                        <form class=" panel-body" name="<?php echo $value->imagen4; ?>"  role="form"  enctype="multipart/form-data">

                                            <label>Imagen 4: <?php echo $value->imagen4; ?></label>
                                            <input class="carrusel form-control" type="file" name="imagen4" />
                                        </form>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="col-lg-2 form-group">

                                            <img class="img-responsive" src="../../atabernadachorima.es/img-eventos/<?php echo $value->imagenperfil; ?>"/>
                                        </div>
                                        <form class="col-lg-5 form-group" name="<?php echo $value->imagenperfil; ?>" enctype="multipart/form-data">
                                            <label>Imagen del evento</label>
                                            <input class="carrusel form-control" name="imagenperfil" required="require" type="file" value="<?php echo $value->imagenperfil; ?>"/>
                                        </form> 
                                    </div>

                                    <form class="formularioevento panel-body"   role="form">


                                        <div class="col-lg-4 form-group">
                                            <label>Nombre</label>
                                            <input class="form-control" required="require" type="text" value="<?php echo $value->nombre; ?>"/>
                                        </div>  
                                        <div class="col-lg-2 form-group">
                                            <label>Tipo de evento</label>
                                            <input class="form-control" required="require" type="text" value="<?php echo $value->tipo; ?>"/>
                                        </div>
                                        <div class="col-lg-3 form-group">
                                            <label >Fecha</label>
                                            <input type="date" class="form-control" 
                                                   required="required" value="<?php echo $value->fecha; ?>">
                                        </div>
                                        <div class="col-lg-2 form-group">
                                            <label >Hora</label>
                                            <input id="hora" type="datetime" class="form-control" 
                                                   required="required" value="<?php echo $value->hora; ?>">
                                        </div>
                                        <div class="col-lg-5 form-group">
                                            <label >Descripción</label>
                                            <textarea class="form-control" required="required"><?php echo $value->descripcion; ?></textarea>
                                        </div>
                                        <div class="col-lg-7 form-group">
                                            <label >Crítica del evento finalizado</label>
                                            <textarea class="form-control" rows="6"><?php echo $value->critica; ?></textarea>
                                        </div>
                                        <div class="col-lg-8 form-group">
                                            <label >Link</label>
                                            <input  type="url" class="form-control" 
                                                   value="<?php echo $value->link; ?>">
                                        </div>
                                        <div class="col-lg-8 form-group">
                                            <label >Vídeo youtube</label>
                                            <input  type="url" class="form-control" 
                                                   value="<?php if($value->video!=""){ echo "https://youtu.be/".$value->video;} ?>">
                                        </div>
                                        <div class="col-lg-4 form-group">
                                            <label>Estado del evento</label>
                                            <select class="form-control">
                                                <option value="<?php echo $value->estado; ?>"><?php echo $value->estado; ?></option>
                                                <option value="Pendiente">Pendiente</option>
                                                <option value="Finalizado">Finalizado</option>
                                            </select>

                                        </div>
                                        <div class="col-lg-2 form-group">
                                            <label>Eliminar evento</label>
                                            <button class=" btn btn-danger form-control" type="reset">Borrar</button>

                                        </div>
                                        <div class="col-lg-2 form-group">
                                            <label>Finalizar evento</label>
                                            <button class=" btn btn-warning form-control" type="submit">Finalizar</button> 
                                        </div>
                                    </form>
                                </div>
<?php endforeach; ?>
<?php endif; ?>
<?php
if (isset($_GET['fn'])) {
    $pagi = round($_GET['fn'] / 4);
} else {
    $pagi = 1;
}
?>
                            <h5 style="text-align:center;">Página <?php echo $pagi; ?> </h5>
                            <ul id="pag" class="pagination">
                            <?php
                            $pagina = $eventos->paginadoreventos(@$_GET['est']) / 4;
                            
                            $inicio = 0;
                            $fin = 4;
                            for ($i = 0; $i <= $pagina; $i++) {
                                if (isset($_GET['est'])) {
                                    
                                        echo "<li><a href='finalizarevento.php?est=" . @$_GET['est'] . "&in=" . $inicio . "&fn=" . $fin . "'>" . $num = $i+1;
                                        "</a></li>";
                                        $inicio = $inicio + 4;
                                        $fin = $fin + 4;
                                    
                                }
                            }
                            ?>                                
                            </ul>
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
        <script src="js/finalizarevento.js"></script>

        <!-- Menu Toggle Script -->
        <script>
            $(document).ready(function() {
                $("#menu-toggle").click(function(e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });


            });
        </script>



    </body>

</html>



