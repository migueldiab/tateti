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


}
?>
