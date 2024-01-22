<?php
include ("BDClass.php");

if (isset($_REQUEST["accion"]) && isset($_REQUEST["TipoMascota"]))
{
  $accion =  $_REQUEST["accion"];
  $TipoMascota = $_REQUEST["TipoMascota"];

 if ($accion == "ddlVacuna")
  {
        $pdo = BD::obtenerBD()->obtenerConexion();
        $comando = 'Call SP_L_ListarVacunasXtipoMascota(?);';
        $stmt = BD::obtenerBD()->obtenerConexion()->prepare($comando);
        $stmt->bindParam(1, $TipoMascota, PDO::PARAM_INT, 20);
        $stmt->execute();

        $data = $stmt->fetchAll();
        $vacunas = array();
        foreach ($data as $row){
          $id= $row["id"];
          $descripcion = $row["descripcion"];
          $vacunas[] = array("id" => $id, "descripcion" => $descripcion);
        }

      echo json_encode($vacunas);
  }
  else {

    if ($accion == "ddlVacunaMasc")
     {
           $pdo = BD::obtenerBD()->obtenerConexion();
           $comando = 'Call SP_L_ListarVacunasXmascotas(?);';
           $stmt = BD::obtenerBD()->obtenerConexion()->prepare($comando);
           $stmt->bindParam(1, $TipoMascota, PDO::PARAM_INT, 20);
           $stmt->execute();

           $data = $stmt->fetchAll();
           $vacunas = array();
           foreach ($data as $row){
             $id= $row["id"];
             $descripcion = $row["descripcion"];
             $IScheck = $row["IScheck"];
             $vacunas[] = array("id" => $id, "descripcion" => $descripcion, "IScheck" => $IScheck);
           }

         echo json_encode($vacunas);
     }

  }
}


?>
