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

<?php
include ("BDClass.php");
session_start();

$user=0;
$parameter = $_SERVER['QUERY_STRING'];
$parameterArray = explode("=", $parameter);
if ($parameterArray[0]=="vu")
{
  $user = $parameterArray[1];
}

$mascota =0;
$IdUsuario="";
$Nombre="";
$Edad="";
$Sexo="";
$IdTipoMascota="";
$descTipoMascota = "";
$IdRaza="";
$descRaza = "";
$fechaNacimiento_formatNormal="";
$Peso ="";
$Foto ="";
$Esterilizado ="";
$DescEsterelizado = "";
$InfoVeterinaria ="";
$DescripcionExtra="";
$nombreDuenio = "";
$TelefonoDuenio="";
$TelefonoDuenio2="";
$emailDuenio ="";
$DireccionDuenio = "";
$pwd ="";

 if (isset($_SESSION['NuevaMascota'])) {
   $mascota =   $_SESSION['NuevaMascota'];
   $pdo = BD::obtenerBD()->obtenerConexion();
   $comando = 'Call SP_C_ConsultarMascotas(?,?);';
   $stmt = BD::obtenerBD()->obtenerConexion()->prepare($comando);
   $stmt->bindParam(1, $user, PDO::PARAM_INT, 20);
   $stmt->bindParam(2, $mascota, PDO::PARAM_INT, 20);
   $stmt->execute();
   $data = $stmt->fetchAll();
   $resultado = array();


   foreach ($data as $row){
     $IdUsuario = $row["IdUsuario"];
     $Nombre = $row["Nombre"];
     $Edad = $row["Edad"];
     $Sexo = $row["Sexo"];
     $IdTipoMascota = $row["IdTipoMascota"];
     $descTipoMascota = $row["descTipoMascota"];
     $IdRaza = $row["IdRaza"];
     $descRaza = $row["descRaza"];
     $FechaNacimiento = $row["FechaNacimiento"];
     $old_date = explode("-", $FechaNacimiento);
     $fechaNacimiento_formatNormal = $old_date[2]."/".$old_date[1]."/".$old_date[0];
     $Peso = $row["Peso"];
     $Foto = $row["Foto"];
     $Esterilizado = $row["Esterilizado"];
     $DescEsterelizado = $row["DescEsterilizado"];
     $InfoVeterinaria = $row["InfoVeterinaria"];
     $DescripcionExtra = $row["DescripcionExtra"];
     $nombreDuenio = $row["NombreDuenio"];
     $TelefonoDuenio= $row["TelefonoDuenio"];
     $TelefonoDuenio2= $row["telefonoDuenio2"];
     $emailDuenio = $row["EmailDuenio"];
     $DireccionDuenio = $row["DireccionDuenio"];
   }
 }
 else {
   if ($user != 0)
   {
     $pdo = BD::obtenerBD()->obtenerConexion();
     $comando = 'Call SP_C_ConsultarMascotas(?,?);';
     $stmt = BD::obtenerBD()->obtenerConexion()->prepare($comando);
     $stmt->bindParam(1, $user, PDO::PARAM_INT, 20);
     $stmt->bindParam(2, $mascota, PDO::PARAM_INT, 20);
     $stmt->execute();
     $data = $stmt->fetchAll();
     $resultado = array();

     foreach ($data as $row){
       $IdUsuario = $row["IdUsuario"];
       $mascota = $row["IdMascota"];
       $Nombre = $row["Nombre"];
       $Edad = $row["Edad"];
       $Sexo = $row["Sexo"];
       $IdTipoMascota = $row["IdTipoMascota"];
       $descTipoMascota = $row["descTipoMascota"];
       $IdRaza = $row["IdRaza"];
       $descRaza = $row["descRaza"];
       $FechaNacimiento = $row["FechaNacimiento"];
       $old_date = explode("-", $FechaNacimiento);
       $fechaNacimiento_formatNormal = $old_date[2]."/".$old_date[1]."/".$old_date[0];
       $Peso = $row["Peso"];
       $Foto = $row["Foto"];
       $Esterilizado = $row["Esterilizado"];
       $DescEsterelizado = $row["DescEsterilizado"];
       $InfoVeterinaria = $row["InfoVeterinaria"];
       $DescripcionExtra = $row["DescripcionExtra"];
       $nombreDuenio = $row["NombreDuenio"];
       $TelefonoDuenio= $row["TelefonoDuenio"];
       $TelefonoDuenio2= $row["telefonoDuenio2"];
       $emailDuenio = $row["EmailDuenio"];
       $DireccionDuenio = $row["DireccionDuenio"];
   }
 }
}
 ?>

