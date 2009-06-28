<?php
  $mesa=$_SESSION["mesa"];
  $id = $_POST["id"];
  if($mesa!=null){
        $jugada=pJugada::obtenerPorIdJugada($id()+1);
        if($jugada!=null){
            return $jugada;
        }else{
            return 0;
        }

    }

?>
