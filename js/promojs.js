$(document).ready(function() {

    $("#getcodigo select").change(function(e) {
        e.preventDefault();
        valor = $("#getcodigo select").val();
        if (valor == 0) {
            $("#descripcion p").text("");
            $("#descripcion").hide();
            
           
        }
        else {
            dest = "../include/peticion.php?op=2";
            param = {
                "id": valor

            };

            $.ajax({
                url: dest,
                data: param,
                type: 'POST',
                beforeSend: function() {
                    $("#descripcion p").text("");
                    $("#descripcion").hide();
                    
                },
                success: function(respuesta) {

                    $("#descripcion").slideDown('slow');
                    $("#descripcion p").text(respuesta);

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
        }
    });

    $("#getcodigo").submit(function(e) {
        e.preventDefault();
        dest = "../include/peticion.php?op=3";
        param = {
            "promocion": $("#getcodigo select").val(),
            "email": $("#getcodigo input:eq(0)").val()

        };
        if ($("#getcodigo select").val() !== "0")
        {
            $.ajax({
                url: dest,
                data: param,
                type: 'POST',
                beforeSend: function() {
                    $("#load2").fadeIn();
                    $("#respuestacodigo").fadeOut();
                    $("#respuestacodigo").text('');
                },
                success: function(respuesta) {
                    $("#load2").fadeOut();
                    if (respuesta == 'codigo' || respuesta == 'nosuscrip')
                    {
                        if (respuesta == 'codigo') {
                            $("#respuestacodigo").fadeIn();
                            $("#respuestacodigo").html("O usuario co mail <span class='text-primary'>" + $("#getcodigo input:eq(0)").val() + "</span> xa solicitou o código desta oferta");
                        }
                        if (respuesta == 'nosuscrip') {
                            $("#respuestacodigo").fadeIn();
                            $("#respuestacodigo").html("Non estás suscrito o noso servicio, podes facelo <a href='http://atabernadachorima.es'>aquí</a> e obter a túa primeira oferta de benvida.");
                        }
                    } else {
                        $("#respuestacodigo").fadeIn();
                        $("#respuestacodigo").html("<span class='text-info'>O código foi enviado o teu email, revisa a túa bandexa de entrada</span>");
                    }
                    /*if (respuesta == 'ok')
                     {
                     $("#respuestacodigo").fadeIn();
                     $("#respuestacodigo").html("<span class='text-info'>O código foi enviado o teu email, revisa a tua bandexa de entrada</span>");
                     }*/
                    
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
        }
        else {
            alert('Escolle unha oferta por favor');
        }
    });

});


