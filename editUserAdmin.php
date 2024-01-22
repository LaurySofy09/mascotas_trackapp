<?php

  include ("BDClass.php");

  if (isset($_REQUEST["accion"])){

      $accion =  $_REQUEST["accion"];

      if ($accion == "EditUser"){

        $IdUsuario =$_REQUEST["IdUsuario"];
        $Nombre =$_REQUEST["Nombre"];
        $Cedula =$_REQUEST["Cedula"];
        $Email =$_REQUEST["Email"];
        $Telefono =$_REQUEST["Telefono"];
        $Telefono2 =$_REQUEST["Telefono2"];
        $FechaNacimiento =$_REQUEST["FechaNacimiento"];
        $txtDireccion = $_REQUEST["txtDireccion"];
        $estado  = $_REQUEST["txtDireccion"];
        $usuario_HDusr  = $_REQUEST["HDusAdmin"];
        $txtUsuario =$_REQUEST["txtUsuario"];
        $NombreMascota =$_REQUEST["NombreMascota"];
        $EdadMascota =$_REQUEST["EdadMascota"];
        $TipoMascota =$_REQUEST["TipoMascota"];
        $RazaMascota =$_REQUEST["RazaMascota"];
        $FechaNacimientoMascota =$_REQUEST["FechaNacimientoMascota"];
        $PesoMascota =$_REQUEST["PesoMascota"];
        $radEsterilizado =$_REQUEST["radEsterilizado"];
        $SexoMascota =$_REQUEST["SexoMascota"];
        $InformacionVet =$_REQUEST["InformacionVet"];
        $InformacionAdicional =$_REQUEST["InformacionAdicional"];
        $vacunas = $_REQUEST["HDvc"];
        $idMascota = $_REQUEST["idMascota"];
        $RolUsuario = $_REQUEST["RolUsuario"];


        $old_date = explode("/", $FechaNacimiento);
        $fechaNacimiento_formatSQL = $old_date[2]."/".$old_date[1]."/".$old_date[0];
        if ($RolUsuario == 2)
        {
          $old_date_masc = explode("/", $FechaNacimientoMascota);
          $fechaNacimientoMasc_formatSQL = $old_date_masc[2]."/".$old_date_masc[1]."/".$old_date_masc[0];
        }

        $pdo = BD::obtenerBD()->obtenerConexion();
        $comando = 'Call SP_Admin_Actualizar_Usuario(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);';
        $stmt = BD::obtenerBD()->obtenerConexion()->prepare($comando);
        $stmt->bindParam(1, $IdUsuario, PDO::PARAM_INT, 20);
        $stmt->bindParam(2, $Nombre, PDO::PARAM_STR,500);
        $stmt->bindParam(3, $Cedula, PDO::PARAM_STR, 25);
        $stmt->bindParam(4, $Email, PDO::PARAM_STR, 50);
        $stmt->bindParam(5, $Telefono, PDO::PARAM_STR, 50);
        $stmt->bindParam(6, $Telefono2, PDO::PARAM_STR, 50);
        $stmt->bindParam(7, $fechaNacimiento_formatSQL, PDO::PARAM_STR, 50);
        $stmt->bindParam(8, $txtDireccion, PDO::PARAM_STR, 500);
        $stmt->bindParam(9, $estado, PDO::PARAM_INT, 20);
        $stmt->bindParam(10, $usuario_HDusr, PDO::PARAM_INT, 20);
        $stmt->bindParam(11, $txtUsuario, PDO::PARAM_STR, 250);
        $stmt->bindParam(12, $NombreMascota, PDO::PARAM_STR, 250);
        $stmt->bindParam(13, $EdadMascota, PDO::PARAM_STR, 50);
        $stmt->bindParam(14, $TipoMascota, PDO::PARAM_INT, 20);
        $stmt->bindParam(15, $RazaMascota, PDO::PARAM_INT, 20);
        $stmt->bindParam(16, $fechaNacimientoMasc_formatSQL, PDO::PARAM_STR, 25);
        $stmt->bindParam(17, $PesoMascota, PDO::PARAM_STR, 50);
        $stmt->bindParam(18, $radEsterilizado, PDO::PARAM_INT, 20);
        $stmt->bindParam(19, $SexoMascota, PDO::PARAM_STR, 1);
        $stmt->bindParam(20, $InformacionVet, PDO::PARAM_STR, 500);
        $stmt->bindParam(21, $InformacionAdicional, PDO::PARAM_STR, 500);
        $stmt->bindParam(22, $vacunas, PDO::PARAM_STR, 500);
        $stmt->bindParam(23, $idMascota, PDO::PARAM_INT, 20);
        $stmt->bindParam(24, $RolUsuario, PDO::PARAM_INT, 20);

        $stmt->execute();
        $tabResultat = $stmt->fetch();
        $rowAfectados = $tabResultat['rowAfectados'];

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
