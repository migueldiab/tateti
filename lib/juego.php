<?php


class juego {

  static function mostrarJuego() {
    echo '<center><table frame="0" width="60%" border="1" style="font-size:40px; text-align:center;" id="board">
      <tbody>
      <tr id="tr1">
          <td id="1">&nbsp;&nbsp;&nbsp;</td>
          <td id="2">&nbsp;&nbsp;&nbsp;</td>
          <td id="3">&nbsp;&nbsp;&nbsp;</td>
      </tr>
      <tr id="tr2">
          <td id="4">&nbsp;&nbsp;&nbsp;</td>
          <td id="5">&nbsp;&nbsp;&nbsp;</td>
          <td id="6">&nbsp;&nbsp;&nbsp;</td>
      </tr>
      <tr id="tr3">
          <td id="7">&nbsp;&nbsp;&nbsp;</td>
          <td id="8">&nbsp;&nbsp;&nbsp;</td>
          <td id="9">&nbsp;&nbsp;&nbsp;</td>
      </tr>
      </tbody>
  </table>
  </center>
  <input type="Radio" id="X" name="XO" value="X">X</input>
  <input type="Radio" id="O" name="XO" value="O">O</input>
    ';
  }
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
