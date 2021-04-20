<?php namespace Models;

use Models\User as User;

class RespuestaGetUsers extends RespuestaGeneral{
  public $data;

  public function __construct(string $code, string $message, string $status, $data) {
    $this->code = $code;
    $this->message = $message;
    $this->status = $status;
    $this->data = $data;
  }
  
}

?>