<?php 
    class UserInfo 
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
    }
?>