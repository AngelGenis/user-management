<?php

   require_once '../RecursosHumanos_PHP/RHConnection.php';
//    require_once('../RecursosHumanos_PHP/UserInfo.php');
   
   $conn = new RHConnection("https://localhost:44386");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $rol = $_POST['rol'];
    $newPass = $_POST['passwordnu2'];

    $return_arr = array();

    if (empty($username) || empty($password) || empty($name) || empty($email) || empty($phone) || empty($rol) || empty($newPass)) {
        echo 'error, 500, No puede haber campos vacios';
    }else{
        $respSetUser = $conn->setUser($username, $password, $name, $newPass);
        $respuestasu = json_encode($respSetUser);
        $parsed_jsonsu = json_decode($respuestasu, true);

        // $nuevoUserInfo = new UserInfo($email, $name, $rol, $phone);
        $nuevoUserInfo = array($email, $name, $rol,$phone);
       
        $respSetUserInfo = $conn->setUserInfo($username, $password, $name, $nuevoUserInfo);
        // $respuestaui = json_encode($respSetUserInfo);
        // $parsed_jsonui = json_decode($respuestaui, true);


        if($parsed_jsonsu['status'] =="success" && $parsed_jsonui['status'] =="success"){
            echo "hola1";
            // echo $parsed_jsonsu['status'].", ".$parsed_jsonsu['code'].", ".$parsed_jsonsu['message'];
        }else{
            echo "hola2";
            // echo $parsed_jsonui['status'].", ".$parsed_jsonui['code'].", ".$parsed_jsonui['message'];
        }


    }

    ?>








