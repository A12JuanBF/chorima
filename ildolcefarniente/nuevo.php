<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Il dolce far niente - administrador</title>

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
                            Il dolce far niente
                        </a>
                    </li>
                    <li>
                        <a href="nuevo.php">Introducir nuevo plato</a>
                    </li>
                    <li>
                        <a href="#">Modificar platos</a>
                    </li>
                    <li>
                        <a href="#">Clientes</a>
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
                            <p>Herramienta para introducir nuevos platos <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Ocultar menu</a></p>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <form id="platonuevo" role="form" >
                                <div class="form-group">
                                    <label >Nombre</label>
                                    <input type="text" class="form-control" id="nombre"
                                           placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <label >Descripción</label>
                                    <textarea class="form-control" id="descripcion" 
                                              ></textarea>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label >Precio</label>
                                    <input type="number" class="form-control" id="precio"
                                           placeholder="Precio" step="0.01">
                                </div>
                                <div  class="form-group col-lg-6">
                                    <label >Categoría</label>
                                    <select class="form-control" id="categoria"> 
                                        <option value="Primero">Primero</option> 
                                        <option value="Segundo">Segundo</option>        
                                    </select>
                                </div>




                                <button type="submit" class="btn btn-primary">Crear</button>
                                <button type="reset" class="btn btn-default">Cancelar</button>
                        </div>
                        </form>
                        <form id="archivo" enctype="multipart/form-data">
                           
                                <label >Adjuntar un archivo</label>
                                <input name="fichero" type="file" >
                                <input id="imagen" type="text">
                                <p class="help-block">Ejemplo de texto de ayuda.</p>
                            
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


                dest = "include/peti-dolce.php?op=1";
                param = {
                    "nombre": $("#nombre").val(),
                    "descripcion": $("#descripcion").val(),
                    "precio": $("#precio").val(),
                    "categoria": $("#categoria").val(),
                    "imagen": $("#imagen").val()
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
                        if (respuesta)
                        {

                            alert(respuesta);
                        }


                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus);
                        alert("Error: " + errorThrown);
                    }
                });
            });
            $("#archivo input").change(function() {
                
                var formData = new FormData($("#archivo")[0]);

                ruta = "include/peti-dolce.php?op=2";

                $.ajax({
                    url: ruta,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(datos)

                    {
                        alert(datos);
                        if (datos != false)
                        {

                        }
                        else
                        {
                            //$("#albaran input").val("");
                            alert(datos);
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


