<?php 

  /* Librerias Usadas */
  include "./lib/HtmlHelper.php";
  include "./lib/Sistema.php";
  include "./lib/juego.php";
  include "./lib/mySql.php";

  $_SESSION['error'] = "";
  if (!empty($_POST) || !empty($_GET)) {
    if (isset($_POST['pagina'])) {
      Sistema::procesar($_POST['pagina'], $_POST);
    }
    elseif (isset($_GET['pagina'])) {
      Sistema::procesar($_GET['pagina'], null);
    }
    else {
      die("Error!");
    }
  }
  else {
      Sistema::principal();
  }
  
?>

