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

  public function getJugadas() {
      return $this->jugadas;
  }

  public function setJugadas($jugadas) {
      $this->jugadas = $jugadas;
  }

  public function obtenerPorId($id) {
    $unaMesa = pMesa::obtenerPorId($id);
    return $unaMesa;
  }
  public function obtenerPorEstado($estado) {
    $listaMesas = pMesa::obtenerPorEstado($estado);
    return $listaMesas;
  }

  public function obtenerMesaPorEstado($estado) {
    $unaMesa = pMesa::obtenerMesaPorEstado($estado);
    return $unaMesa;
  }
  public function obtenerMesaActivaPorJugador($unJugador) {
    assert($unJugador!=null);
    $unaMesa = pMesa::obtenerMesaPorEstadoPorJugador(Mesa::MESA_ACTIVA, $unJugador);
    return $unaMesa;
  }

  public function listarMesasActivas($cantidad) {
    $listaMesasE=new ArrayList();
    $listaMesasE = pMesa::obtenerPorEstado(Mesa::MESA_EN_ESPERA);
    $listaMesasA = pMesa::obtenerPorEstado(Mesa::MESA_ACTIVA);
    $listaMesas = new ArrayList();
    $i = 0;
    if($listaMesasE!=null){
      while ($i<$cantidad && $listaMesasE->hasNext()) {
        $listaMesas->add($listaMesasE->next());
        $i++;
      }
    }
    if($listaMesasA!=null){
      while ($i<$cantidad && $listaMesasA->hasNext()) {
        $listaMesas->add($listaMesasA->next());
        $i++;
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
  public function nuevaJugada($mesa, $jugador, $campo, $esCruz) {
    $unaJugada = new Jugada();
    $unaJugada->setJugador($jugador);
    $unaJugada->setEsCruz($esCruz);
    $unaJugada->setIdCampo($campo); 
    $unaJugada->setJugador($jugador);
    return $unaJugada->save($mesa);
//    $jugadas->add($unaJugada); da error
    
  }
  public function hayGanador() {

    $i = 0;
    $O = array();
    $X = array();
    while ($this->getJugadas()->hasNext()) {
      $unaJugada = $this->getJugadas()->next();
      if ($unaJugada->getEsCruz()) {
        $X[$unaJugada->getIdCampo()] = true;
      }
      else {
        $O[$unaJugada->getIdCampo()] = true;
      }
      $i++;
    }
    if ($X[1] && $X[2] && $X[3]) {
      $this->esGanador($this->getJugador1());
      return "j1";
    }
    elseif ($X[4] && $X[5] && $X[6]) {
      $this->esGanador($this->getJugador1());
      return "j1";
    }
    elseif ($X[7] && $X[8] && $X[9]) {
      $this->esGanador($this->getJugador1());
      return "j1";
    }
    elseif ($X[1] && $X[4] && $X[7]) {
      $this->esGanador($this->getJugador1());
      return "j1";
    }
    elseif ($X[2] && $X[5] && $X[8]) {
      $this->esGanador($this->getJugador1());
      return "j1";
    }
    elseif ($X[3] && $X[6] && $X[9]) {
      $this->esGanador($this->getJugador1());
      return "j1";
    }
    elseif ($X[1] && $X[5] && $X[9]) {
      $this->esGanador($this->getJugador1());
      return "j1";
    }
    elseif ($X[3] && $X[5] && $X[7]) {
      $this->esGanador($this->getJugador1());
      return "j1";
    }

    elseif ($O[1] && $O[2] && $O[3]) {
      $this->esGanador($this->getJugador2());
      return "j2";
    }
    elseif ($O[4] && $O[5] && $O[6]) {
      $this->esGanador($this->getJugador2());
      return "j2";
    }
    elseif ($O[7] && $O[8] && $O[9]) {
      $this->esGanador($this->getJugador2());
      return "j2";
    }
    elseif ($O[1] && $O[4] && $O[7]) {
      $this->esGanador($this->getJugador2());
      return "j2";
    }
    elseif ($O[2] && $O[5] && $O[8]) {
      $this->esGanador($this->getJugador2());
      return "j2";
    }
    elseif ($O[3] && $O[6] && $O[9]) {
      $this->esGanador($this->getJugador2());
      return "j2";
    }
    elseif ($O[1] && $O[5] && $O[9]) {
      $this->esGanador($this->getJugador2());
      return "j2";
    }
    elseif ($O[3] && $O[5] && $O[7]) {
      $this->esGanador($this->getJugador2());
      return "j2";
    }
    elseif ($i==9) {
      $this->esEmpate();
      return "empate";
    }
    return null;

  }
  public function esGanador($unJugador) {
    $this->setGanador($unJugador);
    $this->setEstado(Mesa::MESA_GANADA);
    $this->save();
  }
  public function esEmpate() {
    $this->setGanador(null);
    $this->setEstado(Mesa::MESA_GANADA);
    $this->save();
  }

}
?>
