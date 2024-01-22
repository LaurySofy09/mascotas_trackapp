<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="stylesheet" href="style/css/signup.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <link rel="stylesheet" href="JS/jquery-ui/jquery-ui.css">
  <link rel="stylesheet" href="JS/jquery-ui/jquery-ui.structure.css">
  <link rel="stylesheet" href="JS/jquery-ui/jquery-ui.theme.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <!---<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--->
  <script src="JS/Jquery/jquery-3.6.3.js"></script>
  <script src="JS/Jquery/jquery-3.6.3.slim.js"></script>
  <script src="JS/jquery-ui/external/jquery/jquery.js"></script>
  <script src="JS/jquery-ui/jquery-ui.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php

include ("BDClass.php");
  if (isset($_FILES['profilepic'])){

    $nombreArchivo = $_FILES["profilepic"]["name"];
    $rutaTemporal = $_FILES["profilepic"]["tmp_name"];
    $rutaDestino = "mascotasFotos/" . $nombreArchivo;
    $guardadoFoto = false;

    if (strlen($rutaTemporal) > 0)
    {
      if(move_uploaded_file($rutaTemporal, $rutaDestino)) {
        $guardadoFoto = true;
      }
      else{
        $guardadoFoto = false;
      }
    }
    else {
        $guardadoFoto = false;
    }



    $usuario_HDusr  = $_REQUEST["HDusr"];
    $idMascota = $_REQUEST["HDm"];
    $Edad =$_REQUEST["EdadMascota"];
    $FechaNacimientoMascota =$_REQUEST["FechaNacimientoMascota"];
    $PesoMascota =$_REQUEST["PesoMascota"];

    if ($guardadoFoto)
    {
      $foto = "mascotasFotos/" . $nombreArchivo;
    }
    else {
        $foto = $_REQUEST["HDpic"];
    }
    $radEsterilizado =$_REQUEST["radEsterilizado"];
    $vacunas = $_REQUEST["HDvc"];
    $InformacionAdicional =$_REQUEST["InformacionAdicional"];
    $InformacionVet =$_REQUEST["InformacionVet"];
    $Password_reg =$_REQUEST["Password_reg_masc"];
    $EmailDuenio =$_REQUEST["EmailDuenio_masc"];
    $TelefonoDuenio =$_REQUEST["TelefonoDuenio_masc"];
    $TelefonoDuenio2 =$_REQUEST["TelefonoDuenio2_masc"];
    $DireccionDuenio =$_REQUEST["DireccionDuenio_masc"];
    $old_date = explode("/", $FechaNacimientoMascota);
    $fechaNacimiento_formatSQL = $old_date[2]."/".$old_date[1]."/".$old_date[0];

    $pdo = BD::obtenerBD()->obtenerConexion();
    $comando = 'Call SP_A_ActualizarMascota(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);';
    $stmt = BD::obtenerBD()->obtenerConexion()->prepare($comando);

    $stmt->bindParam(1,$idMascota , PDO::PARAM_INT, 20);
    $stmt->bindParam(2,$usuario_HDusr, PDO::PARAM_INT, 20);
    $stmt->bindParam(3, $Edad, PDO::PARAM_STR, 50);
    $stmt->bindParam(4, $fechaNacimiento_formatSQL, PDO::PARAM_STR, 25);
    $stmt->bindParam(5, $PesoMascota, PDO::PARAM_STR, 50);
    $stmt->bindParam(6, $radEsterilizado, PDO::PARAM_INT, 20);
    $stmt->bindParam(7, $InformacionVet, PDO::PARAM_STR, 250);
    $stmt->bindParam(8, $InformacionAdicional, PDO::PARAM_STR, 500);
    $stmt->bindParam(9, $vacunas, PDO::PARAM_STR, 500);
    $stmt->bindParam(10, $EmailDuenio, PDO::PARAM_STR, 50);
    $stmt->bindParam(11, $TelefonoDuenio, PDO::PARAM_STR, 50);
    $stmt->bindParam(12, $TelefonoDuenio2, PDO::PARAM_STR, 50);
    $stmt->bindParam(13, $DireccionDuenio, PDO::PARAM_STR, 500);
    $stmt->bindParam(14, $Password_reg, PDO::PARAM_STR, 500);
    $stmt->bindParam(15, $foto, PDO::PARAM_STR, 100);

    $stmt->execute();
    $tabResultat = $stmt->fetch();

    $validUpdate = $tabResultat['RowsAfectados'];

    session_start();
    $_SESSION['form'] = 3;
    $_SESSION['IdUsuario'] = $usuario_HDusr;
    header('Location: loading.php');

  /*  $usuario_HDusr  = $_REQUEST["HDusr"];
    $idMascota = $_REQUEST["HDm"];
    $Edad =$_REQUEST["EdadMascota"];
    $FechaNacimientoMascota =$_REQUEST["FechaNacimientoMascota"];
    $PesoMascota =$_REQUEST["PesoMascota"];
    $foto = "mascotasFotos/" . $nombreArchivo;
    $radEsterilizado =$_REQUEST["radEsterilizado"];
    $vacunas = $_REQUEST["HDvc"];
    $InformacionAdicional =$_REQUEST["InformacionAdicional"];
    $InformacionVet =$_REQUEST["InformacionVet"];
    $Password_reg =$_REQUEST["Password_reg"];
    $EmailDuenio =$_REQUEST["EmailDuenio"];
    $TelefonoDuenio =$_REQUEST["TelefonoDuenio"];
    $TelefonoDuenio2 =$_REQUEST["TelefonoDuenio2"];
    $DireccionDuenio =$_REQUEST["DireccionDuenio"];
    $old_date = explode("/", $FechaNacimientoMascota);
    $fechaNacimiento_formatSQL = $old_date[2]."/".$old_date[1]."/".$old_date[0];



    echo $usuario_HDusr. " __ ". $idMascota. " __ ". $Edad. " __ ". $PesoMascota. " __ ". $foto. " __ ". $radEsterilizado. " __ ". $vacunas. " __ ". $InformacionAdicional. " __ ". $InformacionVet. " __ ". $Password_reg. " __ ". $EmailDuenio;
    echo $TelefonoDuenio. " __ ". $TelefonoDuenio2." __ ". $DireccionDuenio." __ ". $fechaNacimiento_formatSQL;*/




  }


 ?>



<body>


</body>

</html>
