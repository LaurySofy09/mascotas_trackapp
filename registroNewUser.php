<?php

  include ("BDClass.php");

  $Nombre = $_REQUEST["Nombre_reg"];
  $cedula =$_REQUEST["Cedula_reg"];
  $Email = $_REQUEST["Email_reg"];
  $telefono = $_REQUEST["Telefono_reg"];
  $telefono2 = $_REQUEST["Telefono2_reg"];
  $fechaNacimiento = $_REQUEST["FechaNacimiento_reg"];
  $old_date = explode("/", $fechaNacimiento);
  $fechaNacimiento_formatSQL = $old_date[2]."/".$old_date[1]."/".$old_date[0];
  $direccion =  $_REQUEST["Direccion_reg"];
  $usuario = $_REQUEST["Usuario_reg"];
  $Password = $_REQUEST["Password_reg"];


  $pdo = BD::obtenerBD()->obtenerConexion();
                      $comando = 'Call SP_I_RegistrarUsuarioLogin(?, ?, ?, ?, ?, ?, ?, ?, ?);';
                      $stmt = BD::obtenerBD()->obtenerConexion()->prepare($comando);
                      $stmt->bindParam(1, $Nombre, PDO::PARAM_STR, 500);
                      $stmt->bindParam(2, $cedula, PDO::PARAM_STR,25);
                      $stmt->bindParam(3, $Email, PDO::PARAM_STR, 50);
                      $stmt->bindParam(4, $telefono, PDO::PARAM_STR, 50);
                      $stmt->bindParam(5, $telefono2, PDO::PARAM_STR, 50);
                      $stmt->bindParam(6, $fechaNacimiento_formatSQL, PDO::PARAM_STR, 25);
                      $stmt->bindParam(7, $direccion, PDO::PARAM_STR, 500);
                      $stmt->bindParam(8, $usuario, PDO::PARAM_STR,250);
                      $stmt->bindParam(9, $Password, PDO::PARAM_STR, 500);

                       $stmt->execute();

                       $tabResultat = $stmt->fetch();
                       $NewUser = $tabResultat['UsuarioNuevo'];

                      session_start();
                      $_SESSION['user_name'] =$NewUser;
                      $_SESSION['newUser'] = true;
                      $_SESSION['form'] = 1;

                      header('Location: loading.php');

?>
