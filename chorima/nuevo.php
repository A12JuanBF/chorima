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
                            <p>Escoge operación <a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Ocultar menu</a></p>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <form id="platonuevo" role="form" >
                                <div class="col-lg-6 form-group">
                                    <label >Nombre español</label>
                                    <input type="text" class="form-control" id="nombre"
                                           placeholder="Español" required="required">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label >Nombre gallego</label>
                                    <input type="text" class="form-control" id="nombregl"
                                           placeholder="Gallego" required="required">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label >Nombre inglés</label>
                                    <input type="text" class="form-control" id="nombreen"
                                           placeholder="Inglés" required="required">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label >Descripción epañol</label>
                                    <textarea class="form-control" id="descripcion" 
                                              required="required"></textarea>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label >Descripción gallego</label>
                                    <textarea class="form-control" id="descripciongl" 
                                              required="required"></textarea>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label >Descripción inglés</label>
                                    <textarea class="form-control" id="descripcionen" 
                                              required="required"></textarea>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label >Precio</label>
                                    <input type="number" class="form-control" id="precio"
                                           placeholder="Precio" step="0.01" required="required">
                                </div>
                                <div  class="form-group col-lg-6">
                                    <label >Categoría</label>
                                    <select class="form-control" id="categoria" required="required"> 
                                        <?php
                                        $array = json_decode($option->mostrarcarta());
                                        foreach ($array as $value) {
                                            echo "<option value='$value->nombre'>" . $value->nombre . "</option>";
                                        }
                                        ?>
                                    </select>

                                </div>




                                <button type="submit" class="btn btn-warning">Crear</button>
                                <button type="reset" class="btn btn-default">Cancelar</button>
                        </div>
                        </form>
                        <form id="archivo" enctype="multipart/form-data">

                            <label >Adjuntar un archivo</label>
                            <input name="fichero" type="file" required="required">
                            <input style="display: none;" id="imagen" type="text">
                            <p class="help-block">Tamaño recomendado de la imagen 640 píxeles de ancho x 480 píxele de largo</p>

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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $(document).ready(function() {
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

            $("#platonuevo").submit(function(e) {
                e.preventDefault();


                dest = "include/peti-chor.php?op=1";
                param = {
                    "nombre": $("#nombre").val(),
                    "nombregl":$("#nombregl").val(),
                    "nombreen":$("#nombreen").val(),
                    "descripcion": $("#descripcion").val(),
                    "descripciongl": $("#descripciongl").val(),
                    "descripcionen": $("#descripcionen").val(),
                    "precio": $("#precio").val(),
                    "categoria": $("#categoria").val(),
                    "imagen": $("#imagen").val()
                };
                if($("#archivo input:eq(0)").val()!="")
                {
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
                else
                {
                    alert("El plato necesita una imagen");
                }
            });
            $("#archivo input").change(function() {

                var formData = new FormData($("#archivo")[0]);

                ruta = "include/peti-chor.php?op=2";

                $.ajax({
                    url: ruta,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(datos)

                    {
                        
                        $("#imagen").val(datos);
                        
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


