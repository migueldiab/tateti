<?php
class HtmlHelper {

  /**
   * Muestra el cabezal de página HTML, según el archivo en ./tempaltes/head.php
   *
   * @param string $title Titulo de la página
   * @param array $scripts Array de nombres de archivos JS a cargar
   * @param array $css Array de nombres de archivos CSS a cargar
   * @return string Código HTML a ser pareseado por el servidor Web
   * @author Miguel A. Diab & Marcos Tusso
   */
  static function head($title, $scripts, $css) {
    $variables['titulo'] = $title;
    $variables['scripts'] = "";
    $variables['css'] = "";
    foreach ($scripts as $script) {
      $variables['scripts'] .= '      <script src="./js/'.$script.'.js" type="application/javascript"></script>';
    }
    foreach ($css as $un_css) {
      $variables['css'] .= '      <link href="./css/'.$un_css.'.css" rel="stylesheet" type="text/css"/>';
    }
    return HtmlHelper::template("head.php", $variables);
  }

  /**
   * Muestra una imagen con un hipervinculo
   *
   * @param string $url URL o URI web a dónde apunta la referencia del hipervinculo
   * @param string $image Nombre de la imagen en formato JPG en el directorio ./images
   * @param string $alt Texto alternativo a mostrar mientras no se cargue la imagen.
   * @return string Código HTML a ser pareseado por el servidor Web
   * @author Miguel A. Diab & Marcos Tusso
   */
  static function img_link($url, $image, $alt) {
    $variables['url'] = $url;
    $variables['imagen'] = $image;
    $variables['alt'] = $alt;
    return HtmlHelper::template("imgLink.php", $variables);
  }

  /**
   * Muestra el cuerpo de la página
   *
   * @param array $menuTop Array de URL => Texto para los elementos del menú superior
   * @param array $menuMedio Array de URL => Texto para los elementos del menú intermedio
   * @param array $menuBajo Array de URL => Texto para los elementos del menú inferior
   * @param string $cabezal Texto institucional del cabezal de página
   * @param string $tab Nombre del Tab inferior seleccionado
   * @return string Código HTML a ser pareseado por el servidor Web
   * @author Miguel A. Diab & Marcos Tusso
   */
  static function bodyContent($menuTop, $menuMedio, $cabezal, $menuBajo, $tab, $datos ) {
    $bodyContent = HtmlHelper::header($menuTop, $menuMedio, $cabezal);
    $bodyContent .= HtmlHelper::bodyArea($datos);
    $bodyContent .= HtmlHelper::bodyBackground($menuBajo, $tab);
    return $bodyContent;
  }

  static function header($menuTop, $menuMedio, $cabezal) {
    $variables['menuTop'] = "";
    $variables['menuMedio'] = "";
    foreach ($menuTop as  $link => $text) {
      $variables['menuTop'] .= '      <a href="'.$link.'" class="topMenuItem">'.$text.'</a>';
    }
    foreach ($menuMedio as $link => $text) {
      $variables['menuMedio'] .= '      <a href="'.$link.'" class="comments">'.$text.'</a>';
    }
    $variables['cabezal'] = $cabezal;
    return HtmlHelper::template("header.php", $variables);
  }
  static function bodyArea($datos) {
    $variables['mostrarTop'] = juego::mostrarTop();
    $variables['usuario'] = isset($_SESSION["usuario"])?$_SESSION["usuario"]:'An&oacute;nimo';
    $variables['mostrarJuego'] = juego::mostrarJuego($datos);
    $variables['mostrarMesas'] = juego::mostrarMesas();
    $variables['jugar'] = "link a jugar?";
    return HtmlHelper::template("body.php", $variables);
  }
  static function bodyBackground($menuBajo, $tab) {
    $variables['menuBajo'] = "";
    foreach ($menuBajo as $link => $text) {
      $variables['menuBajo'] .= '          <a href="'.$link.'" class="innermenu'.($text==$tab?'_hover':'').'">'.$text.'</a>';
    }
    $variables['tab'] = HtmlHelper::tab($tab);
    
    
    if (!isset($_SESSION["usuario"])) {
      $variables['login'] = HtmlHelper::login();
    }
    else {
      $variables['login'] = '';
    }
    return HtmlHelper::template("bodyBackground.php", $variables);
  }

