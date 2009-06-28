<?php

class juego {

  static function mostrarJuego($datos) {
    return HtmlHelper::template("tateti.php", $datos);
  }
  static function mostrarMesas() {
    $mesasActivas = new ArrayList();
    $mesasActivas = Mesa::listarMesasActivas("10");
    $unaMesa = new Mesa();
    $stringHtml = "";
    foreach ($mesasActivas->getList() as $unaMesa) {
      $stringHtml .= '<a href="index.php?pagina=verMesa&id='.$unaMesa->getId().'" class="morelink">';
      if ($unaMesa->getJugador1()!=null && $unaMesa->getJugador2()!=null)
        $stringHtml .= 'Mesa '.$unaMesa->getId().'<span class="links_text"> '.$unaMesa->getJugador1().' vs. '.$unaMesa->getJugador2().'</span>';
      elseif ($unaMesa->getJugador1()==null)
        $stringHtml .= 'Mesa '.$unaMesa->getId().'<span class="links_text"> Jug&aacute; Y&aacute;! vs. '.$unaMesa->getJugador2().'</span>';
      elseif ($unaMesa->getJugador2()==null)
        $stringHtml .= 'Mesa '.$unaMesa->getId().'<span class="links_text"> '.$unaMesa->getJugador1().' vs. Jug&aacute; Y&aacute;!</span>';
      $stringHtml .= '</a><br />';
    }
    return $stringHtml;
  }
   
  static function mostrarTop() {
    $topJugadores = new ArrayList();
    $topJugadores = Jugador::listarTopJugadores("10");
    $unJugador = new Jugador();
    $stringHtml = "";
    foreach ($topJugadores->getList() as $unJugador) {
      $stringHtml .= '<a href="index.php?pagina=verJugador&id='.$unJugador->getId().'" class="morelink">';
      $stringHtml .= $unJugador->getUsuario().' <span class="links_text">'.$unJugador->getVictorias().' victorias</span>';
      $stringHtml .= '</a><br/>';
    }
    return $stringHtml;
  }

  static function jugar(){
    if ($_SESSION['usuario']!=null) {
      $mesaActiva = Mesa::obtenerMesaActivaPorJugador($_SESSION['usuario']);
      if ($mesaActiva!=null) {
        $_SESSION["mesa"]=$mesaActiva;
      }
      else {
        $mesa=juego::checkMesaCreada($_SESSION['usuario']);
        if($mesa!=null){    //si la mesa ya esta creada y esperando segundo jugador...
          juego::joinMesaCreada($mesa);
        }
        else{
          juego::crearMesa();
        }
      }
      Sistema::enJuego();
    }
    else {
      Sistema::login();
    }
  }
  static function checkMesaActiva($idMesa){
     $unaMesa=Mesa::obtenerPorId($idMesa);
     if($unaMesa->getEstado()==Mesa::MESA_ACTIVA)
     {
      return true;
     }
     else
     {
          return false;
     }        
 }

    static function checkMesaCreada(){
        $unaMesa=Mesa::obtenerMesaPorEstado(Mesa::MESA_EN_ESPERA);
        if($unaMesa!=null){
          return $unaMesa;
        }
        return null;
    }

    static function joinMesaCreada($unaMesa){
        $jugador2=new Usuario();
        $jugador2=$_SESSION["usuario"];
        $unaMesa->setJugador2($jugador2);
        $unaMesa->setEstado(Mesa::MESA_ACTIVA);
        $unaMesa->save();
        $_SESSION["mesa"]=$unaMesa;

    }

    static function crearMesa(){
        $unaMesa=new Mesa();
        $jugador1=new Usuario();
        $jugador1=$_SESSION["usuario"];
        $unaMesa->setJugador1($jugador1);
        $unaMesa->setEstado(Mesa::MESA_EN_ESPERA);
        $id=$unaMesa->save();
        $unaMesa->setId($id);
        $_SESSION["mesa"]=$unaMesa;
    }


}
?>