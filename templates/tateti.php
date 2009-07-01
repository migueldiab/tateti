
<center>
<div id="titulo">
    <h1 id="titulo"> </h1>
</div>
  <input type="hidden" id="jugadores" title="{jugadores}">
  <table frame="0" width="60%" height="120px" border="1" style="font-size:40px; text-align:center;" id="board">
      <tbody>
      <tr id="tr1">
        <td onclick="validar($(this));" id="1" width="33%" height="40px">{campo_1}</td>
          <td onclick="validar($(this));" id="2" width="33%">{campo_2}</td>
          <td onclick="validar($(this));" id="3" width="33%">{campo_3}</td>
      </tr>
      <tr id="tr2">
          <td onclick="validar($(this));" id="4" width="33%" height="40px">{campo_4}</td>
          <td onclick="validar($(this));" id="5" width="33%">{campo_5}</td>
          <td onclick="validar($(this));" id="6" width="33%">{campo_6}</td>
      </tr>
      <tr id="tr3">
          <td onclick="validar($(this));" id="7" width="33%" height="40px">{campo_7}</td>
          <td onclick="validar($(this));" id="8" width="33%">{campo_8}</td>
          <td onclick="validar($(this));" id="9" width="33%">{campo_9}</td>
      </tr>
      </tbody>
  </table>
 <!-- <input type="Radio" id="X" name="XO" value="X" disabled="true">X</input>
  <input type="Radio" id="O" name="XO" value="O" disabled="true">O</input>
  <input type="button" value="Nuevo Juego" id="nuevoJuego"/> -->
</center>