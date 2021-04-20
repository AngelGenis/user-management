<?php
    require_once '../RecursosHumanos_PHP/app/Models/UserInfo.php';
    require_once '../RecursosHumanos_PHP/RHConnection.php';

    $conn = new RHConnection("https://localhost:44386");
  
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $rol = $_POST['rol']; 

    $newPass = $_POST['passwordnu2'];
    
    // SETUSER
    $respSetUser = $conn->setUser($username, $password, $name, $newPass);
  
    // $nuevoUserInfo = new UserInfo($email, $name, $rol, $phone);     
    // $respSetUserInfo = $conn->setUserInfo($username, $password, $name, $nuevoUserInfo);

    var_dump($respSetUser);
    // var_dump($respSetUserInfo);
?>