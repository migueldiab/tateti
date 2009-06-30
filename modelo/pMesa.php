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

  const TABLA = 'mesa';

  const ID = 'id';
  const CREADA = 'creada';
  const ESTADO = 'estado';
  const GANADOR = 'id_ganador';
  const JUGADOR_1 = 'id_jugador_1';
  const JUGADOR_2 = 'id_jugador_2';

  static function cargarMySqlRow($mySqlRow) {
    $unaMesa = new Mesa();
    $unaMesa->setId($mySqlRow[pMesa::ID]);
    $unaMesa->setCreada($mySqlRow[pMesa::CREADA]);
    $unaMesa->setEstado($mySqlRow[pMesa::ESTADO]);
    $unaMesa->setGanador(Usuario::obtenerPorId($mySqlRow[pMesa::GANADOR]));
    $unaMesa->setJugador1(Usuario::obtenerPorId($mySqlRow[pMesa::JUGADOR_1]));
    $unaMesa->setJugador2(Usuario::obtenerPorId($mySqlRow[pMesa::JUGADOR_2]));
    $unaMesa->setJugadas(Jugada::obtenerPorIdMesa($mySqlRow[pMesa::ID]));
    return $unaMesa;
  }
  static function obtenerPorId($idMesa) {    
    $result=mySql::query("SELECT * FROM ".pMesa::TABLA." WHERE id = '$idMesa'");
    $data = mysql_fetch_array($result);
    $unaMesa = pMesa::cargarMySqlRow($data);
    return $unaMesa;
  }
  static function obtenerPorEstado($estado) {
    $result = mySql::query("SELECT * FROM ".pMesa::TABLA." WHERE ".pMesa::ESTADO." = '$estado'");
    $lista = new ArrayList();
    if(mysql_num_rows($result)!=0)
    {
      while ($row = mysql_fetch_array($result))
      {
        $unaMesa = pMesa::cargarMySqlRow($row);
        $lista->add($unaMesa);
      }
      return $lista;
    }
    else {
      return null;
    }
  }

  static function obtenerMesaPorEstadoPorJugador($estado, $unJugador) {
    $query="SELECT * FROM ".pMesa::TABLA." WHERE " 
          .pMesa::ESTADO." = '$estado' AND ("
          .pmesa::JUGADOR_1."='".$unJugador->getId()."' OR "
          .pmesa::JUGADOR_2."='".$unJugador->getId()."') LIMIT 1";
    $result=mySql::query($query);
    if(mysql_num_rows($result)!=0)
    {
      $row = mysql_fetch_array($result);
      $unaMesa = pMesa::cargarMySqlRow($row);
      return $unaMesa;
    }
    else
    {
     return null;
    }
  }

  static function obtenerMesaPorEstado($estado) {   
    $result=mySql::query("SELECT * FROM ".pMesa::TABLA." WHERE ".pMesa::ESTADO." = '$estado' LIMIT 1");
    if(mysql_num_rows($result)!=0)
    {
      $row = mysql_fetch_array($result);
      $unaMesa = pMesa::cargarMySqlRow($row);
      return $unaMesa;
    }
    else
    {
     return null;
    }
  }


  static function save($unaMesa) {
    if ($unaMesa!=null) {
      if($unaMesa->getGanador()!=null && $unaMesa->getJugador1()!=null && $unaMesa->getJugador2()!=null)
      {
        $query="REPLACE INTO ".pMesa::TABLA." (".pMesa::ID.", ".pMesa::CREADA.", ".pMesa::ESTADO.", ".pMesa::GANADOR.", ".pMesa::JUGADOR_1.", ".pMesa::JUGADOR_2.")
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
        $query="UPDATE ".pMesa::TABLA." SET ".pMesa::ESTADO."='".$unaMesa->getEstado()."',
              ".pMesa::JUGADOR_1."='".$unaMesa->getJugador1()->getId()."',
              ".pMesa::JUGADOR_2."='".$unaMesa->getJugador2()->getId()."' WHERE ".pMesa::ID."='".$unaMesa->getId()."'";
      }
      else if($unaMesa->getJugador1()!=null)
      {
        $query="INSERT INTO ".pMesa::TABLA." (".pMesa::CREADA.", ".pMesa::ESTADO.", ".pMesa::JUGADOR_1.")
              VALUES (
              '".$unaMesa->getCreada()."',
              '".$unaMesa->getEstado()."',
              '".$unaMesa->getJugador1()->getId()."')";
      }
      else {
        return false;
      }
      $idMesa=mySql::queryId($query);
      if ($unaMesa->getId()==null) {
        $unaMesa->setId($idMesa);
      }
//      while ($unaMesa->getJugadas()->hasNext()) {
//        $unaJugada = $unaMesa->getJugadas()->next();
//        $unaJugada->save($unaMesa);
//      }
      return $result;
    }    
    return false;
  }
  public function obtenerVictoriasPorJugador($idJugador) {
    if ($idJugador!=null) {
      $result=mySql::query("SELECT COUNT(*) FROM ".pMesa::TABLA." WHERE ".pMesa::GANADOR." = $idJugador");
      $row = mysql_fetch_row($result);
      return $row[0];
    }
    return 0;
  }
}
?>
