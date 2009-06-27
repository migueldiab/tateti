<?php

class Jugada {

  private $id;
  private $hora;
  private $campo;
  private $esCruz;
  private $jugador;
  private $mesa;

    function __construct() {
       $this->hora=date("Y-m-d H:i:s");
    }
  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getHora() {
    return $this->hora;
  }

  public function setHora($hora) {
    $this->hora = $hora;
  }

  public function getIdCampo() {
    return $this->campo;
  }

  public function setIdCampo($campo) {
    $this->campo = $campo;
  }

  public function getEsCruz() {
    return $this->esCruz;
  }

  public function setEsCruz($esCruz) {
    $this->esCruz = $esCruz;
  }

  public function getJugador() {
    return $this->jugador;
  }

  public function setJugador($jugador) {
    $this->jugador = $jugador;
  }

  public function getMesa() {
    return $this->mesa;
  }

  public function setMesa($mesa) {
    $this->mesa = $mesa;
  }

  static function obtenerPorIdJugada($id) {
    $unaJugada = pMesa::obtenerPorIdJugada($id);
    return $unaJugada;
  }

  static function obtenerPorIdMesa($id) {
    $unaJugada = pMesa::obtenerPorIdMesa($id);
    return $unaJugada;
  }

  public function __toString() {
    return (string)$this->id;
  }

  public function save() {
    return pJugada::save($this);
  }

}
?>
