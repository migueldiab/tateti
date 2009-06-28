<?php
class pJugada {

    const TABLA = 'jugada';

    const ID = 'id';
    const HORA = 'hora';
    const CAMPO = 'id_campo';
    const CRUZ = 'es_cruz';
    const JUGADOR = 'id_jugador';
    const MESA = 'id_mesa';

    static function cargarMySqlRowEnMesa($mySqlRow) {
      $unaJugada = new Jugada();
      $unaJugada->setId($mySqlRow[pJugada::ID]);
      $unaJugada->setHora($mySqlRow[pJugada::HORA]);
      $unaJugada->setIdCampo($mySqlRow[pJugada::CAMPO]);
      $unaJugada->setEsCruz($mySqlRow[pJugada::CRUZ]);
      $unaJugada->setJugador(Usuario::obtenerPorId($mySqlRow[pJugada::JUGADOR]));
      $unaJugada->setMesa(Mesa::obtenerPorId($mySqlRow[pJugada::MESA]));
      return $unaJugada;
    }

    static function obtenerPorIdJugada($idJugada) {
      $result=mySql::query("SELECT * FROM ".pJugada::TABLA." WHERE ".pJugada::ID." = '$idJugada'");
      $data = mysql_fetch_array($result);
      $unaJugada = cargarMySqlRowEnMesa($data);
      return $unaJugada;
    }

    static function obtenerPorIdMesa($idMesa) {
      $result=mySql::query("SELECT * FROM ".pJugada::TABLA." WHERE ".pJugada::MESA." = '$idMesa'");
      $lista = new ArrayList();
      if(mysql_num_rows($result)>0)
      {
       while ($data = mysql_fetch_array($result)) {
          $unaJugada = cargarMySqlRowEnMesa($data);
          $lista->add($unaJugada);
        }
        return $lista;
      }
      else {
         return null;
      }
    }

    static function obtenerUltimaJugadaPorIdMesa($idMesa) {
      $result=mySql::query("SELECT MAX(".pJugada::ID.") FROM ".pJugada::TABLA." WHERE ".pJugada::MESA." = '$idMesa'");
      $data = mysql_fetch_array($result);
      $unaJugada = cargarMySqlRowEnMesa($data);
      return $unaJugada;
    }

    static function save($unaJugada) {
      if ($unaJugada!=null)
      {
        $query="INSERT INTO ".pJugada::TABLA." (".pJugada::HORA.", ".pJugada::CAMPO.", ".pJugada::CRUZ.", ".pJugada::JUGADOR.", ".pJugada::MESA.")
                VALUES (
                '".$unaJugada->getHora()."',
                '".$unaJugada->getIdCampo()."',
                '".$unaJugada->getEsCruz()."',
                '".$unaJugada->getJugador()->getId()."',
                '".$unaJugada->getMesa()->getId()."')";
        $result=mySql::query($query);
        $id = mysql_insert_id();
        return $id;
      }
      else {
        return false;
      }
    }
}
?>
