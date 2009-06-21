<?php

class Mesa {

  private $id;
  private $creada;
  private $estado;
  private $id_ganador;
  private $id_jugador1;
  private $id_jugador2;


  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getCreada() {
    return $this->creada;
  }

  public function setCreada($creada) {
    $this->creada = $creada;
  }

  public function getEstado() {
    return $this->estado;
  }

  public function setEstado($estado) {
    $this->estado = $estado;
  }

  public function getGanador() {
    return $this->id_ganador;
  }

  public function setGanador($id_ganador) {
    $this->id_ganador = $id_ganador;
  }

  public function getJugador1() {
    return $this->id_jugador1;
  }

  public function setJugador1($id_jugador1) {
    $this->id_jugador1 = $id_jugador1;
  }

  public function getJugador2() {
    return $this->id_jugador2;
  }

  public function setJugador2($id_jugador2) {
    $this->id_jugador2 = $id_jugador2;
  }

  function Mesa() {

  }

  static function obtenerPorId($id) {
    $unaMesa = pMesa::obtenerPorId($id);
    return $unaMesa;
  }
    static function obtenerPorEstado($estado) {
    $unaMesa = pMesa::obtenerPorId($estado);
    return $unaMesa;
  }
  public function __toString() {
    return $this->mesa;
  }

  public function save() {
    return pMesa::save($this);
  }

}
?>
