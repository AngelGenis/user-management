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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $rol = $_POST['rol'];
    $newPass = $_POST['passwordnu2'];

    if(empty($username) || empty($password)){
        echo 'error, 500, Debe Identificarse Primero';
    }else{
        if(!empty($newPass)){
            $resp = $conn->updateUser($username, $password, $name, $name, $newPass);
            if($resp->status != "Success"){
                echo $resp->status.", ". $resp->code.", ".$resp->message; 
            }else{
                $nuevoUserInfo = new UserInfo($email,$name,$rol,$phone); 
                $respEditarUserInfo = $conn->updateUserInfo($username, $password, $name, $nuevoUserInfo);
                echo $respEditarUserInfo->status.", ". $respEditarUserInfo->code.", ".$respEditarUserInfo->message;
            }
        }else{
            $nuevoUserInfo = new UserInfo($email,$name,$rol,$phone); 
            $respEditarUserInfo = $conn->updateUserInfo($username, $password, $name, $nuevoUserInfo);
            echo $respEditarUserInfo->status.", ". $respEditarUserInfo->code.", ".$respEditarUserInfo->message;
        }        
    }

?>