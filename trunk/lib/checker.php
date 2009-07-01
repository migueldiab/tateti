<?php
session_start();
require_once  "../index.php";
function __autoload($class_name) {
    require_once $class_name . '.php';
}
$unaMesa=new Mesa();
$id = $_POST["id"];
$jugadores=$_POST["jugadores"];
$unaMesa=Mesa::obtenerPorId($_SESSION["mesa"]->getid());
$tipoDato=$_POST["tipo"];
//$yo=$_SESSION["usuario"];

if($tipoDato=="checkOponente"){
if($unaMesa->getJugador2()!=null){
    if($unaMesa->getJugadas()==null){
    $datos=array('activo' => 'true');

        echo json_encode($datos);
    }else if($mesa->getJugadas!=null){
        echo json_encode($mesa->ultimoJugador);
    }

}else{
   $datos=array('activo' => 'false');
        echo json_encode($datos);
}
}else if($tipoDato=="grabarJugada"){
    $idCampo=$_POST["idCampo"];
    $esCruz=$_POST["esCruz"];
    $jugada=Fachada::grabarJugada($idCampo, $esCruz);
    $retorno=array('es_cruz'     => $esCruz,
                   'idJugada'    => $jugada->getId(),
                   'idCampo'     => $jugada->getIdCampo(),
                   'idJugador'   => $jugada->getJugador()->getId()
                   );
$_SESSION["UltimoIdJugada"]=$jugada->getId();
echo json_encode($retorno);
}



?>
