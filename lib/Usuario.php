<?php

class Usuario {

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $usuario;
    private $clave;

    function Usuario($email, $usuario, $clave) {
      $this->email = $email;
      $this->usuario = $usuario;
      $this->clave = $clave;
    }

    static function autenticarUsuario($usuario, $clave) {
      if (($usuario=='usuario')  &&
        ($clave=='abc123')) {
        $unUsuario = new Usuario("test@test.com", $usuario, $clave);
        return $unUsuario;
      }
      else {
        return null;
      }
    }

    public function __toString() {
      return $this->usuario;
    }
    public function getNombre() {
      return $this->nombre;
    }
}
?>
