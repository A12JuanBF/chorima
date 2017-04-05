<!DOCTYPE html>
<?php
include '../clases/administrar.php';
$objeto = new administrar("chor");
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
                            <p>Herramienta para modificar los platos de la carta <a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Ocultar menu</a></p>


                        </div>
                        <div class="row">


                        </div>

                    </div>


                </div>
                <div class="col-lg-12 row">
                    <h4>Platos de la carta</h4>
                    <nav class="navbar navbar-default">
                        <div >

                            <ul class="nav navbar-nav">

                                <?php
                                $array = json_decode($objeto->mostrarcarta());
                                foreach ($array as $value) {
                                    echo "<li><a href='modificar.php?opcion=$value->nombre'>" . $value->nombre . "</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </nav>
                    <!-- Obejots platos -->
                    <?php if (isset($_GET['opcion'])): ?>
                        <?php
                        error_reporting(0);
                        $platos = json_decode($objeto->mostrarplatospag($_GET['opcion']));
                        ?>


                        <?php foreach (@$platos as $value): ?>
                            <div style="min-height: 560px;"  class="col-lg-4 panel panel-default">
                                <div class="row panel-body">
                                    <img id="imgf" class="col-lg-5 img-thumbnail img-responsive" src="../../atabernadachorima.es/img-platos/<?php echo $value->imagen; ?>"/>
                                    <form id="<?php echo $value->imagen; ?>" class="col-lg-12" name="<?php echo $value->id; ?>" enctype="multipart/form-data">
                                        <label >Cambiar imagen</label>
                                        <input class="imgplato" name="fichero" type="file" >
                                    </form>

                                </div>
                                <div class="row panel-body">
                                    <form  id="<?php echo $value->id ?>">
                                        <div class="form-group">
                                            <label >Nombre en español</label>
                                            <input type="text" class="form-control" required="required"
                                                   placeholder="Nombre en español" value="<?php echo $value->nombre ?>">
                                        </div>
                                        <div class="form-group">
                                            <label >Nombre en gallego</label>
                                            <input type="text" class="form-control" required="required"
                                                   placeholder="Nombre en gallego" value="<?php echo $value->nombregl ?>">
                                        </div>
                                        <div class="form-group">
                                            <label >Nombre en inglés</label>
                                            <input type="text" class="form-control" required="required"
                                                   placeholder="Nombre en inglés" value="<?php echo $value->nombreen ?>">
                                        </div>
                                        <div class="form-group">
                                            <label >Descripción en español</label>
                                            <textarea class="form-control" required="required" 
                                                      ><?php echo $value->descripcion ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label >Descripción en gallego</label>
                                            <textarea class="form-control" required="required" 
                                                      ><?php echo $value->descripciongl ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label >Descripción en inglés</label>
                                            <textarea class="form-control" required="required" 
                                                      ><?php echo $value->descripcionen ?></textarea>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label >Precio</label>
                                            <input type="number" class="form-control" required="required" 
                                                   placeholder="Precio" step="0.01" value="<?php echo $value->precio ?>">
                                        </div>
                                        <div   class="form-group col-lg-6">
                                            <label >Categoría</label>
                                            <select class="form-control" required="required"> 
                                                <?php
                                                echo "<option value='$value->tipo'>" . $value->tipo . "</option>";
                                                $array = json_decode($option->mostrarcarta());
                                                foreach ($array as $val) {
                                                    echo "<option value='$val->nombre'>" . $val->nombre . "</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div style="margin-top:10px;"  class="form-group">
                                            <button name="<?php echo $value->imagen; ?>"  class="borrar btn btn-danger">Borrar</button>
                                            <button  class="mod btn btn-warning">Modificar</button>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>            


                    <!--Fin  Obejots platos -->

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

                $(".mod").on("click", function(e) {
                    e.preventDefault();
                    padre = $(this).parent().parent();
                    id = padre.attr("id");

                    dest = "include/peti-chor.php?op=5";
                    param = {
                        "id": id,
                        "nombre": $("#" + id + " input:eq(0)").val(),
                        "descripcion": $("#" + id + " textarea:eq(0)").val(),
                        "precio": $("#" + id + " input:eq(3)").val(),
                        "categoria": $("#" + id + " select").val(),
                        "nombregl": $("#" + id + " input:eq(1)").val(),
                        "nombreen": $("#" + id + " input:eq(2)").val(),
                        "descripciongl": $("#" + id + " textarea:eq(1)").val(),
                        "descripcionen": $("#" + id + " textarea:eq(2)").val()

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

                $(".imgplato ").on("change", function(e) {
                    e.preventDefault();
                    padre = $(this).parent();
                    id = padre.attr('name');
                    imagen = padre.attr('id');
                    var formData = new FormData($("form[name=" + id + "]")[0]);

                    ruta = "include/peti-chor.php?op=6";
                    formData.append("id", id);
                    formData.append("imagen", imagen);
                    $.ajax({
                        url: ruta,
                        type: "POST",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(datos)

                        {

                            location.reload();

                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert("Status: " + textStatus);
                            alert("Error: " + errorThrown);
                        }

                    });
                });
                $(".borrar").on("click", function(e) {
                    e.preventDefault();
                    padre = $(this).parent().parent();
                    img=$(this).attr("name");
                    id = padre.attr("id");
                    
                    dest = "include/peti-chor.php?op=7";
                    param = {
                        "id": id,
                        "imagen": img                      
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
            });
        </script>

    </body>

</html>


