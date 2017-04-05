/* 
 script petición ajax
 */


$( document ).ready(function() {
    $("#suscrip").submit(function(e){
        e.preventDefault();
        
        dest = "include/peticion.php?op=1";
                param = {
                    "email": $("#suscrip input:eq(0)").val()
                    
                };
                $.ajax({
                    url: dest,
                    data: param,
                    type: 'POST',
                    beforeSend: function() {

                        $("#loadsuscrip").fadeIn();

                    },
                    success: function(respuesta) {
                        $("#loadsuscrip").hide();
                        if(respuesta =='mailusado'){
                            alert('Este mail xa foi inscrito ás nosas promocións');
                        }
                        else if (respuesta =='activado')
                        {
                            alert('Benvido/a de novo ó noso servicio.');
                        }
                        else{
                            alert('Benvido/a ás nosas promocións e notificacións, revisa o teu mail.');
                        }
                        
                        
                        
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus);
                        alert("Error: " + errorThrown);
                    }
                });
    });
    
});