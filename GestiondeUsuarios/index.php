
<?php 
    require_once '../RecursosHumanos_PHP/RHConnection.php';
    $conn = new RHConnection("https://localhost:44386");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    

    <link rel="stylesheet" href="./estilos/index.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>
        var UsuarioLogueado="";
        var ContraseñaUsuarioLogueado ="";

        function enviar_ajax(){	
            $.ajax({
            type: 'POST',
            url: './process.php',
            data: $('#form1').serialize(),
            beforeSend: function() {
                $("#TextoError").css('color','blue');
                $('#TextoError').html("Cargando...");

            }, 
            success: function(respuesta) {
                var res =  respuesta.split(",");
                var status = res[0];
                var code = res[1]
                var message = res[2];

                if(status == 'Success'){
                    $('#TextoError').html("exito");
                    $('#Registro').hide();
                    getTarjetas();

                    $( ".contenedor-principal" ).append( `<div class="toast success showup" onclick="cerrarToast()">
                        <div class="toast-header">
                            <p>${status}</p>
                            <div class="equis toast-equis" id="ToastEquisCrearUsuario">
                                <img src="./images/equis.svg" alt="equis">
                            </div>
                        </div>
                        <div class="toast-body">
                            <p> codigo ${code} </p>
                            <p>${message}</p>
                        </div>
                    </div>`);

                }else{
                    $("#TextoError").css('color','red');
                    $('#TextoError').html(message);           
                }
               
            }
            });
        }

        function editar_ajax(){
            $.ajax({
            type: 'POST',
            url: './editar.php',
            data: $('#form2').serialize(),
            beforeSend: function() {
                $("#TextoError2").css('color','blue');
                $('#TextoError2').html("Cargando...");
            }, 
            success: function(respuesta) {
                var res =  respuesta.split(",");
                var status = res[0];
                var code = res[1]
                var message = res[2];
                $('#TextoError2').html("");

                if(status == 'Success'){
                    $('#TextoError2').html("exito");
                    
                    $('#Editar').hide();
                    getTarjetas();

                    $(".contenedor-principal").append( `<div class="toast success showup" onclick="cerrarToast()">
                        <div class="toast-header">
                            <p>${status}</p>
                            <div class="equis toast-equis">
                                <img src="./images/equis.svg" alt="equis">
                            </div>
                        </div>
                        <div class="toast-body">
                            <p> codigo ${code} </p>
                            <p>${message}</p>
                        </div>
                    </div>`);

                }else{
                    $("#TextoError2").css('color','red');
                    $('#TextoError2').html(message);           
                }
               
            }
            });
        }

        function ingresar_ajax(){	
            $.ajax({
            type: 'POST',
            url: './ingresar.php',
            data: $('#form3').serialize(),
            beforeSend: function() {
                $("#TextoError3").css('color','blue');
                $('#TextoError3').html("Cargando...");

            }, 
            success: function(respuesta) {
                var res =  respuesta.split(",");
                var mensaje = res[0];
                UsuarioLogueado = res[1]
                ContraseñaUsuarioLogueado = res[2];

                $("#TextoError3").css('color','red');
                $('#TextoError3').html(mensaje); 
            }
            });
        }

    </script>
</head>

