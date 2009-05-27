<?php 

  /* Librerias Usadas */
  include "./lib/HtmlHelper.php";
  include "./lib/Sistema.php";
  include "./lib/juego.php";
  include "./lib/mySql.php";

  if (!empty($_POST) || !empty($_GET)) {
    if (isset($_POST['pagina'])) {
      Sistema::procesar($_POST['pagina'], $_POST);
    }
    elseif (isset($_GET['pagina'])) {
      Sistema::procesar($_GET['pagina'], null);
    }
    else {
      die("Error!");
    }
  }
  
  /* Cabezal */
  $scripts = array('jquery', 'script');
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
  
?>

