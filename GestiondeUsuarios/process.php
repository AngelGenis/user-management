<?php

   require_once '../RecursosHumanos_PHP/RHConnection.php';

 
   class UserInfo implements JsonSerializable{
        private $correo;
        private $nombre;
        private $rol;
        private $telefono;

        public function __construct(string $correo = "", string $nombre = "", string $rol = "", string $telefono = "") {
        $this->correo = $correo;
        $this->nombre = $nombre;
        $this->rol = $rol;
        $this->telefono = $telefono;
        }

        public function getCorreo() {
            return $this->correo;
          }
          public function getNombre() {
            return $this->nombre;
          }
          public function getRol() {
            return $this->rol;
          }
          public function getTelefono() {
            return $this->telefono;
          }
  
          public function jsonSerialize(){
              return 
              [
                  'correo'   => $this->getCorreo(),
                  'nombre' => $this->getNombre(),
                  'rol' => $this->getRol(),
                  'telefono' => $this->getTelefono()
              ];
          }
    }
   
   $conn = new RHConnection("https://localhost:44386");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $username2 = $_POST['username2'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $rol = $_POST['rol'];
    $newPass = $_POST['passwordnu2'];

    $return_arr = array();
    // echo "username: ".$username." - password: ".$password." - name: ".$name." - email: ".$email." - phone: ".$phone." - rol: ".$rol.".....";

    if (empty($username) || empty($password) || empty($name) || empty($email) || empty($phone) || empty($rol) || empty($newPass)) {
        echo 'error, 500, No puede haber campos vacios';
    }else{
        $respSetUser = $conn->setUser($username, $password, $username2, $newPass);
        $respuestasu = json_encode($respSetUser);
        $parsed_jsonsu = json_decode($respuestasu, true);

        
        $nuevoUserInfo = new UserInfo($email, $name, $rol, $phone);
        $respSetUserInfo = $conn->setUserInfo($username, $password, $username2, $nuevoUserInfo);

        // $nuevoUserInfo = new UserInfo("aaa@doe.com", "aaa 2", "rh", "2281004088"); 
        // $respSetUserInfo = $conn->setUserInfo("pruebas3", "12345678c", "prueba5", $nuevoUserInfo);

        $respuestaui = json_encode($respSetUserInfo);
        $parsed_jsonui = json_decode($respuestaui, true);


        if($parsed_jsonsu['status'] =="success" && $parsed_jsonui['status'] =="success"){
            echo $parsed_jsonsu['status'].", ".$parsed_jsonsu['code'].", ".$parsed_jsonsu['message'];
        }else{
            if($parsed_jsonsu['code'] == "502"){
                echo $parsed_jsonsu['status'].", ".$parsed_jsonsu['code'].", ".$parsed_jsonsu['message'];
            }else{
                echo $parsed_jsonui['status'].", ".$parsed_jsonui['code'].", ".$parsed_jsonui['message'];
            } 
        }

        // if($parsed_jsonui['status'] =="success"){
        //     echo $parsed_jsonui['status'].", ".$parsed_jsonui['code'].", ".$parsed_jsonui['message'];
        // }else{
        //     echo $parsed_jsonui['status'].", ".$parsed_jsonui['code'].", ".$parsed_jsonui['message'].", ".$parsed_jsonui['data'];
            
        // }


    }

    ?>








