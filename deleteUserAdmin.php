<?php

  include ("BDClass.php");

    if (isset($_REQUEST["accion"])){

      $accion =  $_REQUEST["accion"];

      if ($accion == "delUser"){

          $IdUsuario =$_REQUEST["IdUsuario"];
          $pdo = BD::obtenerBD()->obtenerConexion();
          $comando = 'Call SP_Admin_EliminarUsuarios(?);';
          $stmt = BD::obtenerBD()->obtenerConexion()->prepare($comando);
          $stmt->bindParam(1, $IdUsuario, PDO::PARAM_INT, 20);

          $stmt->execute();
          $tabResultat = $stmt->fetch();
          $rowAfectados = $tabResultat['RowsAfectados'];

          if($rowAfectados > 0){
            session_start();
            $_SESSION['form'] = 5;
            $valid = array();
            $valid[] = array("valid" => "ok");
            echo json_encode($valid);
          }

      }

    }

?>
