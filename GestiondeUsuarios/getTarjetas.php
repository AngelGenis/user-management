<?php

   require_once '../RecursosHumanos_PHP/RHConnection.php';
   
   $conn = new RHConnection("https://localhost:44386");

//    $usersInfo = $conn->getUsersInfo();
//    $respuesta = json_encode($usersInfo);
//    $parsed_json = json_decode($respuesta, true);

   echo "OK";

?>
