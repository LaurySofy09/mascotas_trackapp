<?php

include ("BDClass.php");

if (isset($_REQUEST["accion"]))
{
  $accion =  $_REQUEST["accion"];

 if ($accion == "ddlRoles")
 {
        $pdo = BD::obtenerBD()->obtenerConexion();
        $comando = 'CALL SP_L_Admin_ListarRoles();';
        $smt = BD::obtenerBD()->obtenerConexion()->prepare($comando);
        $smt->execute();
        $data = $smt->fetchAll();
        $roles = array();
        foreach ($data as $row){
          $id= $row["IdRol"];
          $descripcion = $row["Descripcion"];
          $roles[] = array("id" => $id, "descripcion" => $descripcion);
        }

      echo json_encode($roles);
  }
}

 ?>
