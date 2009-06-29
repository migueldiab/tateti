<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pUsuario
 *
 * @author Administrator
 */
class pUsuario {

  const TABLA = 'usuario';

  const ID = 'id';
  const NOMBRE = 'nombre';
  const APELLIDO = 'apellido';
  const EMAIL = 'email';
  const USUARIO = 'usuario';
  const CLAVE = 'clave';


  static function cargarMySqlRow($mySqlRow) {
    $unUsuario = new Usuario();
    $unUsuario->setId($mySqlRow[pUsuario::ID]);
    $unUsuario->setNombre($mySqlRow[pUsuario::NOMBRE]);
    $unUsuario->setApellido($mySqlRow[pUsuario::APELLIDO]);
    $unUsuario->setEmail($mySqlRow[pUsuario::EMAIL]);
    $unUsuario->setUsuario($mySqlRow[pUsuario::USUARIO]);
    $unUsuario->setClave($mySqlRow[pUsuario::CLAVE]);
    return $unUsuario;
  }

  static function cargarMySqlRowJugador($mySqlRow) {
    $unJugador = new Jugador();
    $unJugador->setId($mySqlRow[pUsuario::ID]);
    $unJugador->setNombre($mySqlRow[pUsuario::NOMBRE]);
    $unJugador->setApellido($mySqlRow[pUsuario::APELLIDO]);
    $unJugador->setEmail($mySqlRow[pUsuario::EMAIL]);
    $unJugador->setUsuario($mySqlRow[pUsuario::USUARIO]);
    $unJugador->setClave($mySqlRow[pUsuario::CLAVE]);
    return $unJugador;
  }

    static function obtenerPorNombre($usuario) {
      $result=mySql::query("SELECT * FROM ".pUsuario::TABLA." WHERE ".pUsuario::USUARIO." = '$usuario'");
      if (mysql_num_rows($result)==1) {
        $data = mysql_fetch_array($result);
        $unUsuario = pUsuario::cargarMySqlRow($data);
        return $unUsuario;
      }
      else {
        return null;
      }
    }
    static function obtenerPorId($id) {
      $result=mySql::query("SELECT * FROM ".pUsuario::TABLA." WHERE ".pUsuario::ID." = '$id'");      
      if (mysql_num_rows($result)==1) {
        $data = mysql_fetch_array($result);
        $unUsuario = pUsuario::cargarMySqlRow($data);
        return $unUsuario;
      }
      else {
        return null;
      }
    }
    static function listarJugadores() {
      $result=mySql::query("SELECT * FROM ".pUsuario::TABLA);
      $lista = new ArrayList();
      while ($row = mysql_fetch_array($result)) {
        $unJugador = pUsuario::cargarMySqlRowJugador($row);
        $victorias = Mesa::obtenerVictoriasPorJugador($unJugador);
        $unJugador->setVictorias($victorias);
        $lista->add($unJugador);
      }
      return $lista;
    }
    static function save($unUsuario) {
      if ($unUsuario!=null) {
        $query="REPLACE INTO ".pUsuario::TABLA." (".pUsuario::NOMBRE.", ".pUsuario::APELLIDO.", ".pUsuario::EMAIL.", ".pUsuario::USUARIO.", ".pUsuario::CLAVE.")
                VALUES (
                '".$unUsuario->getNombre()."',
                '".$unUsuario->getApellido()."',
                '".$unUsuario->getEmail()."',
                '".$unUsuario->getUsuario()."',
                '".$unUsuario->getClave()."')";
        $result=mySql::query($query);
      }
      else {
        die("Null User on Save");
      }
      return true;
    }
}
?>
