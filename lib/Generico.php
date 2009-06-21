<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Generico
 *
 * @author Administrator
 */
class Generico {
    static function help() {
      /* Cabezal */
      $scripts = array('jquery', 'script', 'validaciones');
      $css = array('style');
      echo HtmlHelper::head('TaTeT&iacute;', $scripts, $css);
      /* Cuerpo  */
      $menuTop['Login'] = 'index.php?pagina=login';
      $menuTop['Jugar'] = 'index.php?pagina=principal';
      $menuTop["Registrar"] = "index.php?pagina=registrate";

      $menuBajo = array("Acerca de" => "acerca",
              "Algo mas" => "algo");
      $tab = 'acerca';
      echo HtmlHelper::help($menuTop, $menuBajo, $tab);
      /* Pie */
      $links = array("acerca" => "Acerca de",
                "produccion" => "Producci&oacute; n",
                "objetivos" => "Objetivos",
                "foro" => "Foro",
                "contacto" => "Contacto");
      $cright = "Marcos Tusso & Miguel Diab <br> Universidad ORT <br> Todos los derechos reservados (C) 2009";
      echo HtmlHelper::footer($links, $cright);
    }
}
?>