<body style="background: linear-gradient(135deg, #71b7e6, #9b59b6); background-repeat: no-repeat; background-size: 4000px 4000px;">

  <div class="container">
    <div class="main-body">

          <div class="row gutters-sm">
              <input id="HDm" type="hidden" name="HDm" value="<?php echo $mascota;?>">
            <div class="col-md-4">
              <div class="profile-picture">
                <?php if ($Foto=="" || $Foto==null) {  ?>
                <img src="img/perrin.jpg" alt="" style="width:100%;">
              <?php }  else{?>
                <img src="<?php echo $Foto; ?>" alt="" style="width:100%;">
              <?php  } ?>
                <div class="nombrepie">
                  <h3><?php echo $Nombre; ?></h3>
                </div>
              </div>
              <input id="HDvc" type="hidden" name="HDvc">
              <div class="polaroid">
                <h6 style="padding-left: 30px; padding-top: 30px;"><i class="fa fa-user-circle"></i> Dueño:</h6>
                <div style="padding-left: 55px; ">
                    <?php echo $nombreDuenio; ?>
                </div>
                <h6 style="padding-left: 30px; padding-top: 30px;"><i class="fa fa-phone"></i> Teléfono:</h6>
                <div style="padding-left: 55px;">
                  <a href="<?php echo "tel:". $TelefonoDuenio; ?>"> <?php echo $TelefonoDuenio; ?></a>
                </div>
                <div style="padding-left: 55px;">
                  <a href="<?php echo "tel:". $TelefonoDuenio2; ?>">  <?php echo $TelefonoDuenio2; ?> </a>
                </div>
                <h6 style="padding-left: 30px; padding-top: 30px;"><i class="fa fa-envelope"></i> Email:</h6>
                <div style="padding-left: 55px; font-size: 15px;">
                    <?php echo $emailDuenio; ?>
                </div>
                <h6 style="padding-left: 30px; padding-top: 30px;"><i class="fa fa-map-marker"></i> Dirección:</h6>
                <div style="padding-left: 55px;">
                  <?php echo $DireccionDuenio; ?>
                </div>
                <br>
              </div>
            </div>
            <div class="col-md-8 col-sm-6 col-xs-6">
              <div class="card">
                <div class="card-body" style="padding: 30px; margin-bottom:40px;">
                  <div class="row">
                      <div class="col-md-3 col-sm-6 col-xs-6">
                        <h6><i class="fa fa-hourglass"></i> Edad</h6>
                      </div>
                      <div class="col-md-3 col-sm-6 col-xs-6 text-secondary" style="margin-bottom:20px;">
                        <?php echo $Edad; ?>
                      </div>
                      <div class="col-md-3 col-sm-6 col-xs-6">
                        <h6><i class="fa fa-venus-mars" aria-hidden="true"></i>  Sexo</h6>
                      </div>
                      <div class="col-md-3 col-sm-6 col-xs-6 text-secondary">
                        <?php echo $Sexo; ?>
                      </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                      <h6><i class="fa fa-tag" aria-hidden="true"></i> Tipo de mascota</h6>
                    </div>
                      <div class="col-md-3 col-sm-6 col-xs-6 text-secondary" style="margin-bottom:20px;">
                        <?php
                        echo $descTipoMascota;
                         ?>
                        <input id="HDtm" type="hidden" name="HDtm" value="<?php echo $IdTipoMascota;?>">
                    </div>
                      <div class="col-md-3 col-sm-6 col-xs-6">
                        <h6><i class="fa fa-tag" aria-hidden="true"></i> Raza</h6>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 text-secondary">
                      <?php
                      echo $descRaza;
                       ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                      <h6><i class="fa fa-birthday-cake" aria-hidden="true"></i> Fecha de nacimiento</h6>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 text-secondary" style="margin-bottom:20px;">
                        <?php echo $fechaNacimiento_formatNormal; ?>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                      <h6><i class="fa fa-balance-scale" aria-hidden="true"></i> Peso</h6>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 text-secondary">
                      <?php echo $Peso; ?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                      <h6><i class="fa fa-medkit" aria-hidden="true"></i> Esterilizado</h6>
                    </div>
                      <div class="col-md-3 col-sm-6 col-xs-6 text-secondary" style="margin-bottom:20px;">
                        <?php
                        echo $DescEsterelizado;
                        ?>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                      <h6><i class="fa fa-syringe" aria-hidden="true"></i> Vacunas</h6>
                    </div>
                      <div id="dvCheckbox" class="col-md-3 col-sm-6 col-xs-6 text-secondary" style="margin-bottom:20px;">

                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-4">
                      <h6 class="mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i> Información veterinaria</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                      <?php echo $InfoVeterinaria; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-4">
                      <h6 class="mb-0"><i class="fa fa-info-circle" aria-hidden="true"></i> Características adicionales</h6>
                    </div>
                    <div class="col-sm-8 text-secondary">
                    <?php echo $DescripcionExtra; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12"> </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div id="qrcode">
                        </div>
                          <input class="form-control" id="text" type="text" value="<?php echo 'https://c562-200-46-165-56.ngrok-free.app/mascotaproject_v1.0/pet.php'.'?vu='.$IdUsuario; ?>" style="width:80%; display: none;" />
                      <br/>
                    </div>
                      <div class="col-md-4 col-sm-12 col-xs-12"> </div>
                    </div>

                  </div>
                </div>
              </div>


            </div>
              <div class="col-md-1">  </div>
          </div>
          <div>
            <a href="login.php" style="font-size: 1rem; margin-left: 20px; color: black;"><i class="fa fa-lock" aria-hidden="true"></i> Cerrar sesión</a>
          </div>
        </div>
    <script src="JS/Forms/PerfilMascota.js"></script>
</body>

</html>
