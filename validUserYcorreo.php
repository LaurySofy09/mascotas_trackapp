<?php

include ("BDClass.php");

$username  = $_REQUEST["userName"];
$correo = $_REQUEST["correo"];

$pdo = BD::obtenerBD()->obtenerConexion();
$comando = 'Call SP_C_ValidarUserYcorreo(?,?);';
$stmt = BD::obtenerBD()->obtenerConexion()->prepare($comando);

$stmt->bindParam(1, $username, PDO::PARAM_STR, 250);
$stmt->bindParam(2, $correo, PDO::PARAM_STR, 250);

$stmt->execute();
$tabResultat = $stmt->fetch();
$cantidad_registros = $tabResultat['cantidad_registros'];

if ($cantidad_registros>0)
{
  $retorno[] = array("valido" => "No");
}
else{
  $retorno[] = array("valido" => "Si");
}
  echo json_encode($retorno);
?>
