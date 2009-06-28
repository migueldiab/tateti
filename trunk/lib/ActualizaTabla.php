<?php
  $mesa=$_SESSION["mesa"];
  $id = $_POST["id"];
  $idCampo = $_POST["idCampo"];
  $tipo = $_POST["tipo"];
  if($mesa!=null){
        $jugada=pJugada::obtenerPorIdJugada($id()+1);
        if($jugada!=null){
            return $jugada;
        }else{
            return 0;
        }

    }else if($idCampo!=null){
        $laMesa=$_SESSION["mesa"];
        $unaJugada=new Jugada();
        if($tipo=="X"){
            $unaJugada->setEsCruz(1);
        }else{
            $unaJugada->setEsCruz(0);
        }
        $unaJugada->setIdCampo($idCampo);
        $unaJugada->setJugador($_SESSION["usuario"]->getId());
        $unaJugada->setMesa($laMesa->getIdMesa());
        $unaJugada->save();
    }

?>
