<?php 

  /*
   * Librerias Usadas
   */
  include "./lib/HtmlHelper.php";
  include "./lib/juego.php";
  include "./lib/mySql.php";

  /*
   * Cabezal
   *
   * Definicion del cabezal de página HTML con sus Scripts y Hojas de Estilo
   */
  $scripts = array('jquery', 'script');
  $css = array('style');

  HtmlHelper::head('TaTeT&iacute;', $scripts, $css);


 /*
  * Cuerpo
  */
  $menuTop = array("Login" => "login.html",
          "Ayuda" => "help.html",
          "Registrar" => "registrar.html");
  $menuMedio = array("Jugar" => "jugar",
          "Stats" => "stats",
          "Crear Mesa" => "mesa");

  $cabezal = "Bienvenidos al apasionante mundo del TaTeT&iacute; <p>En este sitio, uds. podr&aacute;n jugar al juego mas viejo del mundo";
  $menuBajo = array("Acerca de" => "acerca",
          "Algo mas" => "algo");
  $tab = 'acerca';
  HtmlHelper::bodyStart();
  HtmlHelper::bodyContent();
  HtmlHelper::bodyEnd();

  /*
   * Pie
   */
  $links = array("acerca" => "Acerca de",
            "produccion" => "Producci&oacute; n",
            "objetivos" => "Objetivos",
            "foro" => "Foro",
            "contacto" => "Contacto");
  $cright = "Marcos Tusso & Miguel Diab <br> Universidad ORT <br> Todos los derechos reservados (C) 2009";
  HtmlHelper::footer($links, $cright);
  
?>

