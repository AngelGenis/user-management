<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

   require_once '../RecursosHumanos_PHP/RHConnection.php';
   
   $conn = new RHConnection("https://localhost:44386");

                
    // GETUSERS
    $usersInfo = $conn->getUsersInfo();
    $respuesta = json_encode($usersInfo);
    $parsed_json = json_decode($respuesta, true);

    if($parsed_json['status'] == "Success"){
        ?>
            <!-- <div class="toast success">
                <div class="toast-header">
                    <p><?php echo $parsed_json['status']?></p>
                    <div class="equis toast-equis" onclick="cerrarToast()">
                        <img src="./images/equis.svg" alt="equis">
                    </div>
                </div>
                <div class="toast-body">
                    <p> codigo <?php echo $parsed_json['code']?></p>
                    <p><?php echo $parsed_json['message']?></p>
                </div>
            </div> -->
        <?php
            foreach($parsed_json['data'] as $value) {      
        ?>

        <div class="tarjeta">
                <div class="header-tarjeta">
                    <p class="nombre"><?php echo $value['nombre']?></p>
                    
                    <div class="lapiz" onClick="getData('<?php echo $value['nombre']?>, <?php echo $value['correo']?>, <?php echo $value['telefono']?>, <?php echo $value['rol']?>')">
                        <!-- <a href="#updateUserInfo.php?id=<?php echo $value['nombre']?>" >
                            <img src="./images/lapizIcon.svg" alt="lapiz">
                        </a> -->

                        <img class="lapizicon" src="./images/lapizIcon.svg" alt="lapiz">
                    </div>
                </div>
                <div class="body-tarjeta">
                    <div class="campos2">
                        <p class="resaltar">Correo</p>
                        <p class="desvanecer"><?php echo $value['correo']?></p>
                    
                        <p class="resaltar">Telefono</p>
                        <p class="desvanecer"><?php echo $value['telefono']?></p>
                    </div>
                    
                </div>
                <div class="bottom-tarjeta">
                    <p class="cargo">
                        <?php 
                            if($value['rol'] == 'rh'){
                                echo "Relaciones Humanas";
                            }else{
                                echo $value['rol'];
                            }?></p>
                </div>
                
            </div> 
        <?php 
        } //Cierre del For
    }else{
        ?>
            <div class="toast error">
                <div class="toast-header">
                    <p><?php echo $parsed_json['status']?></p>
                    <div class="equis toast-equis" onclick="cerrarToast()">
                        <img src="./images/equis.svg" alt="equis">
                    </div>
                </div>
                <div class="toast-body">
                    <p> codigo <?php echo $parsed_json['code']?></p>
                    <p><?php echo $parsed_json['message']?></p>
                </div>
            </div>
    <?php
    }
?>

</body>
</html>