<?php

class Usuario {

  private $id;
  private $nombre;
  private $apellido;
  private $email;
  private $usuario;
  private $clave;


  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function getApellido() {
    return $this->apellido;
  }

  public function setApellido($apellido) {
    $this->apellido = $apellido;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getUsuario() {
    return $this->usuario;
  }

  public function setUsuario($usuario) {
    $this->usuario = $usuario;
  }

  public function getClave() {
    return $this->clave;
  }

  public function setClave($clave) {
    $this->clave = $clave;
  }
  public function setClaveEncryptar($clave) {
    $this->clave = md5($clave);
  }

  function Usuario() {

  }
  static function obtenerPorNombre($nombre) {
    $unUsuario = pUsuario::obtenerPorNombre($nombre);
    return $unUsuario;
  }
  static function obtenerPorId($id) {
    $unUsuario = pUsuario::obtenerPorId($id);
    return $unUsuario;
  }
  static function autenticarUsuario($usuario, $clave) {
    $unUsuario = Usuario::obtenerPorNombre($usuario);

    if ($unUsuario!=null) {
      if ($unUsuario->getClave()==md5($clave)) {
        return $unUsuario;
      }
//      else {
//        die($unUsuario->getUsuario()." clave mal ".$unUsuario->getClave()."   vs.   ".md5($clave));
//      }
    }
    return null;
  }

  public function __toString() {
    return $this->usuario;
  }

  public function save() {
    return pUsuario::save($this);
  }

}
?>
