$(document).ready(function() {

    $("#contacto").submit(function(e) {
        e.preventDefault();
        dest="../include/mail.php";
        param = {
            "name": $("#name").val(),
            "email": $("#email").val(),
            "message": $("#message").val(),
            "subject": $("#subject").val(),
            "number": $("#number").val()
        };
        $.ajax({
            url: dest,
            data: param,
            type: 'POST',
            beforeSend: function() {

                $("#load").fadeIn();

            },
            success: function(respuesta) {
                $("#load").fadeOut();
                $("#mailenviado").html("Mensaxe enviada.");
                //location.reload();

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus);
                alert("Error: " + errorThrown);
            }
        });
    });
    $("#contacto").reset(function() {
        $("#mailenviado").html(" ");
    });
});


