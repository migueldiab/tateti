<div id="body_area">
  <div class="left">
    <div class="morelinks_top"></div>
    <div class="morelinks_area">
      <div class="morelinks_head">Mesas en Juego </div>
      <div class="links_morearea">
  {mostrarMesas}
        <div class="freeregistration">
          <div align="center">
          <form method="post" id="jugarForm" action="./index.php">
           <input name="pagina" type="hidden" value="jugar" />
          <input type="submit" name="Jugar!" value="Jugar!">
          </form>
       <!--   Juega <span class="free">Gratis</span></div> -->
       <!--	<input type="button" onclick="window.open('index.php', '_self')" value="Reload" name="btnReload"/> -->
        </div>
        </div>

      </div>
    </div>
    <div class="morelinks_bottom"></div>
  </div>
  <div class="body_area1">
    <div class="banner_bottom"></div>
    <div class="mid">
      <div class="tick_head">
        Bienvenido <span class="tick_head1">{usuario}</span> a TaTeTi Online
      </div>
      <div class="inner_banner">
  {mostrarJuego}
      </div>
    </div>
    <div class="right_area">
      <div class="right_top"></div>
      <div class="right_head">
        <div class="morelinks_head">Top Jugadores </div>
      </div>
      <div class="right_links_area">
        <div class="links_morearea">
  {mostrarTop}
        </div>
      </div>
      <div class="right_bottom"></div>
    </div>
  </div>
</div>
