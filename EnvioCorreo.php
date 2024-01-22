<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs@gh-pages/qrcode.min.js"></script>

    <!-- Template Stylesheet -->
    <!--<link href="css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="style/css/pet.css">


</head>
<body style="background: linear-gradient(135deg, #71b7e6, #9b59b6); background-repeat: no-repeat; background-size: 2000px 1000px;">

<?php
    include ("BDClass.php");
    $Email_rec  = $_REQUEST["Email_rec"];

    $pdo = BD::obtenerBD()->obtenerConexion();
    $comando = 'Call SP_C_ValidarCorreoExistente(?);';
    $stmt = BD::obtenerBD()->obtenerConexion()->prepare($comando);

    $stmt->bindParam(1, $Email_rec, PDO::PARAM_STR, 250);

    $stmt->execute();

    $tabResultat = $stmt->fetch();
    $IdUsuario = $tabResultat['IdUsuario'];

    if ($IdUsuario > 0){

  // Configurar SMTP y smtp_port
/*ini_set('SMTP', 'servidor_smtp');
ini_set('smtp_port', 25);*/


  $to = $Email_rec;
  session_start();
  $_SESSION['codSec'] = uniqid();
  $linkRecupera ="http://". $_SERVER['HTTP_HOST']. "/mascotaproject_v1.0/Tabs.php?vu=". $IdUsuario;

  $subject = "Recuperación de contraseña";

  $message = "<h1>Entre a este link para poder recuperar su contraseña.</h1>";
  $message .= "<b><a href='". $linkRecupera."'> -->Recuperar<-- </a></b>";

  $header = "From:Mascotas Tracking APP \r\n";
  $header .= "MIME-Version: 1.0\r\n";
  $header .= "Content-type: text/html;charset=UTF-8\r\n";

  $retval = mail ($to,$subject,$message,$header);

  if( $retval == true ) {
     $flag_mensaje = 1;
     /*header('Location: http://'. $_SERVER['HTTP_HOST']. '/mascotaproject_v1.0/recuperar.php?vu='.$flag_mensaje);
     exit();*/
     //echo '<meta http-equiv="refresh" content="3;url=tu_pagina_redireccion">';
     //echo "<script>setTimeout(function(){ window.location.href = 'tu_pagina_redireccion'; }, 3000);</script>";
    echo '<script>setTimeout(function(){ window.location.href = "'.'http://'.$_SERVER['HTTP_HOST'].'/mascotaproject_v1.0/recuperar.php?vu='.$flag_mensaje.'"; }, 3000);</script>';
  }else {
    $flag_mensaje = 2;
    /*header('Location: http://'. $_SERVER['HTTP_HOST']. '/mascotaproject_v1.0/recuperar.php?vu='.$flag_mensaje);
    exit();*/
    echo '<script>setTimeout(function(){ window.location.href = "'.'http://'.$_SERVER['HTTP_HOST'].'/mascotaproject_v1.0/recuperar.php?vu='.$flag_mensaje.'"; }, 3000);</script>';
  }
}
else {
    $flag_mensaje = 3;
     /*header('Location: http://'. $_SERVER['HTTP_HOST']. '/mascotaproject_v1.0/recuperar.php?vu='.$flag_mensaje);
     exit();*/
    echo '<script>setTimeout(function(){ window.location.href = "'.'http://'.$_SERVER['HTTP_HOST'].'/mascotaproject_v1.0/recuperar.php?vu='.$flag_mensaje.'"; }, 3000);</script>';
}

  /*  if ($IdUsuario > 0){

      $to = $Email_rec;
      session_start();
      $_SESSION['codSec'] = uniqid();
      $linkRecupera ="http://". $_SERVER['HTTP_HOST']. "/mascotaproject_v1.0/Tabs.php?vu=". $IdUsuario;

      $subject = "Recuperación de contraseña";

      $message = "<h1>Entre a este link para poder recuperar su contraseña.</h1>";
      $message .= "<b><a href='". $linkRecupera."'> -->Recuperar<-- </a></b>";

      $header = "From:Mascotas Tracking APP \r\n";
      $header .= "MIME-Version: 1.0\r\n";
      $header .= "Content-type: text/html;charset=UTF-8\r\n";

      $retval = mail ($to,$subject,$message,$header);

      if( $retval == true ) {
         echo "<div class='card'><div class='row'><h2>Mensaje enviado correctamente</h2></div></div>";
      }else {
         echo "<div class='card'><div class='row'><h2>No se pudo enviar el correo</h2></div></div>";
      }
    }
    else {
         echo "<div class='card'><div class='row'><h2>Correo incorrecto</h2></div></div>";
    }*/


?>
</body>
</html>
