<?php
include ("BDClass.php");

if (isset($_REQUEST["accion"]))
{
  $accion =  $_REQUEST["accion"];

 if ($accion == "ddlTipoMascota")
  {
        $pdo = BD::obtenerBD()->obtenerConexion();
        $comando = 'CALL SP_L_ListarTipoMascotas();';
        $smt = BD::obtenerBD()->obtenerConexion()->prepare($comando);
        $smt->execute();
        $data = $smt->fetchAll();
        $tipos = array();
        foreach ($data as $row){
          $id= $row["idtipomascota"];
          $descripcion = $row["Descripcion"];
          $tipos[] = array("id" => $id, "descripcion" => $descripcion);
        }

      echo json_encode($tipos);
  }
}


?>
