var usuarioExistente = false;
$("#nombre_registro").change(function() {

    // console.log($("nombre_registro").val());
    var nombre = $("#nombre_registro").val();
    var datos = new FormData();
    datos.append("nombre", nombre);

    $.ajax({
        url: "ajax/ajax.php",
        method: "POST",
        data: datos,
        cache: true,
        contentType: false,
        processData: false,
        before: function() {

        },
        success: function(respuesta) {
            console.log(respuesta);
            if (respuesta == "1" || respuesta === 1) {
                $("#nombre_registro").val("");
                $("#nombre_registro").select();
                document.querySelector("div[for='mensaje_error']").innerHTML = "El nombre ya existe";

            } else {
                document.querySelector("div[for='mensaje_error']").innerHTML = "";
            }
        },
        error: function(respuesta) {
            console.log("Ocurrio un error" + respuesta);

        },
        complete: function() {

        }
    });
});