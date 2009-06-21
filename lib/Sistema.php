<?php

class Sistema {


  static function logout() {
    $_SESSION["usuario"]=null;  
    Sistema::principal();
  }
  static function login() {
    if (isset($_SESSION["usuario"])) {
          Sistema::principal();
      }
      /* Cabezal */
      $scripts = array('jquery', 'script', 'validaciones');
      $css = array('style');
      echo HtmlHelper::head('TaTeT&iacute;', $scripts, $css);
      /* Cuerpo  */
      $menuTop['Jugar'] = 'index.php?pagina=principal';
      $menuTop["Ayuda"] = "index.php?pagina=help";
      $menuTop["Registrar"] = "index.php?pagina=registrate";

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
      $menuTop["Ayuda"] = "index.php?pagina=help";
      $menuTop["Registrar"] = "index.php?pagina=registrate";

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
      $menuTop["Ayuda"] = "index.php?pagina=help";
      $menuTop['Jugar'] = 'index.php?pagina=principal';

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
    $email = $valores['email'];
    $clave = $valores['contrasena'];

    $unUsuario = Usuario::obtenerPorNombre($usuario);
    if ($unUsuario==null) {
      die("Existe usuario");
    }
    else {
      $unUsuario = new Usuario();
      $unUsuario->setEmail($email);
      $unUsuario->setUsuario($usuario);
      $unUsuario->setClaveEncryptar($clave);
      $unUsuario->save();
      
    }  
    $unUsuario = Usuario::autenticarUsuario($usuario, $clave);
    if ($unUsuario!=null) {
      $_SESSION["usuario"] = $unUsuario;
      Sistema::principal();
    }
    else {
      $_SESSION['error'] = "No se pudo auto ingresar al sistema. Intente manualmente.";
    }
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
}

?>
