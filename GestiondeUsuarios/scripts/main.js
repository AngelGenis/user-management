
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
})

function getData($data){
    var variables = $data.split(", ");
    
    $nombre = variables[0];
    $email = variables[1];
    $phone=variables[2];
    $rol = variables[3];

    $('#Editar').css('display', 'flex');

    $('#Nombre').val($nombre);
    $('#Email').val($email);
    $('#Phone').val($phone);
    $('#Rol').val($rol);

}


function getTarjetas(){
    $.ajax({
        url: './getTarjetas.php',
        
        beforeSend: function() {
            $('#Layout').html("<p>CARGANDO</p>");
        }, 
        
        succes: function(respuesta){
            console.log(respuesta);
            $('#Layout').html(respuesta);
            ;
        }
    });
}

// window.onload = function(){
//     getTarjetas();
// };