/* 
 petición ajax de lengua de la web
 */


   $( document ).ready(function() {
       $(".idiomas").on("click", function(e){
           e.preventDefault();
           idioma=$(this).attr('name');
           dest = "../include/lengua.php";
    param = {
        "idioma": idioma
        
    };


    $.ajax({
        url: dest,
        data: param,
        type: 'POST',
        beforeSend: function() {

            //$("#contenedor_respuesta").html("Procesando, espere por favor...");

        },
        success: function(respuesta) {

            
            location.reload();

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
        }
    });
       });
   
    });



