<?php

class juego {

  static function mostrarJuego() {
    return HtmlHelper::template("tateti.php", null);
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

      $top = '
                <a href="#" class="morelink">
                  Juan <span class="links_text"> 15 Victorias</span>
                </a>
                <br />
              ';
      $top .= '
            <a href="#" class="morelink">
              Lucia <span class="links_text"> 10 Victorias</span>
            </a>
            <br />
          ';
          return $top;
   }

    static function jugar(){
        $statusMesa=checkMesaCreada();
        if($statusMesa!=null){    //si la mesa ya esta creada y esperando segundo jugador...
            joinMesaCreada($statusMesa,$idJugador);
        }else{
            crearMesa();    
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
        $unaMesa=Mesa::obtenerPorEstado("esperando");
        if($unaMesa!=null){
            return $unaMesa;
        }
        return null;
    }

    static function joinMesaCreada($idMesa){
        $unaMesa=Mesa::obtenerPorId($idMesa);
        $jugador2=new Usuario();
        $jugador2=$_SESSION["usuario"];
        $unaMesa->setJugador2($jugador2->getId());
        $unaMesa->setEstado("activa");
        $unaMesa->save();
        $_SESSION["mesa"]=$unaMesa;

    }

    static function crearMesa(){
        $unaMesa=new Mesa();
        $jugador1=new Usuario();
        $jugador1=$_SESSION["usuario"];
        $unaMesa->setJugador1($jugador1->getId());
        $unaMesa->setCreada(NOW());
        $unaMesa->setEstado("esperando");
        $unaMesa->save();
        $_SESSION["mesa"]=$unaMesa;
    }
  
}
?>