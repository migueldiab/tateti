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
class pMesa {

    static function obtenerPorId($idMesa) {
      mySql::connect_db();
      $query="SELECT * FROM mesa WHERE id = '$idMesa'";
      $result=mysql_query($query);
      $data = mysql_fetch_array($result);

      $unaMesa = new Mesa();
      $unaMesa->setCreada($data["creada"]);
      $unaMesa->setEstado($data["estado"]);
      $unaMesa->setGanador($data["id_ganador"]);
      $unaMesa->setJugador1($data["idjugador1"]);
      $unaMesa->setId($data["id"]);
      $unaMesa->setJugador2($data["id_jugador2"]);
      mysql_close();
      return $unaMesa;

    }

    static function obtenerPorEstado($estado) {
      mySql::connect_db();
      $query="SELECT * FROM mesa WHERE estado = '$estado'";
      $result=mysql_query($query);
      $data = mysql_fetch_array($result);

      $unaMesa = new Mesa();
      $unaMesa->setCreada($data["creada"]);
      $unaMesa->setEstado($data["estado"]);
      $unaMesa->setGanador($data["id_ganador"]);
      $unaMesa->setJugador1($data["idjugador1"]);
      $unaMesa->setId($data["id"]);
      $unaMesa->setJugador2($data["id_jugador2"]);
      mysql_close();
      return $unaMesa;

    }

    static function save($unaMesa) {
      if ($unaMesa!=null) {
        mySql::connect_db();
        $query="REPLACE INTO mesa (creada, estado, id_ganador, id_jugador1, id_jugador2)
                VALUES (
                '".$unaMesa->getCreada()."',
                '".$unaMesa->getEstado()."',
                '".$unaMesa->getGanador()."',
                '".$unaMesa->getJugador1()."',
                '".$unaMesa->getJugador2()."')";
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
