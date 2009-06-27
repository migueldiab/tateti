<?php

class juego {

  static function mostrarJuego($datos) {
    return HtmlHelper::template("tateti.php", $datos);
  }
  static function mostrarMesas() {
    $mesasActivas = new ArrayList();
    $mesasActivas = Mesa::listarMesasActivas("5");
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
    $topJugadores = Jugador::listarTopJugadores("5");
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
      $mesa=juego::checkMesaCreada();
      if($mesa!=null){    //si la mesa ya esta creada y esperando segundo jugador...
        juego::joinMesaCreada($mesa);
        Sistema::enJuego();
      }
      else{
        juego::crearMesa();
        Sistema::enJuego();
      }
    }
    else {
      Sistema::login();
    }
  }

 static function checkMesaActiva($idMesa){
     $unaMesa=Mesa::obtenerPorId($idMesa);
     if($unaMesa->getEstado()=="activa"){
          return true;
     }else{
          return false;
     }
        
 }

    static function checkMesaCreada(){
        $unaMesa=Mesa::obtenerMesaPorEstado("esperando");
        if($unaMesa!=null){
            return $unaMesa;
        }
        return null;
    }

    static function joinMesaCreada($unaMesa){
        $jugador2=new Usuario();
        $jugador2=$_SESSION["usuario"];
        $unaMesa->setJugador2($jugador2);
        $unaMesa->setEstado("activa");
        $unaMesa->save();
        $_SESSION["mesa"]=$unaMesa;

    }

    static function crearMesa(){
        $unaMesa=new Mesa();
        $jugador1=new Usuario();
        $jugador1=$_SESSION["usuario"];
        $unaMesa->setJugador1($jugador1);
        $unaMesa->setEstado("esperando");
        $id=$unaMesa->save();
        $unaMesa->setId($id);
        $_SESSION["mesa"]=$unaMesa;
    }


}
?>