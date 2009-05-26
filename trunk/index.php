<?php 

  include "./lib/HtmlHelper.php";
  include "./lib/juego.php";

  $scripts = array('jquery', 'script');
  $css = array('style');
  
  HtmlHelper::head('TaTeT&iacute;', $scripts, $css);

 
  HtmlHelper::bodyStart();
  HtmlHelper::bodyContent();
  HtmlHelper::bodyEnd();

  $links = array("acerca" => "Acerca de",
            "produccion" => "Producci&oacute; n",
            "objetivos" => "Objetivos",
            "foro" => "Foro",
            "contacto" => "Contacto");
  $cright = "M&aacute; rcos Tusso & Miguel Diab <br> Universidad ORT <br> Todos los derechos reservados (C) 2009";
  HtmlHelper::footer($links, $cright);



  ?>

