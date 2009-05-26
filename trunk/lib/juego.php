<?php


class juego {

  static function mostrarMesas() {

  echo '
      <a href="verMesa" class="morelink">
            Mesa 1<span class="links_text"> pepe vs. juan</span>
          </a>
          <br />
          ';
  echo '
      <a href="verMesa" class="morelink">
            Mesa 2<span class="links_text"> natalia vs. chino67</span>
          </a>
          <br />
          ';
  echo '
      <a href="verMesa" class="morelink">
            Mesa 2<span class="links_text"> roberto vs. lucuia</span>
          </a>
          <br />
          ';
   }
   
     static function mostrarTop() {

  echo '   
            <a href="#" class="morelink">
              Juan <span class="links_text"> 15 Victorias</span>
            </a>
            <br />
          ';
  echo '
            <a href="#" class="morelink">
              Lucia <span class="links_text"> 10 Victorias</span>
            </a>
            <br />
          ';

   }


}
?>
