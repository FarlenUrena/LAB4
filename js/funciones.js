$(document).ready(function(){
    $("#btn_ingresar").click(function(){
        let nombre=$("#nombre_login").val();
        let clave=$("#clave_login").val();

        if(nombre.length==0 || clave.length==0){
           alert("Datos vacios. Debe llenar los campos de usuario y contraseña.");
        }else{
            autentificacion(nombre,clave);
            
        }


        //autentificacion(nombre,clave);
    })
    $("#txt_salir").click(function(){
        cerrarsesion();
    })



$("#btn_postear").click(function(){
    let comentario = $("#txt_area_comentario").val();
    alert(comentario);
    postear(comentario);
    //agregarComentarioContainer();
})

})

function autentificacion (nom,cla) {

    $.ajax({
        type: "POST",
        url: "autentificacion.php",
        data: { nombre:nom, clave:cla },
    })
    .done(function(data){
        let datos = JSON.parse(data);
        if(!datos){
           alert("Credenciales inválidas");
        }else{
        alert("Credenciales válidas, Bienvenido " + datos[1]);
        location.href= 'comentarios.php';
        $.ajax({
            type: "POST",
            url: "autentificacion.php",
            data: { id:datos[0], usuario:datos[1] },
        }).done(function(){}).fail(function(){})
        }
    })
    .fail(function(qXHR, textStatus, errorThrow){
        alert("Imposible ingresar al sistema. Error: "+ errorThrow +". Estado :"+textStatus);
    })
 
}









// VISTA PRINCIPAL DE COMENTARIOS

function cerrarsesion(){
    $.ajax({
        type: "POST",
        url: "autentificacion.php",
        data: { cerrarsesion:'cerrarsesion' },
    }).done(function(){
        location.href= 'index.php';
    }).fail(function(){
        alert("Problemas al cerrar la sesión.");
    })
}



// function obtenerDatos(){
//     $.ajax({
//         type: "GET",
//         url: "comentarios_logica.php",
//         data: {},
//       })
//         .done(function (datos) {
//           $("#contenedor_comentarios").html(datos);
//         })
//         .fail(function (jqXHR, textStatus, errorThrow) {
//           alert(textStatus + ": Recurso" + errorThrow);
//         });
// }



function postear(com){
    $.ajax({
        type: "POST",
        url: "comentarios_logica.php",
        data: { comentario:com},
    }).done(function(){
        location.href= 'comentarios.php';
    }).fail(function(){
        alert("Problemas al postear el comentario.");
    })
}

function agregarComentarioContainer(){
    $('#contenedor_comentarios').append(" <div class='comentario'> <div class='encabezado'><div class='encabezado_nombre'><h3> Nombre: <label> '' </label> </h3> "+
    "</div><div class='encabezado_fecha'><label style='font-weight: bold;'> 11/11/11 11:40 </label></div></div><div class='info_comentario_contenedor'>"+
    "<textarea readonly class='txtarea_info_comentario' name='txt_area_comentario' rows='3' cols='30' maxlength='300'>" +
    "....</textarea></div></div>");  
}