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
    $listaJugadoresTemp = pUsuario::listarJugadores();
    $listaJugadores = new ArrayList();
    for ($i=0; $i < $cant; $i++) {
      if ($listaJugadoresTemp->hasNext()) {
        $listaJugadores->add($listaJugadoresTemp->next());
      }
    }
    return $listaJugadores;
  }
}
?>
