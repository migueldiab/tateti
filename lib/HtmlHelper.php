<?php

class HtmlHelper {

  static function head($title, $scripts, $css) {
    echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>'.$title.'</title>
    ';
    foreach ($scripts as $script) {
      echo '      <script src="./js/'.$script.'.js" type="text/javascript"></script>';
    }
    foreach ($css as $un_css) {
      echo '      <link href="./css/'.$un_css.'.css" rel="stylesheet" type="text/css"/>';
    }
    echo '
  </head>';
  }

  static function img_link($url, $image, $alt) {
    echo '<a href="'.$url.'">
            <img name="'.$image.'" src="images/'.$image.'.jpg" width="154" height="47" border="0" alt="'.$alt.'">
          </a>';
  }
  static function bodyStart() {
    echo '<body>
      <form id="form1" name="form1" method="post" action="">
      ';
  }
  static function bodyContent() {
    $menuTop = array("login" => "Login",
            "ayuda" => "Ayuda",
            "ayuda2" => "Ayuda2",
            "ayuda3" => "Ayuda3",
            "registrar" => "Registrar");
    $menuMedio = array("Jugar" => "jugar",
            "Stats" => "stats",
            "Crear Mesa" => "mesa");

    $cabezal = "Bienvenidos al apasionante mundo del TaTeT&iacute; <p>En este sitio, uds. podr&aacute;n jugar al juego mas viejo del mundo";
    HtmlHelper::header($menuTop, $menuMedio, $cabezal);
    HtmlHelper::bodyArea();
    $menuBajo = array("Acerca de" => "acerca",
            "Algo mas" => "algo");
    $tab = 'acerca';

    HtmlHelper::bodyBackground($menuBajo, $tab);
  }
  static function header($menuTop, $menuMedio, $cabezal) {
    echo '
  <div id="topheader">
    <div class="topmenu_area">';
    echo '<a class="leftTopMenu"/>';
    foreach ($menuTop as $text => $link) {
      echo '      <a href="'.$link.'" class="topMenuItem">'.$text.'</a>';
    }
    echo '<a class="rightTopMenu"/>';
    echo '
    </div>
    <div class="banner_textarea">
      <p class="banner_head">'.$cabezal.'</div>
    <div class="search_menu_banner">
      <div class="search_background">
        <div class="searchname">Buscar</div>
        <div class="searchbox">
          <label>
            <input name="textfield" type="text" class="searchtextbox" />
          </label>
        </div>
        <div class="searchbox">
          <div align="center">
            <a href="#" class="go">go</a>
          </div>
        </div>
      </div>
      <div class="menu_area">';
    foreach ($menuMedio as $text => $link) {
      echo '      <a href="'.$link.'" class="comments">'.$text.'</a>';
    }
    echo '

      </div>

    </div>
  </div>';
  }
  static function bodyArea() {
    echo '  <div id="body_area">
    <div class="left">
      <div class="morelinks_top"></div>
      <div class="morelinks_area">
        <div class="morelinks_head">Mesas en Juego </div>
        <div class="links_morearea">
          ';
    juego::mostrarMesas();
    echo '
          <div class="freeregistration">
            <div align="center">
              Juega <span class="free">Gratis</span></div>
          </div>

        </div>
      </div>
      <div class="morelinks_bottom"></div>
    </div>
    <div class="body_area1">
      <div class="banner_bottom"></div>
      <div class="mid">
        <div class="tick_head">
          Bienvenido <span class="tick_head1">Juan</span> a TaTeTi Online
        </div>
        <div class="inner_banner">
          ';
    juego::mostrarJuego();
    echo '
        </div>
      </div>
      <div class="right_area">
        <div class="right_top"></div>
        <div class="right_head">
          <div class="morelinks_head">Top Jugadores </div>
        </div>
        <div class="right_links_area">
          <div class="links_morearea">
            ';
    juego::mostrarTop();
    echo '
          </div>
        </div>
        <div class="right_bottom"></div>
      </div>
    </div>
  </div>
';
  }
  static function bodyBackground($menuBajo, $tab) {
    echo '  <div class="body_areabackground">
    <div id="body_area1">
      <div class="inner_tabarea">
        <div class="inner_menu">
          <div align="center">
';
    foreach ($menuBajo as $text => $link) {
      echo '          <a href="'.$link.'" class="innermenu'.($link==$tab?'_hover':'').'">'.$text.'</a>';
    }
    echo '
          </div>
        </div>
        ';
    HtmlHelper::tab($tab);
    HtmlHelper::login();

    echo '
      <div class="toolfree_area">
        <div class="call_free">
          <span class="callus">Llamá</span>
          <span class="callno">(02) 4010816</span>
        </div>
        <div class="bookmark">Agregar a Favoritos</div>
        <!--<div class="facing"></div>-->
      </div>
    </div>
  </div>';
  }


  static function bodyEnd() {
    echo '
      </form>
    ';
  }

  static function footer($links, $cright) {

    echo '
    <div id="fotter">
      <div id="fotter_1">
        <div class="fotter_leftarea">
          <div class="fotter_links">';    
    foreach ($links as $text => $link) {
      echo '            <a href="'.$link.'" class="fotterlink">'.$text.'</a>  |';
    }    
    echo '
      </div>
          <div class="fotter_designed">
            Designed by: <a href="http://www.templateworld.com" class="fotter_designedlink">template world</a>
          </div>
        </div>
        <div class="fotter_rightarea">
          <div class="fotter_validation">
            <a href="http://validator.w3.org/check?uri=referer" class="validation">XHTML</a>
            <a href="http://jigsaw.w3.org/css-validator/check/referer" class="validation">CSS</a>
          </div>
          <div class="fotter_copyrights">
            '.$cright.'
          </div>
        </div>
      </div>
     </div>
  </body>
</html>
';
  }
  static function tab($tab) {

    if ($tab=='acerca') {
      echo '<div class="tab_text">
          <p class="tab_head">5 de Mayo</p>
          <p>
            <span class="tab_head1">Juego Alpha</span>
            <br />
            se aceptan los primeros jugadores en etapa Alpha Simplejugador
        </div>
        <div class="tab_readmore">
          <p align="right" class="tab_head">
            <a href="#" class="readmore">Leer mas</a>
          </p>
        </div>
      </div>';
    }
  }

  static function login() {
    echo '
      <div class="login_area">
        <div class="login_head">Ya sos miembro?</div>
        <div class="login_textarea">
          <div class="login_name">Usuario </div>
          <div class="login_box">
            <label>
              <input name="textfield2" type="text" class="logintextbox" />
            </label>
          </div>
        </div>
        <div class="login_textarea">
          <div class="login_name">Contraseña </div>
          <div class="login_box">
            <label>
              <input name="textfield22" type="text" class="logintextbox" />
            </label>
          </div>
        </div>
        <div class="login_textarea">
          <a href="#" class="register">Registrate Ya!</a>
          <a href="#" class="login">Login</a>
        </div>
      </div>';
  }
}
?>
