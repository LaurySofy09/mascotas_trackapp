<?php

if (isset($_REQUEST["accion"])){

  $accion =  $_REQUEST["accion"];

  if ($accion == "cierre"){
    session_start();
    $_SESSION['form'] = 6;
    $valid = array();
    $valid[] = array("valid" => "ok");
    echo json_encode($valid);
  }

}

?>
