<?php
class pJugada {

    static function obtenerPorIdJugada($idJugada) {
      mySql::connect_db();
      $query="SELECT * FROM jugada WHERE id = '$idJugada'";
      $result=mysql_query($query);
      mysql_close();
      $data = mysql_fetch_array($result);

      $unaJugada = new Jugada();
      $unaJugada->setId($data["id"]);
      $unaJugada->setHora($data["hora"]);
      $unaJugada->setIdCampo($data["id_Campo"]);
      $unaJugada->setEsCruz($data["esCruz"]);
      $unaJugada->setJugador(Usuario::obtenerPorId($data["id_jugador"]));
      $unaJugada->setMesa(Mesa::obtenerPorId($data["id_Mesa"]));
      return $unaJugada;
    }

    static function obtenerPorIdMesa($idMesa) {
      $mySqlResource = mySql::connect_db();
      $query="SELECT * FROM jugada WHERE idMesa = '$idMesa'";
       $result=mysql_query($query, $mySqlResource);
      mysql_close($mySqlResource);
      $lista = new ArrayList();
      if($result!=null){
       while ($data = mysql_fetch_array($result)) {
          $unaJugada = new Jugada();
          $unaJugada->setId($data["id"]);
          $unaJugada->setHora($data["hora"]);
          $unaJugada->setIdCampo($data["id_Campo"]);
          $unaJugada->setEsCruz($data["esCruz"]);
          $unaJugada->setJugador(Usuario::obtenerPorId($data["id_jugador"]));
          $unaJugada->setMesa(Mesa::obtenerPorId($data["id_Mesa"]));
          $lista->add($unaJugada);
        }
      return $lista;
      }else{
         return null;
      }
    }

    static function obtenerUltimaJugadaPorIdMesa($idMesa) {
      mySql::connect_db();
      $query="SELECT MAX(id) FROM jugada WHERE idMesa = '$idMesa'";
      $result=mysql_query($query);
      mysql_close();
      $data = mysql_fetch_array($result);
      $unaJugada = new Jugada();
      $unaJugada->setId($data["id"]);
      $unaJugada->setHora($data["hora"]);
      $unaJugada->setIdCampo($data["id_Campo"]);
      $unaJugada->setEsCruz($data["esCruz"]);
      $unaJugada->setJugador(Usuario::obtenerPorId($data["id_jugador"]));
      $unaJugada->setMesa(Mesa::obtenerPorId($data["id_Mesa"]));
      return $unaJugada;
    }

    static function save($unaJugada) {
      if ($unaJugada!=null) {
        mySql::connect_db();
        $query="INSERT INTO jugada (hora, id_Campo, es_Cruz, id_jugador, id_Mesa)
                VALUES (
                '".$unaJugada->getHora()."',
                '".$unaJugada->getIdCampo()."',
                '".$unaJugada->getEsCruz()."',
                '".$unaJugada->getJugador()->getId()."',
                '".$unaJugada->getMesa()->getId()."')";
        }
        $result=mysql_query($query);
        if (!$result) {
          die (mysql_error());
        }
        $id= mysql_insert_id();
        mysql_close();
        return $id;
    }
}
?>
