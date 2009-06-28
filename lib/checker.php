<?php
$id = $_POST["id"];
$jugadores=$_POST["jugadores"];
$mesa=$_SESSION["mesa"];
$yo=$_SESSION["usuario"];
if($mesa->getJugador2()!=null){
    if($mesa->getJugadas()==null){
    $datos=array('activo' =>true);

        return json_encode($yo);
    }else if($mesa->getJugadas!=null){
        return json_encode($mesa->ultimoJugador);
    }

}else{
    return null;
}



?>
