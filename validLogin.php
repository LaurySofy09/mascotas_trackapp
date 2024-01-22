<?php

include ("BDClass.php");

$username  = $_REQUEST["userName"];
$pass = $_REQUEST["password"];


$pdo = BD::obtenerBD()->obtenerConexion();
$comando = 'Call SP_C_AccesoLogin(?,?);';
$stmt = BD::obtenerBD()->obtenerConexion()->prepare($comando);

$stmt->bindParam(1, $username, PDO::PARAM_STR, 250);
$stmt->bindParam(2, $pass, PDO::PARAM_STR, 500);

$stmt->execute();

$tabResultat = $stmt->fetch();
$IdUsuario = $tabResultat['IdUsuario'];

session_start();

if ($IdUsuario == 0) {
  $_SESSION['IdLogin'] = 1;
  header('Location: login.php');
}
else{
  $NuevaMascota = $tabResultat['IdMascota'];
  $rol = $tabResultat['Rol'];

  $_SESSION['IdLogin'] = null;

  /*if (isset($_SESSION['NuevaMascota'])) {
    unset($_SESSION['NuevaMascota']);
  }*/

  $_SESSION['NuevaMascota'] = null;
  $_SESSION['NuevaMascota'] = $NuevaMascota;
  $_SESSION['IdUsuario'] = $IdUsuario;
  if ($rol == 2)
  {
    $_SESSION['form'] = 3;
  }
  else {
    if ($rol == 1)
    {
      $_SESSION['form'] = 5;
    }
  }

  header('Location: loading.php');
}

 ?>
