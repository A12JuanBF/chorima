<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="icon/favicon.ico">
        <title>Validador JDBF</title>

        <!-- CSS de Bootstrap -->
        <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="../css/validador.css" rel="stylesheet" media="screen">


    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button id="codigopage" type="button" class="btn btn-default navbar-btn active">Canjear código</button>
                <button id="ofertapage" type="button" class="btn btn-default navbar-btn">Ver ofertas</button>
                <a class="navbar-brand" href="#">Validador JDBF</a>
            </div>
        </nav>
        <section class="container">
            <h2 class="text-center">Canjear código</h2>
            <div class="row">
                <div class="col-md-2 col-md-offset-5 col-xs-11">
                    <form id="codigo" role="form">
                        <div class="form-group">
                            <label >Código</label>
                            <input type="text" class="form-control" 
                                   placeholder="Introduce el código" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Aceptar</button>
                        </div>
                    </form>
                </div>
                <div id="load" class="col-md-4 col-md-offset-4 col-xs-12">
                    <img class="img-responsive" src="../images/load.gif" title="load"/>
                </div>
                <div id="cajamensaje" class="col-md-4 col-md-offset-4 col-xs-12">

                </div>
        </section>

        <footer>
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li class="active" >Canjear código</li>
                    <li><a href="ofertas.php">Ver ofertas</a></li>

                </ol>
            </div>
            <div class="col-md-6">
                <p class="pull-right"><small>Aplicación diseñada y desarrolada para A Taberna da Chorima</small></p>

            </div>
        </footer>
    </body>
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="../js/jquery-1.11.1.min.js"></script>

    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="../js/bootstrap.js"></script>
    <script>

        $("#codigopage").click(function(e) {
            e.preventDefault();
            window.location.href = "index.php";
        });
        $("#ofertapage").click(function(e) {
            e.preventDefault();
            window.location.href = "ofertas.php";
        });

        $("#codigo").submit(function(e) {
            e.preventDefault();

            dest = "../include/peticion.php?op=4";
            param = {
                "codigo": $("#codigo input").val()

            };

            $.ajax({
                url: dest,
                data: param,
                type: 'POST',
                beforeSend: function() {
                    $("#load").show();
                    $("#cajamensaje").hide();
                    $("#cajamensaje").html("");

                },
                success: function(respuesta) {
                    $("#load").hide();
                    $("#cajamensaje").fadeIn();
                    $("#cajamensaje").html(respuesta);

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
        });

    </script>
</html>
