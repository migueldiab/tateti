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
      mysql_close();
      $data = mysql_fetch_array($result);

      $unaMesa = new Mesa();
      $unaMesa->setId($data["id"]);
      $unaMesa->setCreada($data["creada"]);
      $unaMesa->setEstado($data["estado"]);
      $unaMesa->setGanador(Usuario::obtenerPorId($data["id_ganador"]));
      $unaMesa->setJugador1(Usuario::obtenerPorId($data["id_jugador_1"]));
      $unaMesa->setJugador2(Usuario::obtenerPorId($data["id_jugador_2"]));
      return $unaMesa;
    }
    static function obtenerPorEstado($estado) {
      $mySqlResource = mySql::connect_db();
      $query="SELECT * FROM mesa WHERE estado = '$estado'";
      $result=mysql_query($query, $mySqlResource);
      mysql_close($mySqlResource);
      $lista = new ArrayList();
    if($result!=null){
      while ($row = mysql_fetch_array($result)) {
        $unaMesa = new Mesa();
        $unaMesa->setId($row["id"]);
        $unaMesa->setCreada($row["creada"]);
        $unaMesa->setEstado($row["estado"]);
        $unaMesa->setGanador(Usuario::obtenerPorId($row["id_ganador"]));
        $unaMesa->setJugador1(Usuario::obtenerPorId($row["id_jugador_1"]));
        $unaMesa->setJugador2(Usuario::obtenerPorId($row["id_jugador_2"]));
        $lista->add($unaMesa);
      }
      return $lista;
    }else{
    return null;

    }
      }

        static function obtenerMesaPorEstado($estado) {
      $mySqlResource = mySql::connect_db();
      $query="SELECT * FROM mesa WHERE estado = '$estado'";
      $result=mysql_query($query, $mySqlResource);
      mysql_close($mySqlResource);
    if(mysql_num_rows($result)!=0){
      while ($row = mysql_fetch_array($result)) {
        $unaMesa = new Mesa();
        $unaMesa->setId($row["id"]);
        $unaMesa->setCreada($row["creada"]);
        $unaMesa->setEstado($row["estado"]);
        $unaMesa->setGanador(Usuario::obtenerPorId($row["id_ganador"]));
        $unaMesa->setJugador1(Usuario::obtenerPorId($row["id_jugador_1"]));
        $unaMesa->setJugador2(Usuario::obtenerPorId($row["id_jugador_2"]));
      }
      return $unaMesa;
    }else{
     return null;
    }
        }


    static function save($unaMesa) {
      if ($unaMesa!=null) {
        mySql::connect_db();
        if($unaMesa->getGanador()!=null && $unaMesa->getJugador1()!=null && $unaMesa->getJugador2()!=null)
        {
          $query="REPLACE INTO mesa (id, creada, estado, id_ganador, id_jugador_1, id_jugador_2)
                  VALUES (
                  '".$unaMesa->getId()."',
                  '".$unaMesa->getCreada()."',
                  '".$unaMesa->getEstado()."',
                  '".$unaMesa->getGanador()->getId()."',
                  '".$unaMesa->getJugador1()->getId()."',
                  '".$unaMesa->getJugador2()->getId()."')";
        }
        else if($unaMesa->getJugador1()!=null && $unaMesa->getJugador2()!=null)
        {
          $query="UPDATE mesa SET estado='".$unaMesa->getEstado()."',
                id_jugador_1='".$unaMesa->getJugador1()->getId()."',
                id_jugador_2='".$unaMesa->getJugador2()->getId()."' WHERE id='".$unaMesa->getId()."'";
        }
        else if($unaMesa->getJugador1()!=null)
        {
          $query="INSERT INTO mesa (creada, estado, id_jugador_1)
                VALUES (
                '".$unaMesa->getCreada()."',
                '".$unaMesa->getEstado()."',
                '".$unaMesa->getJugador1()->getId()."')";
        }        
        else {
          return false;
        }
        $result=mysql_query($query);
        if (!$result) {
          die (mysql_error());
        }
        $id= mysql_insert_id();
        mysql_close();
        return $id;
      }
      else {
        die("Null User on Save");
      }
      return true;
    }
    public function obtenerVictoriasPorJugador($idJugador) {
      if ($idJugador!=null) {
        mySql::connect_db();
        $query="SELECT COUNT(*) FROM mesa WHERE id_ganador = $idJugador";
        $result=mysql_query($query);
        mysql_close();
        $row = mysql_fetch_row($result);
        return $row[0];
      }
      return 0;
    }
}
?>
