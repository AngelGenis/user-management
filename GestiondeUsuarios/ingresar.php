<?php
   require_once '../RecursosHumanos_PHP/RHConnection.php';   
   
   $conn = new RHConnection("https://localhost:44386");
    
   // GETUSERS
   $username = $_POST['username'];
   $password = $_POST['password'];

   $users = $conn->getUsers();
 
   $resp = "";
   $usuario ="";
   $contraseña="";

   if(!empty($username) || !empty($password)){
    foreach($users->data as &$user){
        if($username == $user->getUsername()){
            $usuario = $username;
            if(md5($password)==$user->getContraseña()){
                $contraseña = $password;
                $resp = "Exito";
                break;
            }
        }else{
            $resp = "Usuario o contraseña incorrectas, ,";
        }
    }
   }else{
      $resp = "No puede haber campos vacios, ,";
   }

   echo $resp.",".$usuario.",".$contraseña; 

?>