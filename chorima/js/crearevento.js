$("#eventonuevo").submit(function(e) {
    e.preventDefault();
    var formData = new FormData($("#eventonuevo")[0]);

    ruta = "include/peti-eventos.php?op=1";
    formData.append("nombre", $("#eventonuevo input:eq(1)").val());
    formData.append("tipo", $("#eventonuevo input:eq(2)").val());
    formData.append("descripcion", $("#eventonuevo textarea").val());
    formData.append("link", $("#eventonuevo input:eq(3)").val());
    formData.append("video", $("#eventonuevo input:eq(4)").val());
    formData.append("fecha", $("#eventonuevo input:eq(5)").val());
    formData.append("hora", $("#eventonuevo input:eq(6)").val());
    $.ajax({
        url: ruta,
        type: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {

            $("#load").fadeIn();

        },
        success: function(datos)

        {
            if(datos){
                $("#load").fadeOut();
                alert('Evento creado');
                location.reload();
            }
            

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
        }

    });
});
