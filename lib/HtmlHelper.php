<?php

class HtmlHelper {

  static function head($title, $scripts, $css) {
    $variables['titulo'] = $title;
    $variables['scripts'] = "";
    $variables['css'] = "";
    foreach ($scripts as $script) {
      $variables['scripts'] .= '      <script src="./js/'.$script.'.js" type="text/javascript"></script>';
    }
    foreach ($css as $un_css) {
      $variables['css'] .= '      <link href="./css/'.$un_css.'.css" rel="stylesheet" type="text/css"/>';
    }
    echo HtmlHelper::template("head.php", $variables);
  }

  static function img_link($url, $image, $alt) {
    $variables['url'] = $url;
    $variables['imagen'] = $image;
    $variables['alt'] = $alt;
    echo HtmlHelper::template("imgLink.php", $variables);
  }

static function bodyContent($menuTop, $menuMedio, $cabezal, $menuBajo, $tab ) {
    HtmlHelper::header($menuTop, $menuMedio, $cabezal);
    HtmlHelper::bodyArea();
    HtmlHelper::bodyBackground($menuBajo, $tab);
  }
  static function header($menuTop, $menuMedio, $cabezal) {
    $variables['menuTop'] = "";
    $variables['menuMedio'] = "";
    foreach ($menuTop as $text => $link) {
      $variables['menuTop'] .= '      <a href="'.$link.'" class="topMenuItem">'.$text.'</a>';
    }
    foreach ($menuMedio as $text => $link) {
      $variables['menuMedio'] .= '      <a href="'.$link.'" class="comments">'.$text.'</a>';
    }
    $variables['cabezal'] = $cabezal;
    echo HtmlHelper::template("header.php", $variables);
  }
  static function bodyArea() {
    $variables['mostrarTop'] = juego::mostrarTop();
    $variables['mostrarJuego'] = juego::mostrarJuego();
    $variables['mostrarMesas'] = juego::mostrarMesas();
    echo HtmlHelper::template("body.php", $variables);
  }
  static function bodyBackground($menuBajo, $tab) {
    $variables['menuBajo'] = "";
    foreach ($menuBajo as $text => $link) {
      $variables['menuBajo'] .= '          <a href="'.$link.'" class="innermenu'.($link==$tab?'_hover':'').'">'.$text.'</a>';
    }
    $variables['tab'] = HtmlHelper::tab($tab);
    $variables['login'] = HtmlHelper::login();
    echo HtmlHelper::template("bodyBackground.php", $variables);
  }


  static function footer($links, $cright) {
    $variables['links'] = "";
    $variables['copyright'] = $cright;
    foreach ($links as $text => $link) {
      $variables['links'] .= '            <a href="'.$link.'" class="fotterlink">'.$text.'</a>  |';
    }
    echo HtmlHelper::template("footer.php", $variables);
  }

  static function tab($tab) {
    if ($tab=='acerca') {
      $tab =  '<div class="tab_text">
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
    return $tab;
  }

  static function login() {
    $variables['usuario'] = 'Usuario';
    $variables['miembro'] = 'Y&aacute; sos miembro?';
    $variables['password'] = 'Contrase&ntilde;a';
    $variables['registrate'] = 'Registrate Ya!';
    $variables['login'] = 'Entrar';
    return HtmlHelper::template("login.php", $variables);
  }

  static function template($pagina, $variables) {    
    return preg_replace("/\{([^\{]{1,100}?)\}/e","\$variables['$1']",file_get_contents("./templates/".$pagina));
    //return preg_replace("/\{([^\{]{1,100}?)\}/e","$$1",file_get_contents("./templates/".$pagina));
  }
}
?>
