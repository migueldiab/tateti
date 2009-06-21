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
        $unaMesa->setId($data["id"]);
        $unaMesa->setCreada($data["creada"]);
        $unaMesa->setEstado($data["estado"]);
        $unaMesa->setGanador(Usuario::obtenerPorId($data["id_ganador"]));
        $unaMesa->setJugador1(Usuario::obtenerPorId($data["id_jugador_1"]));
        $unaMesa->setJugador2(Usuario::obtenerPorId($data["id_jugador_2"]));
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
        $unaMesa->setGanador(Usuario::obtenerPorId($data["id_ganador"]));
      $unaMesa->setJugador1(Usuario::obtenerPorId($data["id_jugador_1"]));
      $unaMesa->setId($data["id"]);
      $unaMesa->setJugador2(Usuario::obtenerPorId($data["id_jugador_2"]));
      mysql_close();
      return $unaMesa;

    }

    static function save($unaMesa) {
      if ($unaMesa!=null) {
        mySql::connect_db();
        $query="REPLACE INTO mesa (creada, estado, id_ganador, id_jugador_1, id_jugador_2)
                VALUES (
                '".$unaMesa->getCreada()."',
                '".$unaMesa->getEstado()."',
                '".$unaMesa->getGanador()->getId()."',
                '".$unaMesa->getJugador1()->getId()."',
                '".$unaMesa->getJugador2()->getId()."')";
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
