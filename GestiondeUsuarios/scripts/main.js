
$('#BotonAgregar').click(()=>{
    $('#Registro').css('display', 'flex');
});

$('#EquisRegistro').click(()=>{
    $('#Registro').fadeOut("fast");
});

$('#EquisEditar').click(()=>{
    $('#Editar').fadeOut("fast");
});

$('#ToastEquisCrearUsuario').click(()=>{
    $('#ToastCrearUsuario').css('display', 'none');
});

// $('.toast-equis').click(()=>{
//     $('.toast').hide();
// })

function cerrarToast(){

    $('.toast').css('display', 'none');
    
}
function getData($data){
    var variables = $data.split(", ");
    
    $nombre = variables[0];
    $email = variables[1];
    $phone=variables[2];
    $rol = variables[3];
    $username = variables[4];

    $('#Editar').css('display', 'flex');

    $('#UserName').val($nombre);
    $('#Nombre').val($nombre);
    $('#Email').val($email);
    $('#Phone').val($phone);
    $('#Rol').val($rol);
    $('#UserName2').val($username);

}


function getTarjetas(){
    $.ajax({
        url: './getTarjetas.php',
        beforeSend: function() {
            $("#ContenedorAzul").css('display','flex');
        },
        success: function(respuesta){
            $("#ContenedorAzul").css('display','none');
            $('#Layout').html(respuesta);
        
        }
    });
}

$("#IniciarSesion").click(()=>{
    $("#Ingresar").css('display', "flex");
});

$("#EquisIngresar").click(()=>{
    $("#Ingresar").css('display', "none");
});

window.onload = function(){
    getTarjetas();
    
};