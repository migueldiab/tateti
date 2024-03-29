<?php
class pJugada {

    const TABLA = 'jugada';

    const ID = 'id';
    const HORA = 'hora';
    const CAMPO = 'id_campo';
    const CRUZ = 'es_cruz';
    const JUGADOR = 'id_jugador';
    const MESA = 'id_mesa';

    static function cargarMySqlRow($mySqlRow) {
      $unaJugada = new Jugada();
      $unaJugada->setId($mySqlRow[pJugada::ID]);
      $unaJugada->setHora($mySqlRow[pJugada::HORA]);
      $unaJugada->setIdCampo($mySqlRow[pJugada::CAMPO]);
      $unaJugada->setEsCruz($mySqlRow[pJugada::CRUZ]);
      $unaJugada->setJugador(Usuario::obtenerPorId($mySqlRow[pJugada::JUGADOR]));
      //$unaJugada->setMesa(Mesa::obtenerPorId($mySqlRow[pJugada::MESA]));
      return $unaJugada;
    }

    static function obtenerPorIdJugada($idJugada) {
      $result=mySql::query("SELECT * FROM ".pJugada::TABLA." WHERE ".pJugada::ID." = '$idJugada'");
      $data = mysql_fetch_array($result);
      //$unaJugada = cargarMySqlRowEnMesa($data);
      return json_encode($data);
    }

    static function obtenerPorIdMesa($idMesa) {
      $result=mySql::query("SELECT * FROM ".pJugada::TABLA." WHERE ".pJugada::MESA." = '$idMesa'");
      $lista = new ArrayList();
      if(mysql_num_rows($result)>0)
      {
       while ($data = mysql_fetch_array($result)) {
          $unaJugada = pJugada::cargarMySqlRow($data);
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
      $unaJugada = cargarMySqlRow($data);
      return $unaJugada;
    }

    static function save($unaJugada, $unaMesa) {
      if ($unaJugada!=null)
      {
        $esCruz = ($unaJugada->getEsCruz())?'true':'false';

        $query="INSERT INTO ".pJugada::TABLA." (".pJugada::CAMPO.", ".pJugada::CRUZ.", ".pJugada::JUGADOR.", ".pJugada::MESA.")
                VALUES (
                '".$unaJugada->getIdCampo()."',
                ".$esCruz.",
                '".$unaJugada->getJugador()->getId()."',
                '".$unaMesa->getId()."')";
        $id=mySql::queryId($query);
        return $id;
      }
      else {
        return false;
      }
    }
}
?>
