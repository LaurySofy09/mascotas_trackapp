<?php
include ("BDClass.php");

if (isset($_REQUEST["accion"]) && isset($_REQUEST["TipoMascota"]))
{
  $accion =  $_REQUEST["accion"];
  $TipoMascota = $_REQUEST["TipoMascota"];

 if ($accion == "ddlRaza")
  {
        $pdo = BD::obtenerBD()->obtenerConexion();
        $comando = 'Call SP_L_RazasXtipoMascota(?);';
        $stmt = BD::obtenerBD()->obtenerConexion()->prepare($comando);
        $stmt->bindParam(1, $TipoMascota, PDO::PARAM_INT, 20);
        $stmt->execute();

        $data = $stmt->fetchAll();
        $razas = array();
        foreach ($data as $row){
          $id= $row["IdRaza"];
          $descripcion = $row["Descripcion"];
          $razas[] = array("id" => $id, "descripcion" => $descripcion);
        }

      echo json_encode($razas);
  }
}


?>
