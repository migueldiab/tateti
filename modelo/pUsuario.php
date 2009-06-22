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

    static function obtenerPorNombre($usuario) {
      $mySqlResource = mySql::connect_db();
      $query="SELECT * FROM usuario WHERE usuario = '$usuario'";
      $result=mysql_query($query);

      if (mysql_affected_rows()==1) {
        mysql_close($mySqlResource);
        $data = mysql_fetch_array($result);
        $unUsuario = new Usuario();
        $unUsuario->setEmail($data["email"]);
        $unUsuario->setUsuario($data["usuario"]);
        $unUsuario->setClave($data["clave"]);
        $unUsuario->setApellido($data["apellido"]);
        $unUsuario->setId($data["id"]);
        $unUsuario->setNombre($data["nombre"]);
        return $unUsuario;
      }
      else {
        mysql_close($mySqlResource);
        return null;
      }
    }
    static function obtenerPorId($id) {
      $mySqlResource = mySql::connect_db();
      $query="SELECT * FROM usuario WHERE id = '$id'";
      $result=mysql_query($query);
      
      if (mysql_affected_rows()==1) {
        mysql_close($mySqlResource);
        $data = mysql_fetch_array($result);
        $unUsuario = new Usuario();
        $unUsuario->setId($data["id"]);
        $unUsuario->setEmail($data["email"]);
        $unUsuario->setUsuario($data["usuario"]);
        $unUsuario->setClave($data["clave"]);
        $unUsuario->setApellido($data["apellido"]);
        $unUsuario->setNombre($data["nombre"]);
        return $unUsuario;
      }
      else {
        mysql_close($mySqlResource);
        return null;
      }
    }
    static function save($unUsuario) {
      if ($unUsuario!=null) {
        $mySqlResource = mySql::connect_db();
        $query="REPLACE INTO usuario (nombre, apellido, email, usuario, clave)
                VALUES (
                '".$unUsuario->getNombre()."',
                '".$unUsuario->getApellido()."',
                '".$unUsuario->getEmail()."',
                '".$unUsuario->getUsuario()."',
                '".$unUsuario->getClave()."')";
        $result=mysql_query($query);
        mysql_close($mySqlResource);
        if (!$result) {
          die (mysql_error());
        }
      }
      else {
        die("Null User on Save");
      }
      return true;

    }
}
?>
