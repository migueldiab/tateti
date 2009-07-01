<?php
session_start();
require_once  "../index.php";
function __autoload($class_name) {
    require_once $class_name . '.php';
}
  $mesa=$_SESSION["mesa"];
  $id = $_POST["id"];

  $tipo = $_POST["tipo"];
  if($mesa!=null){
     // $ultimaJugadaJugador=jugada::obtenerUltimaPorJugador($_SESSION["usuario"]->getId());
  //    if($ultimaJugadaJugador!=null){

  //   $next=$id+1;
      $jugada=jugada::obtenerPorIdJugada($_SESSION["UltimoIdJugada"]);
   //   }
        if($jugada!=null){
            echo json_encode($jugada);
        }else{
            echo json_encode(array('idJugada' => -1));
        }


  }

?>
