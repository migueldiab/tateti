<?php
$id = $_POST["id"];
$jugadores=$_POST["jugadores"];
$mesa=$_SESSION["mesa"];

if($mesa->getJugador2()!=null){
    echo "seleccionarXO";
}else{
    echo "SinJugador";
}



?>
