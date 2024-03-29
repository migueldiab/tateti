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
    $css = array('style');
    echo HtmlHelper::head('TaTeT&iacute;', Sistema::javaScripts(), $css);
    /* Cuerpo  */
    $menuTop['index.php?pagina=principal'] = 'Jugar';
    $menuTop["index.php?pagina=help"] = "Ayuda";
    $menuTop["index.php?pagina=registrate"] = "Registrar";

    $menuBajo = Sistema::bottomTabs();
    $tab = 'Acerca de';
    echo HtmlHelper::loginSimple($menuTop, $menuBajo, $tab);
    /* Pie */
    $links = Sistema::bottomLinks();
    $cright = "Marcos Tusso & Miguel Diab <br> Universidad ORT <br> Todos los derechos reservados (C) 2009";
    echo HtmlHelper::footer($links, $cright);

  }
  static function principal() {
      /* Cabezal */
      $css = array('style');
      echo HtmlHelper::head('TaTeT&iacute;', Sistema::javaScripts(), $css);
      /* Cuerpo  */
      if (isset($_SESSION["usuario"])) {
        $menuTop['index.php?pagina=logout'] = 'Logout';
      }
      else {
        $menuTop['index.php?pagina=login'] = 'Login';
      }
      $menuTop["index.php?pagina=help"] = "Ayuda";
      $menuTop["index.php?pagina=registrate"] = "Registrar";

      $menuMedio = Sistema::middleMenu();
          $cabezal = "Bienvenidos al apasionante mundo del TaTeT&iacute; <p>En este sitio, uds. podr&aacute;n jugar al juego mas viejo del mundo";
      $menuBajo = Sistema::bottomTabs();
      $tab = 'Acerca de';
      echo HtmlHelper::bodyContent($menuTop, $menuMedio, $cabezal, $menuBajo, $tab, null);
      /* Pie */
      $links = Sistema::bottomLinks();
      $cright = "Marcos Tusso & Miguel Diab <br> Universidad ORT <br> Todos los derechos reservados (C) 2009";
      echo HtmlHelper::footer($links, $cright);
  }
  static function registrate($error = null) {
      if (isset($_SESSION["usuario"])) {
          Sistema::principal();
      }
      /* Cabezal */
      $css = array('style');
      echo HtmlHelper::head('TaTeT&iacute;', Sistema::javaScripts(), $css);
      /* Cuerpo  */
      $menuTop['index.php?pagina=login'] = 'Login';
      $menuTop["index.php?pagina=help"] = "Ayuda";
      $menuTop["index.php?pagina=principal"] = "Jugar";

      $menuBajo = Sistema::bottomTabs();
      $tab = 'Acerca de';
      echo HtmlHelper::registrate($menuTop, $menuBajo, $tab, $error);
      /* Pie */
      $links = Sistema::bottomLinks();
      $cright = "Marcos Tusso & Miguel Diab <br> Universidad ORT <br> Todos los derechos reservados (C) 2009";
      echo HtmlHelper::footer($links, $cright);
  }

  static function enJuego() {
    /* Cabezal */
    $css = array('style');
    echo HtmlHelper::head('TaTeT&iacute;', Sistema::javaScripts(), $css);

    /* Cuerpo  */
    if (isset($_SESSION["usuario"])) {
      $menuTop['index.php?pagina=logout'] = 'Logout';
    }
    else {
      $menuTop['index.php?pagina=login'] = 'Login';
    }
    $menuTop["index.php?pagina=help"] = "Ayuda";
    $menuTop["index.php?pagina=registrate"] = "Registrar";
    $menuMedio = Sistema::middleMenu();
    $cabezal = "Bienvenidos al apasionante mundo del TaTeT&iacute; <p>En este sitio, uds. podr&aacute;n jugar al juego mas viejo del mundo";
    $menuBajo = Sistema::bottomTabs();
    $tab = 'Acerca de';
    $unaMesa = $_SESSION["mesa"];
    if($unaMesa!=null)
    {
      $soyX = false;
      $soyO = false;
      $unaMesa=Mesa::obtenerPorId($_SESSION["mesa"]->getId());
      if($unaMesa->getEstado()==Mesa::MESA_ACTIVA)
      {
        if ($unaMesa->getJugador1()==$_SESSION['usuario']) {
          $soyX = true;
        }
        elseif ($unaMesa->getJugador2()==$_SESSION['usuario']) {
          $soyO = true;
        }
        $X = 0;
        $O = 0;
        if ($unaMesa->getJugadas()!=null) {
          while ($unaMesa->getJugadas()->hasNext()) {
            $unaJugada = new Jugada();
            $unaJugada = $unaMesa->getJugadas()->next();
            if ($unaJugada->getEsCruz()) {
              $variables['campo_'.$unaJugada->getIdCampo()] = 'X';
              $X++;
            }
            else {
              $variables['campo_'.$unaJugada->getIdCampo()] = 'O';
              $O++;
            }
          }          
        }
        else if($unaMesa->getEstado()==Mesa::MESA_EN_ESPERA)
        {
          $variables['jugadores']='1';
        }
        $variables['jugadores']='2';
        if ($X>$O) {
          if ($soyO) {
            $variables['esMiTurno']='1';
          }
          else {
           $variables['esMiTurno']='0';
          }
        }
        else {
          if ($soyX) {
            $variables['esMiTurno']='';
          }
          else {
           $variables['esMiTurno']='0';
          }
        }
      }
      else if($unaMesa->getEstado()==Mesa::MESA_EN_ESPERA)
      {
 // MARCOS SACO ESTO       echo "<script language=javascript> juegoEnEspera(); </script>";
        $variables['jugadores']='1';
      }
    }
    echo HtmlHelper::bodyContent($menuTop, $menuMedio, $cabezal, $menuBajo, $tab, $variables);
    /* Pie */
    $links = Sistema::bottomLinks();
    $cright = "Marcos Tusso & Miguel Diab<br> Universidad ORT <br> Todos los derechos reservados (C) 2009";
    echo HtmlHelper::footer($links, $cright);
    echo $finish;
  }

  static function registrar($valores) {
    $usuario = $valores['usuario'];
    $email = $valores['email'];
    $clave = $valores['contrasena'];

    $unUsuario = Usuario::obtenerPorNombre($usuario);
    if ($unUsuario!=null) {
      Sistema::registrate("El nombre de usuario ya existe");
    }
    else {
      $unUsuario = new Usuario();
      $unUsuario->setEmail($email);
      $unUsuario->setUsuario($usuario);
      $unUsuario->setClaveEncryptar($clave);
      $unUsuario->save();
      
    }  
    $unUsuario = Usuario::autenticarUsuario($usuario,$clave);
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

  static function bottomLinks() {
    return array("index.php?pagina=acerca" => "Acerca de",
              "index.php?pagina=produccion" => "Producci&oacute;n",
              "index.php?pagina=objetivos" => "Objetivos",
              "index.php?pagina=foro" => "Foro",
              "index.php?pagina=contacto" => "Contacto");
  }
  static function bottomTabs() {
    return array("index.php?pagina=acerca" => "Acerca de" ,
              "index.php?pagina=algo" => "Algo mas");
  }
  static function middleMenu() {
    return array("index.php?pagina=jugar" => "Jugar",
                  "index.php?pagina=stats"=> "Stats",
                  "index.php?pagina=mesa"=> "Crear Mesa");
  }
  static function javaScripts() {
    return array('jquery', 'script', 'validaciones');
  }
}



?>
