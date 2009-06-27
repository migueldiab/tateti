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
      if (isset($_SESSION["usuario"])) {
        $menuTop['index.php?pagina=logout'] = 'Logout';
      }
      else {
        $menuTop['index.php?pagina=login'] = 'Login';
      }
      $menuTop["index.php?pagina=principal"] = "Jugar";
      $menuTop["index.php?pagina=registrate"] = "Registrar";

      $menuBajo = Sistema::bottomTabs();
      $tab = 'Acerca de';
      echo HtmlHelper::help($menuTop, $menuBajo, $tab);
      /* Pie */
      $links = Sistema::bottomLinks();
      $cright = "Marcos Tusso & Miguel Diab <br> Universidad ORT <br> Todos los derechos reservados (C) 2009";
      echo HtmlHelper::footer($links, $cright);
    }
    static function pageNotFound() {
      /* Cabezal */
      $scripts = array('jquery', 'script', 'validaciones');
      $css = array('style');
      echo HtmlHelper::head('TaTeT&iacute;', $scripts, $css);
      /* Cuerpo  */
      if (isset($_SESSION["usuario"])) {
        $menuTop['index.php?pagina=logout'] = 'Logout';
      }
      else {
        $menuTop['index.php?pagina=login'] = 'Login';
      }
      $menuTop["index.php?pagina=principal"] = "Jugar";
      $menuTop["index.php?pagina=registrate"] = "Registrar";

      $menuBajo = Sistema::bottomTabs();
      $tab = 'Acerca de';
      echo HtmlHelper::pageNotFound($menuTop, $menuBajo, $tab);
      /* Pie */
      $links = Sistema::bottomLinks();
      $cright = "Marcos Tusso & Miguel Diab <br> Universidad ORT <br> Todos los derechos reservados (C) 2009";
      echo HtmlHelper::footer($links, $cright);
    }
}
?>
