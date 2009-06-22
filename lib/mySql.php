<?php

class mySql {

	static function connect_db() {
			$db_uid="tateti";					// Connect to database
			$db_pass="punk123";
			$db_host="localhost";

			$mySqlResource = mysql_connect($db_host,$db_uid,$db_pass);
      
      if (!$mySqlResource) die("Error #1002 : User not authorized into system");
      if (!mysql_select_db("tateti", $mySqlResource)) {
        echo "<br>Error #1001 : Unable to connect to TaTeTi database - ".mysql_error();
      }
      return $mySqlResource;
	}

  function SQLDate($DateEntry) {
		$Date_Array[0]= 0;
		$Date_Array[1]= 0;
		$Date_Array[2]= 0;
		$DateEntry = trim($DateEntry);
		if (strpos($DateEntry,"/"))
			$Date_Array = explode("/",$DateEntry);
		elseif (strpos ($DateEntry,"-"))
			$Date_Array = explode("-",$DateEntry);

		if ((int)$Date_Array[2] <60)
			$Date_Array[2] = "20".$Date_Array[2];
		elseif ((int)$Date_Array[2] >59 AND (int)$Date_Array[2] <100)
			$Date_Array[0] = "19".$Date_Array[2];
		if ((int)$Date_Array[0]==0 or (int)$Date_Array[1]==0 or (int)$Date_Array[2]==0)
			$DateEntry=NULL;
		else
			$DateEntry=$Date_Array[2]."-".$Date_Array[0]."-".$Date_Array[1];
		return $DateEntry;
	}
	function UnSQLDate($DateEntry) {
		$DateEntry = trim($DateEntry);
		if (strpos($DateEntry,"/"))
			$Date_Array = explode("/",$DateEntry);
		elseif (strpos ($DateEntry,"-"))
			$Date_Array = explode("-",$DateEntry);
		if ($Date_Array[0]==0)
			$DateEntry=NULL;
		else
			$DateEntry=$Date_Array[1]."/".$Date_Array[2]."/".$Date_Array[0];
		return $DateEntry;
	}
}

?>
