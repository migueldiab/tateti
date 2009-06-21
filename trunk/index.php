<?php
session_start();
  /* Librerias Usadas */
  include "./lib/HtmlHelper.php";
  include "./lib/Fachada.php";

  $_SESSION['error'] = "";
  if (!empty($_POST) || !empty($_GET)) {
    if (isset($_POST['pagina'])) {
      Fachada::procesar($_POST['pagina'], $_POST);
    }
    elseif (isset($_GET['pagina'])) {
      Fachada::procesar($_GET['pagina'], null);
    }
    else {
      die("Error!");
    }
  }
  else {
      Sistema::principal();
  }

?>
<head>
<META HTTP-EQUIV=Refresh CONTENT='30'>
</head>
