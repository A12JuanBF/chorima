$("#seleccionar").change(function() {
    val = $(this).val();
    window.location.href = "finalizarevento.php?est=" + val + "";
});

$(".carrusel").on("change", function(e) {
    campoimg = $(this).attr("name");
    padre = $(this).parents().parents().parents();
    id = padre.attr("id");
    form = $(this).parents();
    img = form.attr("name");
    //alert(id + campoimg + img);
    e.preventDefault();
    var formData = new FormData(form[0]);

    ruta = "include/peti-eventos.php?op=3";
    formData.append("campo", campoimg);
    formData.append("id", id);
    formData.append("imagen", img);

    $.ajax({
        url: ruta,
        type: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(datos)

        {
            alert('Imagen subida');
            //location.reload();

        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
        }

    });
});

$(".formularioevento").on("submit", function(e) {
    e.preventDefault();
    padre = $(this).parents();
    id = padre.attr('id');

    dest = "include/peti-eventos.php?op=2";
    param = {
        "id": id,
        "nombre": $("#" + id + " form:eq(5) input:eq(0)").val(),
        "tipo": $("#" + id + " form:eq(5) input:eq(1)").val(),
        "fecha": $("#" + id + " form:eq(5) input:eq(2)").val(),
        "hora": $("#" + id + " form:eq(5) input:eq(3)").val(),
        "descripcion": $("#" + id + " form:eq(5) textarea:eq(0)").val(),
        "critica": $("#" + id + " form:eq(5) textarea:eq(1)").val(),
        "link": $("#" + id + " form:eq(5) input:eq(4)").val(),
        "estado": $("#" + id + " form:eq(5) select").val(),
        "video":$("#" + id + " form:eq(5) input:eq(5)").val()
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

$(".formularioevento").on("reset", function(e) {
    e.preventDefault();
    padre = $(this).parents();
    id = padre.attr('id');

    dest = "include/peti-eventos.php?op=4";
    param = {
        "id": id,
        "imagenperfil": $("#" + id + " form:eq(4)").attr('name'),
        "imagen1": $("#" + id + " form:eq(0)").attr('name'),
        "imagen2": $("#" + id + " form:eq(1)").attr('name'),
        "imagen3": $("#" + id + " form:eq(2)").attr('name'),
        "imagen4": $("#" + id + " form:eq(3)").attr('name')

    };
    if (confirm("¿Deseas eliminar el evento "+$("#" + id + " form:eq(5) input:eq(0)").val() +"?"))
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

});




