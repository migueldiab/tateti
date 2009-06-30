<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fachada Class
 *
 * @author Administrator
 */
  /*
   * Librerias Usadas 
   */
  include_once  "./lib/Sistema.php";
  include_once  "./lib/HtmlHelper.php";
  include_once  "./lib/Generico.php";
  include_once  "./lib/mySql.php";
  include_once  "./lib/juego.php";
  include_once  "./lib/Usuario.php";
  include_once  "./lib/Jugador.php";
  include_once  "./lib/Jugada.php";
  include_once  "./lib/Mesa.php";
  include_once  "./vendor/ArrayList.php";
  
  include_once  "./modelo/pUsuario.php";
  include_once  "./modelo/pMesa.php";
  include_once  "./modelo/pJugada.php";

class Fachada {

  /**
   * Procesa una entrada de Index.php y la redirige acorde a la fachada.
   * De no tener una redirección válida, muestra la página de error.
   *
   * @param string $pagina   Nombre de la función en fachada a ser llamada.
   * @param array  $valores  Array de parámetros con los que se llama a la función.
   * @return 
   * @author Miguel A. Diab & Marcos Tusso
   */
  static function procesar($pagina, $valores) {
    if ($valores==null) {
     $pagina = @call_user_func("Fachada::".$pagina);
     if ($pagina!=true) {
       return Generico::pageNotFound();
     }
    }
    else {
      $pagina = @call_user_func("Fachada::".$pagina, $valores);
      if ($pagina!=true) {
       return Generico::pageNotFound();
     }
    }
  }

  static function logout() {
    Sistema::logout();
    return true;
  }
  static function login() {
    Sistema::login();
    return true;
  }
  static function entrar($valores) {
    Sistema::entrar($valores);
    return true;
  }
  static function principal() {
    Sistema::principal();
    return true;
  }
  static function registrate() {
    Sistema::registrate();
    return true;
  }
  static function registrar($valores) {
    Sistema::registrar($valores);
    return true;
  }
  static function help() {
    Generico::help();
    return true;
  }
  static function jugar() {
    juego::jugar();
    return true;
  }
  
  
}
?>
