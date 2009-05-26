<?php 

  include "./lib/HtmlHelper.php";
  include "./lib/juego.php";

  $scripts = array();
  $css = array('style');
  
  HtmlHelper::head('TaTeTi', $scripts, $css);

 
  HtmlHelper::bodyStart();
  HtmlHelper::bodyContent();
  HtmlHelper::bodyEnd();

  $links = array("acerca" => "Acerca de",
            "produccion" => "Producción",
            "objetivos" => "Objetivos",
            "foro" => "Foro",
            "contacto" => "Contacto");
  HtmlHelper::footer($links, $cpright);



  ?>

