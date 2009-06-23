<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jugador
 *
 * @author Administrator
 */
class Jugador extends Usuario {

  private $victorias;

  public function getVictorias() {
    return $this->victorias;
  }

  public function setVictorias($victorias) {
    $this->victorias = $victorias;
  }
  public function listarTopJugadores($cant) {
    $listaJugadores = pUsuario::listarJugadores();
    return $listaJugadores;
  }
}
?>
