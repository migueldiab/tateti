<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fachadaclass
 *
 * @author Administrator
 */
  include "./lib/Sistema.php";
  include "./lib/mySql.php";
  include "./lib/juego.php";

  include "./modelo/pUsuario.php";

class Fachada {

  /**
   * Procesa una entrada de Index.php y la redirige acorde a la fachada.
   *
   * @param string $pagina   Nombre de la función en fachada a ser llamada.
   * @param array  $valores  Array de parámetros con los que se llama a la función.
   * @return 
   * @author Miguel A. Diab & Marcos Tusso
   */
  static function procesar($pagina, $valores) {
    if ($valores==null) {
     call_user_func("Fachada::".$pagina);
    }
    else {
     call_user_func("Fachada::".$pagina, $valores);
    }
  }

  static function logout() {
    Sistema::logout();
  }
  static function login() {
    Sistema::login();
  }
  static function entrar($valores) {
    Sistema::entrar($valores);
  }
  static function principal() {
    Sistema::principal();
  }
  static function registrate() {
    Sistema::registrate();
  }
  static function registrar($valores) {
    Sistema::registrar($valores);
  }

}
?>
