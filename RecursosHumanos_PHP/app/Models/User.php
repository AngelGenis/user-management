<?php namespace Models;

  class User {
    private $username;
    private $contraseña;

    public function __construct(string $username = "", string $contraseña = "") {
      $this->username = $username;
      $this->contraseña = $contraseña;
    }
    
    public function getUsername() {
      return $this->username;
    }
    public function getContraseña() {
      return $this->contraseña;
    }

  }
?>