<?php
include ("BDClass.php");

if (isset($_REQUEST["accion"]))
{
  $accion =  $_REQUEST["accion"];

  if ($accion == "AdminNewUser")
  {
    $Nombre =$_REQUEST["Nombre"];
    $Cedula =$_REQUEST["Cedula"];
    $Email =$_REQUEST["Email"];
    $Telefono =$_REQUEST["Telefono"];
    $Telefono2 =$_REQUEST["Telefono2"];
    $FechaNacimiento =$_REQUEST["FechaNacimiento"];
    $txtDireccion = $_REQUEST["txtDireccion"];
    $RolUsuario = $_REQUEST["RolUsuario"];
    $usuario_HDusr  = $_REQUEST["HDusAdmin"];
    $txtUsuario =$_REQUEST["txtUsuario"];
    $NombreMascota =$_REQUEST["NombreMascota"];
    $EdadMascota =$_REQUEST["EdadMascota"];
    $TipoMascota =$_REQUEST["TipoMascota"];
    $RazaMascota =$_REQUEST["RazaMascota"];
    $FechaNacimientoMascota =$_REQUEST["FechaNacimientoMascota"];
    $PesoMascota =$_REQUEST["PesoMascota"];
    $radEsterilizado =$_REQUEST["radEsterilizado"];
    $InformacionVet =$_REQUEST["InformacionVet"];
    $InformacionAdicional =$_REQUEST["InformacionAdicional"];
    $SexoMascota =$_REQUEST["SexoMascota"];
    $vacunas = $_REQUEST["HDvc"];


    $old_date = explode("/", $FechaNacimiento);
    $fechaNacimiento_formatSQL = $old_date[2]."/".$old_date[1]."/".$old_date[0];
    $old_date_masc = explode("/", $FechaNacimientoMascota);
    $fechaNacimientoMasc_formatSQL = $old_date_masc[2]."/".$old_date_masc[1]."/".$old_date_masc[0];


    $pdo = BD::obtenerBD()->obtenerConexion();
    $comando = 'Call SP_Admin_Insertar_Usuarios(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);';

    $stmt = BD::obtenerBD()->obtenerConexion()->prepare($comando);
    $stmt->bindParam(1, $Nombre, PDO::PARAM_STR, 500);
    $stmt->bindParam(2, $Cedula, PDO::PARAM_STR,25);
    $stmt->bindParam(3, $Email, PDO::PARAM_STR, 50);
    $stmt->bindParam(4, $Telefono, PDO::PARAM_STR, 50);
    $stmt->bindParam(5, $Telefono2, PDO::PARAM_STR, 50);
    $stmt->bindParam(6, $fechaNacimiento_formatSQL, PDO::PARAM_STR, 25);
    $stmt->bindParam(7, $txtDireccion, PDO::PARAM_STR, 500);
    $stmt->bindParam(8, $RolUsuario, PDO::PARAM_INT, 20);
    $stmt->bindParam(9, $usuario_HDusr, PDO::PARAM_INT, 20);
    $stmt->bindParam(10, $txtUsuario, PDO::PARAM_STR, 250);
    $stmt->bindParam(11, $NombreMascota, PDO::PARAM_STR, 250);
    $stmt->bindParam(12, $EdadMascota, PDO::PARAM_STR, 250);
    $stmt->bindParam(13, $TipoMascota, PDO::PARAM_INT, 20);
    $stmt->bindParam(14, $RazaMascota, PDO::PARAM_INT, 20);
    $stmt->bindParam(15, $fechaNacimientoMasc_formatSQL, PDO::PARAM_STR, 30);
    $stmt->bindParam(16, $PesoMascota, PDO::PARAM_STR, 250);
    $stmt->bindParam(17, $radEsterilizado, PDO::PARAM_INT, 20);
    $stmt->bindParam(18, $InformacionVet, PDO::PARAM_STR, 500);
    $stmt->bindParam(19, $InformacionAdicional, PDO::PARAM_STR, 500);
    $stmt->bindParam(20, $SexoMascota, PDO::PARAM_STR, 10);
    $stmt->bindParam(21, $vacunas, PDO::PARAM_STR, 500);

    $stmt->execute();
    $tabResultat = $stmt->fetch();

      $UsuarioNuevo = 0;
      $NewPwd = '';
      $UsuarioNuevo = $tabResultat['UsuarioNuevo'];
      $NewPwd = $tabResultat['NewPwd'];

      If($UsuarioNuevo > 0 && $NewPwd != '')
      {
        $to = $Email;
        $subject = "Registro en Mascotas Tracking APP";
        $message = "<h3>Su usuario ha sido creado por el Administrador estas son sus credenciales para acceder.</h3>";
        $message .= "<b>Usuario: ". $txtUsuario."</b></br> <b>Contraseña: ". $NewPwd."</b>";

        $header = "From:Mascotas Tracking APP \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html;charset=UTF-8\r\n";

        $retval = mail ($to,$subject,$message,$header);

        if( $retval == true ) {
                  session_start();
                  $_SESSION['form'] = 5;
                  header('Location: /MascotaProject_V1.0/loading.php');
        }

      }


  }

}

?>
