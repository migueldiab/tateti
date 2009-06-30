<?php
session_start();
function __autoload($class_name) {
    require_once $class_name . '.php';
}
$unaMesa=new Mesa();
$id = $_POST["id"];
$jugadores=$_POST["jugadores"];
$unaMesa=Mesa::obtenerPorId($_SESSION["mesa"]->getid());

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
