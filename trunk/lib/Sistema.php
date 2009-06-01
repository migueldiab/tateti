<?php
include_once './lib/Usuario.php';

class Sistema {

  static function procesar($pagina, $valores) {
    if ($valores==null) {
     call_user_func("Sistema::".$pagina);
    }
    else {
     call_user_func("Sistema::".$pagina, $valores);
    }
  }
  static function logout() {
    $_SESSION["usuario"]=null;
    Sistema::principal();
  }
  static function login() {
    die("Todavia no esta implementado... paciencia");
    
  }
  static function entrar($valores) {
    $usuario = $valores['usuario'];
    $clave = $valores['contrasena'];
    if ((strlen($usuario)>3) &&
        (strlen($clave)>3))
    {
        $unUsuario = Usuario::autenticarUsuario($usuario, $clave);
        if ($unUsuario!=null) {
          $_SESSION["usuario"] = $unUsuario;
        }
        else {
          $_SESSION['error'] = "Usuario y clave incorrecto";
        }
    }
    else {
      $_SESSION['error'] = "El usuario y la clave deben tener al menos 3 caracteres";
    }
    Sistema::principal();
  }
  static function principal() {
      /* Cabezal */
      $scripts = array('jquery', 'script', 'validaciones');
      $css = array('style');
      echo HtmlHelper::head('TaTeT&iacute;', $scripts, $css);
      /* Cuerpo  */
      if (isset($_SESSION["usuario"])) {
        $menuTop['Logout'] = 'index.php?pagina=logout';
      }
      else {
        $menuTop['Login'] = 'index.php?pagina=login';
      }
      $menuTop["Ayuda"] = "help.html";
      $menuTop["Registrar"] = "registrar.html";

      $menuMedio = array("Jugar" => "jugar",
              "Stats" => "stats",
              "Crear Mesa" => "mesa");
      $cabezal = "Bienvenidos al apasionante mundo del TaTeT&iacute; <p>En este sitio, uds. podr&aacute;n jugar al juego mas viejo del mundo";
      $menuBajo = array("Acerca de" => "acerca",
              "Algo mas" => "algo");
      $tab = 'acerca';
      echo HtmlHelper::bodyContent($menuTop, $menuMedio, $cabezal, $menuBajo, $tab);
      /* Pie */
      $links = array("acerca" => "Acerca de",
                "produccion" => "Producci&oacute; n",
                "objetivos" => "Objetivos",
                "foro" => "Foro",
                "contacto" => "Contacto");
      $cright = "Marcos Tusso & Miguel Diab <br> Universidad ORT <br> Todos los derechos reservados (C) 2009";
      echo HtmlHelper::footer($links, $cright);
  }
  static function registrate() {
      if (isset($_SESSION["usuario"])) {
          Sistema::principal();
      }
      /* Cabezal */
      $scripts = array('jquery', 'script', 'validaciones');
      $css = array('style');
      echo HtmlHelper::head('TaTeT&iacute;', $scripts, $css);
      /* Cuerpo  */
      $menuTop['Login'] = 'index.php?pagina=login';
      $menuTop["Ayuda"] = "help.html";
      $menuTop["Registrar"] = "registrar.html";

      $menuBajo = array("Acerca de" => "acerca",
              "Algo mas" => "algo");
      $tab = 'acerca';
      echo HtmlHelper::registrate($menuTop, $menuBajo, $tab);
      /* Pie */
      $links = array("acerca" => "Acerca de",
                "produccion" => "Producci&oacute; n",
                "objetivos" => "Objetivos",
                "foro" => "Foro",
                "contacto" => "Contacto");
      $cright = "Marcos Tusso & Miguel Diab <br> Universidad ORT <br> Todos los derechos reservados (C) 2009";
      echo HtmlHelper::footer($links, $cright);
  }
  static function registrar($valores) {
    $usuario = $valores['usuario'];
    $clave = $valores['contrasena'];
    echo $usuario;
    exit;
  }
  
}

?>
