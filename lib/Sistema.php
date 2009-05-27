<?php
include_once './lib/Usuario.php';

class Sistema {

  static function procesar($pagina, $valores) {
    if ($valores==null) {
     call_user_func("Sistema::".$pagina);
    }
    else {
     call_user_func("Sistema::".$pagina, $valores);
    }
  }
  static function logout() {
    $_SESSION["usuario"]=null;
  }
  static function login() {
    die("Todavia no esta implementado... paciencia");
  }
  static function entrar($valores) {
    $usuario = $valores['usuario'];
    $clave = $valores['contrasena'];
    if ((strlen($usuario)>3) &&
        (strlen($clave)>3)) {
        if (($unUsuario = Usuario::autenticarUsuario($usuario, $clave))!=null) {


          $_SESSION["usuario"] = $unUsuario;
          return true;
        }
        else {
          return false;
        }
    }
    else {
           
      return false;
    }
  }

  
}

?>