<body>
    <div class="contenedor-principal">
       
        <div class="registro" id="Registro">
                <div class="gradiente"></div>
                <div class="contenedor-registro">
                    <img id="EquisRegistro" class="equis" src='./images/equis.svg' alt="equis" />            
                    <h2>Registrar Usuario</h2>
                    <form onsubmit="enviar_ajax(); return false" id="form1"  class="campos">
                        <label for="username">Usuario</label><br>
                        <input type="text" name="username" placeholder="Angel Genis"><br>
                        <label for="password">Contraseña</label><br>
                        <input type="password" name="password" placeholder="***********">
                        <br>
                        <p>Datos del nuevo usuario</p>
                        <label for="username2">Nombre de usuario</label><br>
                        <input type="text" name="username2" placeholder="AngelGenis98"><br>

                        <label for="name">Nombre</label><br>
                        <input type="text" name="name" placeholder="Angel Genis"><br>
                        <label for="email">Correo</label><br>
                        <input type="text" name="email" placeholder="angel.genis98@gmail.com">
                        <br>
                        <label for="phone">Telefono</label><br>
                        <input type="text" name="phone" placeholder="7353645874"><br>

                        <label for="rol">Rol</label><br>
                        <input type="text" name="rol" placeholder="Ventas"><br>

                        <label for="passwordnu2">Nueva Contraseña</label><br>
                        <input type="password" name="passwordnu2" placeholder="************"><br>

                        <label for="error" class="texto-error" id="TextoError"></label>
                        <input type="submit" name="registrar" value="REGISTRAR" class="contenedor-boton-agregar">
                    
                    </form>
                </div>
        </div>


        <div class="registro" id="Editar">
                <div class="gradiente"></div>
                <div class="contenedor-registro">
                    
                    <img id="EquisEditar" class="equis" src='./images/equis.svg' alt="equis" />
                
              
                    <h2>Editar Usuario</h2>

                    <form onsubmit="editar_ajax(); return false" id="form2"  class="campos">
                        <label for="username">Usuario</label><br>
                        <input type="text" name="username" placeholder="Angel Genis"><br>

                        <label for="password">Contraseña</label><br>
                        <input type="password" name="password" placeholder="***********">
                        <br>

                        <p>Datos del nuevo usuario</p>
                        
                        <label for="userName2">Nombre de usuario</label><br>
                        <input type="text" name="userName2" id="UserName2" readonly placeholder="AngelGenis98"><br>

                        <label for="name">Nombre</label><br>
                        <input type="text" name="name" id="Nombre" placeholder="Angel Genis"><br>

                        <label for="email">Correo</label><br>
                        <input type="text" name="email" id="Email" placeholder="angel.genis98@gmail.com">
                        <br>

                        <label for="phone">Telefono</label><br>
                        <input type="text" name="phone" id="Phone" placeholder="7353645874"><br>

                        <label for="rol">Rol</label><br>
                        <input type="text" name="rol" id="Rol" placeholder="Ventas"><br>

                        <label for="passwordnu2">Nueva Contraseña</label><br>
                        <input type="password" name="passwordnu2" placeholder="************"><br>

                        <label for="error" class="texto-error" id="TextoError2"></label>
                        <input type="submit" name="editar" value="EDITAR" class="contenedor-boton-agregar">
                    
                    </form>

                </div>
        </div>

        <div class="contenedor-principal-login" id="Ingresar">
            <div class="gradiente"></div>
            <div class="contenedor-login">
                <img class="equis" src="images/equis.svg" alt="equis" id="EquisIngresar" />
                <h2>Iniciar Sesión</h2>

                <form onsubmit="ingresar_ajax(); return false" class="campos" id="form3">
                    <label for="username">Email o nombre de usuario</label><br>
                    <input type="text" id="fname" name="username" placeholder="Angel Genis"><br>

                    <label for="password">Contraseña</label><br>
                    <input type="password" name="password" placeholder="************"><br>

                    <label for="error" class="texto-error" id="TextoError3"></label>
                    <input type="submit" name="login" value="INGRESAR" class="contenedor-boton-agregar boton-ingresar">
                </form>
        </div>
    </div>

    <div class="side-bar">
        <div class="contenedor-logo">
            <img src="./images/logo.png" alt="">
        </div>

        <div class="contenedor-boton boton-seleccionado" id="BotonSideBar">
            <div class="contenedor-img-p">
                <img src="./images/userIcon.svg" alt="useIcon">
                <p class="negritas">Usuarios</p>
            </div>
        </div>
        <div class="contenedor-boton" id="BotonSideBar2">
            <div class="contenedor-img-p">
                <img src="./images/bookIcon.svg" alt="useIcon">
                <p>Productos</p>
            </div>
        </div>

        <div>

        </div>
    </div>

    <div class="body">
        <div class="header-body">
            <div class="contenedor-buscador">
                <input class="input" type="text" placeholder="Buscar por nombre de usuario">
                <div class="contenedor-icono-buscador">
                    <div class="contenedor-boton-icono">
                        <img src="./images/SearchIcon.svg" alt="search icon">
                    </div>
                </div>
            </div>
            <!-- <p class="iniciar-sesion-boton" id="IniciarSesion">Iniciar Sesión</p>
            <div class="contenedor-perfil">
                <p>AG</p>
            </div> -->
        </div>
        <div class="body-body">
            <div class="contenedor-botones">
                <p>USUARIOS</p>
                <div class="contenedor-boton" id="BotonAgregar">
                    <div class="contenedor-icono-plus">
                        <img src="./images/Plus.svg" alt="plus">
                    </div>
                    <p>Agregar Nuevo Usuario</p>
                </div>
            </div>
            

            <div class="layout" id="Layout">
                    
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

<script src="./scripts/main.js"></script>

</html>