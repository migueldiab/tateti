<?php

class Jugada {

  private $id;
  private $hora;
  private $campo;
  private $esCruz;
  private $jugador;

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

  static function obtenerPorIdJugada($id) {
    $unaJugada = pJugada::obtenerPorIdJugada($id);
    return $unaJugada;
  }

    static function obtenerUltimaPorJugador($idJugador) {
    $unaJugada = pJugada::obtenerUltimaPorJugador($idJugador);
    return $unaJugada;
   }

  static function obtenerPorIdMesa($id) {
    $unaJugada = pJugada::obtenerPorIdMesa($id);
    return $unaJugada;
  }

  public function __toString() {
    return (string)$this->id;
  }

  public function save($unaMesa) {
    return pJugada::save($this, $unaMesa);
  }

}
?>
