<?php

class Mesa {

  private $id;
  private $creada;
  private $estado;
  private $ganador;
  private $jugador1;
  private $jugador2;
  private $jugadas;

  const MESA_ACTIVA = "A";
  const MESA_EN_ESPERA = "E";
  const MESA_GANADA = "G";

  function __construct() {
    $this->creada=date("Y-m-d H:i:s");
  }
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
    return $this->ganador;
  }

  public function setGanador($ganador) {
    $this->ganador = $ganador;
  }

  public function getJugador1() {
    return $this->jugador1;
  }

  public function setJugador1($jugador1) {
    $this->jugador1 = $jugador1;
  }

  public function getJugador2() {
    return $this->jugador2;
  }

  public function setJugador2($jugador2) {
    $this->jugador2 = $jugador2;
  }

  static function getJugadas() {
      return pJugada::obtenerPorIdMesa($this->id);
  }
 
  static function obtenerPorId($id) {
    $unaMesa = pMesa::obtenerPorId($id);
    return $unaMesa;
  }
  static function obtenerPorEstado($estado) {
    $listaMesas = pMesa::obtenerPorEstado($estado);
    return $listaMesas;
  }

   static function obtenerMesaPorEstado($estado) {
    $unaMesa = pMesa::obtenerMesaPorEstado($estado);
    return $unaMesa;
  }
  static function obtenerMesaActivaPorJugador($unJugador) {
    assert($unJugador!=null);
    $unaMesa = pMesa::obtenerMesaPorEstadoPorJugador(Mesa::MESA_ACTIVA, $unJugador);
    return $unaMesa;
  }

  static function listarMesasActivas($cantidad) {
    $listaMesasE = pMesa::obtenerPorEstado(Mesa::MESA_EN_ESPERA);
    $listaMesasA = pMesa::obtenerPorEstado(Mesa::MESA_ACTIVA);
    $listaMesas = new ArrayList();
    for ($i=0; $i < $cantidad; $i++) {
      if ($listaMesasE->hasNext()) {
        $listaMesas->add($listaMesasE->next());
      }
      elseif ($listaMesasA->hasNext()) {
        $listaMesas->add($listaMesasA->next());
      }
    }
    return $listaMesas;
  }

  public function __toString() {
    return (string)$this->id;
  }

  public function save() {
    return pMesa::save($this);
  }
  public function obtenerVictoriasPorJugador($unJugador) {
    return pMesa::obtenerVictoriasPorJugador($unJugador->getId());

  }

public function ultimoJugador() {
    $laJugada=pJugada::obtenerUltimaJugadaPorIdMesa($this->id);
    return $laJugada->getJugador();
    
  }


}
?>