  /**
   * Muestra el pié de página con la información de contacto, empresa y copyright
   *
   * @param array $links Lista de URL => Texto de elementos a mostrar en el pié de página.
   * @param string $cright Texto según el tipo de licencia bajo el cuál se muestra la página.
   * @return string Código HTML a ser pareseado por el servidor Web
   * @author Miguel A. Diab & Marcos Tusso
   */
  static function footer($links, $cright) {
    $variables['links'] = "";
    $variables['copyright'] = $cright;
    foreach ($links as $link => $text) {
      $variables['links'] .= '            <a href="'.$link.'" class="fotterlink">'.$text.'</a>  |';
    }
    return HtmlHelper::template("footer.php", $variables);
  }

  static function help($menuTop, $menuBajo, $tab) {
    $menuMedio = array();
    $cabezal = 'Aprender a jugar al tateti lleva un minuto...<br><i>...dominarlo lleva una vida!</i>';
    $bodyContent = HtmlHelper::header($menuTop, $menuMedio, $cabezal);
    $bodyContent .= HtmlHelper::template("help.php", null);
    $bodyContent .= HtmlHelper::bodyBackground($menuBajo, $tab);
    return $bodyContent;
  }

  static function pageNotFound($menuTop, $menuBajo, $tab) {
    $menuMedio = array();
    $cabezal = 'Ooops! Tu entrada caus&oacute; un grave error<br>Nuestros ingenieros est&aacute;n intentando solucionar el problema';
    $bodyContent = HtmlHelper::header($menuTop, $menuMedio, $cabezal);
    $bodyContent .= HtmlHelper::template("error.php", null);
    $bodyContent .= HtmlHelper::bodyBackground($menuBajo, $tab);
    return $bodyContent;
  }

  static function registrate($menuTop, $menuBajo, $tab, $error = null) {
    $menuMedio = array();
    $cabezal = 'Registrate en TaTeT&iacute; Online.<br>Cre&aacute; tu cuenta y disfrut&aacute; del apasionante mundo del tatet&iacute;';
    if ($error!=null) {
      $variables['errorMsg'] = $error;
    }
    else {
      $variables['errorMsg'] = "";
    }
    $bodyContent = HtmlHelper::header($menuTop, $menuMedio, $cabezal);
    $bodyContent .= HtmlHelper::template("registrate.php", $variables);
    $bodyContent .= HtmlHelper::bodyBackground($menuBajo, $tab);
    return $bodyContent;
  }
  static function tab($tab) {
    if ($tab=='Acerca de') {
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

  /**
   * Muestra el cuadro de acceso al sistema para usuarios registrados
   *
   * @return string Código HTML a ser pareseado por el servidor Web
   * @author Miguel A. Diab & Marcos Tusso
   */
  static function login() {
    $variables['usuario'] = 'Usuario';
    $variables['miembro'] = 'Y&aacute; sos miembro?';
    $variables['password'] = 'Contrase&ntilde;a';
    $variables['registrate'] = 'Registrate Ya!';
    $variables['login'] = 'Entrar';
    $variables['errorMsg']=$_SESSION['error'];
    return HtmlHelper::template("login.php", $variables);
  }

  static function loginSimple($menuTop, $menuBajo, $tab, $error = null) {
    $menuMedio = array();
    $cabezal = 'Entra ya y juga...';
    if ($error!=null) {
      $variables['errorMsg'] = $error;
    }
    else {
      $variables['errorMsg'] = "";
    }
    $bodyContent = HtmlHelper::header($menuTop, $menuMedio, $cabezal);
    $bodyContent .= HtmlHelper::template("loginSimple.php", $variables);
    $bodyContent .= HtmlHelper::bodyBackground($menuBajo, $tab);
    return $bodyContent;
  }

  /**
   * Lee una plantila PHP/HTML con marcadores delimitados por {} y sustituye
   * las variables de igual nombre por el contenido de las mismas.
   *
   * @param $pagina Nombre de la plantilla ubicada en ./templates
   * @param $variables Array de elementos dinámicos a ser sustituidos
   * @return string Código HTML a ser pareseado por el servidor Web
   * @author Miguel A. Diab & Marcos Tusso
   */
  static function template($pagina, $variables) {
    return preg_replace("/\{([^\{]{1,100}?)\}/e","\$variables['$1']",file_get_contents("./templates/".$pagina));
    //return preg_replace("/\{([^\{]{1,100}?)\}/e","$$1",file_get_contents("./templates/".$pagina));
  }
}
?>
