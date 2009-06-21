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
      mySql::connect_db();
      $query="SELECT * FROM usuario WHERE usuario = '$usuario'";
      $result=mysql_query($query);

      if (mysql_affected_rows()==1) {
        $data = mysql_fetch_array($result);
        $unUsuario = new Usuario();
        $unUsuario->setEmail($data["email"]);
        $unUsuario->setUsuario($data["usuario"]);
        $unUsuario->setClave($data["clave"]);
        $unUsuario->setApellido($data["apellido"]);
        $unUsuario->setId($data["id"]);
        $unUsuario->setNombre($data["nombre"]);
        mysql_close();
        return $unUsuario;
      }
      else {
        return null;
      }

    }
    static function save($unUsuario) {
      if ($unUsuario!=null) {
        mySql::connect_db();
        $query="REPLACE INTO usuario (nombre, apellido, email, usuario, clave)
                VALUES (
                '".$unUsuario->getNombre()."',
                '".$unUsuario->getApellido()."',
                '".$unUsuario->getEmail()."',
                '".$unUsuario->getUsuario()."',
                '".$unUsuario->getClave()."')";
        $result=mysql_query($query);
        if (!$result) {
          die (mysql_error());
        }
        mysql_close();
      }
      else {
        die("Null User on Save");
      }
      return true;

    }
}
?>
