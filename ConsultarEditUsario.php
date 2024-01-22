<?php
  include ("BDClass.php");

  if (isset($_REQUEST["accion"]) && isset($_REQUEST["IdUsuario"]))
  {
    $accion =  $_REQUEST["accion"];
    $IdUsuario = $_REQUEST["IdUsuario"];

    if ($accion == "consultaUser")
    {
      $pdo = BD::obtenerBD()->obtenerConexion();
      $comando = 'Call SP_I_Admin_ConsultarUsuarioXid(?);';
      $stmt = BD::obtenerBD()->obtenerConexion()->prepare($comando);
      $stmt->bindParam(1, $IdUsuario, PDO::PARAM_INT, 20);
      $stmt->execute();

      $data = $stmt->fetchAll();
      $user = array();

      foreach ($data as $row){
        $IdUsuario = $row["IdUsuario"];
        $UserName = $row["UserName"];
        $Nombre = $row["Nombre"];
        $Cedula = $row["Cedula"];
        $Email = $row["Email"];
        $Telefono = $row["Telefono"];
        $Telefono2 = $row["Telefono2"];

        $FechaNacimiento = $row["FechaNacimiento"];
        $old_date = explode("-", $FechaNacimiento);
        $fechaNacimiento_formatNormal = $old_date[2]."/".$old_date[1]."/".$old_date[0];

        $Direccion = $row["Direccion"];
        $Estado = $row["Estado"];
        $Rol = $row["Rol"];
        $descRol = $row["descRol"];
        $IdMascota = $row["IdMascota"];
        $NombreMasc = $row["NombreMasc"];
        $Edad = $row["Edad"];
        $Sexo = $row["Sexo"];
        $IdTipoMascota = $row["IdTipoMascota"];
        $IdRaza = $row["IdRaza"];
        $FechaNacimientoMasc = $row["FechaNacimientoMasc"];
        $fechaNacimiento_formatNormalMasc = "";
        if ($Rol ==2)
        {
          $old_dateMasc = explode("-", $FechaNacimientoMasc);
          $fechaNacimiento_formatNormalMasc = $old_dateMasc[2]."/".$old_dateMasc[1]."/".$old_dateMasc[0];
        }

        $Peso = $row["Peso"];
        $Esterilizado = $row["Esterilizado"];
        $InfoVeterinaria = $row["InfoVeterinaria"];
        $DescripcionExtra = $row["DescripcionExtra"];

        $user[] = array("IdUsuario" => $IdUsuario, "UserName" => $UserName, "Nombre" => $Nombre, "Cedula" => $Cedula, "Email" => $Email, "Telefono" => $Telefono, "Telefono2" => $Telefono2, "FechaNacimiento" => $fechaNacimiento_formatNormal, "Direccion" => $Direccion,
                        "Estado" => $Estado, "Rol" => $Rol, "descRol" => $descRol, "IdMascota" => $IdMascota, "NombreMasc" => $NombreMasc, "Edad" => $Edad, "Sexo" => $Sexo, "IdTipoMascota" => $IdTipoMascota, "IdRaza" => $IdRaza,
                        "FechaNacimientoMasc" => $fechaNacimiento_formatNormalMasc, "Peso" => $Peso, "Esterilizado" => $Esterilizado, "InfoVeterinaria" => $InfoVeterinaria, "DescripcionExtra" => $DescripcionExtra);
      }

      echo json_encode($user);

    }

  }


 ?>
