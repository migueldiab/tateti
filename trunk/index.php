<?php
  include_once  "lib/Fachada.php";

  session_start();

  $_SESSION['error'] = "";
  if (!empty($_POST) || !empty($_GET)) {
    if (isset($_POST['pagina'])) {
      Fachada::procesar($_POST['pagina'], $_POST);
    }
    elseif (isset($_GET['pagina'])) {
      Fachada::procesar($_GET['pagina'], null);
    }    
    else {
      Sistema::principal();
    }
  }
  else {
      Sistema::principal();
  }

?>

