<?php

class juego {

  static function mostrarJuego() {
    return HtmlHelper::template("tateti.php", null);
  }
  static function mostrarMesas() {
    $mesas = '
        <a href="verMesa" class="morelink">
              Mesa 1<span class="links_text"> pepe vs. juan</span>
            </a>
            <br />
            ';
    $mesas .= '
        <a href="verMesa" class="morelink">
              Mesa 2<span class="links_text"> natalia vs. chino67</span>
            </a>
            <br />
            ';
    $mesas .= '
        <a href="verMesa" class="morelink">
              Mesa 2<span class="links_text"> roberto vs. lucuia</span>
            </a>
            <br />
            ';
    return $mesas;
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