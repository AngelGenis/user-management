<?php namespace Models;

    use JsonSerializable;
    
    class UserInfo implements JsonSerializable
    {
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
?>