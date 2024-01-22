<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="style/css/tabs.css">
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
    <script src="JS/Jquery/alertify.js"></script>
  <!--  <script src="JS/Forms/Login.js"></script> -->
     <script src="JS/Forms/EditarRegistro.js"></script>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>

   <?php
   include ("BDClass.php");
   session_start();
  /* $user=0;
   $parameter = $_SERVER['QUERY_STRING'];
   $parameterArray = explode("=", $parameter);
   if ($parameterArray[0]=="vu")
   {
     $user = $parameterArray[1];
   }*/

   $user = 0;
    $parameter = $_SERVER['QUERY_STRING'];
    $parameterArray = explode("=", $parameter);
    if ($parameterArray[0] == "vu" && isset($parameterArray[1])) {
      $user = $parameterArray[1];
    }
   $prueba = "";
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
      $prueba= "1";
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
        $pwd = $row["pwd"];
      }
    }
    else {
     if ($user != 0)
     {
       $prueba= "2";
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
         $pwd = $row["pwd"];
     }
    }
    else {
      $prueba= "3";
    }
   }
    ?>


<body>

  <div class="wrapper" style="box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #cbced1; border-radius: 15px;">

    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'InfoUsuario')" id="defaultOpen">Usuario</button>
      <button class="tablinks" onclick="openCity(event, 'InfoMascota')">Mascota</button>
    <!--<button class="tablinks" onclick="openCity(event, 'Fotos')">Fotos</button>  -->
  </div>
    <div id="InfoUsuario" class="tabcontent">

    <div class="content">
      <form action="<?php echo "postActualizaMascota_usr.php"; ?>" method="POST">
        <div class="user-details">

          <div class="input-box" style="position: relative;">
            <span class="details">Contraseña</span>
            <input class="form-field d-flex align-items-center" value="<?php echo $pwd; ?>" type="password" name="Password_reg" id="txtPassword_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte contraseña" required/>
            <i class="fas fa-key" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>
          <div class="input-box" style="position: relative;">
            <span class="details">Confirmar Contraseña</span>
            <input class="form-field d-flex align-items-center" type="password" name="PasswordConfirm_reg" id="txtPasswordConfirm_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Confirmar contraseña">
            <i class="fas fa-key" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>
          <input id="HDEst_usr" type="hidden" name="HDEst_usr" value="<?php echo $Esterilizado;?>">
          <input id="HDvc_usr" type="hidden" name="HDvc_usr">
          <input id="HDx_usr" type="hidden" name="HDx_usr" value="<?php echo $Sexo;?>">
          <input id="HDusr_usr" type="hidden" name="HDusr_usr" value="<?php echo $IdUsuario;?>">
          <input id="HDtm_usr" type="hidden" name="HDtm_usr" value="<?php echo $IdTipoMascota;?>">
          <input id="HDrz_usr" type="hidden" name="HDrz_usr" value="<?php echo $IdRaza;?>">
          <input id="HDm_usr" type="hidden" name="HDm_usr" value="<?php echo $mascota;?>">
          <input value="<?php echo $Edad; ?>" id="txtEdadMascota_usr" name="EdadMascota_usr" type="hidden">
          <input class="fechaClass" value="<?php echo $fechaNacimiento_formatNormal; ?>" type="hidden" id="txtFechaNacimientoMascota_usr" name="FechaNacimientoMascota_usr" />
          <input value="<?php echo $Peso; ?>" type="hidden" id="txtPesoMascota_usr" name="PesoMascota_usr"/>
          <input type="hidden"  value="<?php echo $Foto; ?>" name="profilepic_usr" id="profile-picture-input_usr" />
          <input type="radio" runat="server" id="Esterilizado_si_usr" name="radEsterilizado_usr" value="1" style="display:none;"/>
          <input type="radio" runat="server" id="Esterilizado_no_usr" name="radEsterilizado_usr" value="0" style="display:none;"/>
          <textarea id="txtInformacionAdicional_usr" name="InformacionAdicional_usr" style="display:none;"><?php echo $DescripcionExtra;?></textarea>
          <textarea id="txtInformacionVet_usr" name="InformacionVet_usr" style="display:none;"><?php echo $InfoVeterinaria;?></textarea>

        <div class="input-box" style="position: relative;">
          <span class="details">Teléfono principal</span>
          <input class="form-field d-flex align-items-center" value="<?php echo $TelefonoDuenio; ?>" type="text" name="TelefonoDuenio" id="txtTelefono_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte teléfono principal" required/>
          <i class="fa fa-phone" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
        </div>
        <div class="input-box" style="position: relative;">
          <span class="details">Teléfono alternativo</span>
          <input class="form-field d-flex align-items-center" value="<?php echo $TelefonoDuenio2; ?>" type="text" name="TelefonoDuenio2" id="txtTelefono2_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte teléfono secundario">
          <i class="fa fa-phone" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
        </div>
          <div class="input-box" style="position: relative;">
            <span class="details">Email</span>
            <input class="form-field d-flex align-items-center" value="<?php echo $emailDuenio; ?>" type="text" name="EmailDuenio" id="txtEmail_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte email" required/>
            <i class="fa fa-envelope" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>
          <div class="input-box" style="position: relative;">
            <span class="details">Dirección</span>
            <input class="form-field d-flex align-items-center" value="<?php echo $DireccionDuenio; ?>" type="text" name="DireccionDuenio"  id="txtDireccion_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte dirección" required/>
            <i class="fa fa-map-marker" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>
          </div>
          <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
              <button id="btnActualizar_valid_user" class="btn mt-1" style="font-size:1.2rem;">Actualizar</button>
              <input type="submit" style="display:none;" value="Actualizar" name="Actualizar" class="btn btn-primary" id="btnActualizar_post_usr"/>
            </div>
            <div class="col-sm-4"></div>
          </div>

          <div class="text-left fs-6" style="margin-top: 10px;">
              <a href="Editar.php" style="font-size: 1rem;"> << Volver</a>
          </div>
        </form>
      </div>
    </div>
    <!------------------------------------------------------------------------------------------------------->
    <div id="InfoMascota" class="tabcontent">
    <div class="content">
      <form action="<?php echo "postActualizaMascota.php"; ?>" method="POST" enctype="multipart/form-data">
        <div class="user-details">
              <div class="input-box" style="position: relative;">
                 <div class="profile-picture">
                   <img id="profile-picture-preview" src="<?php echo $Foto; ?>" alt="Foto de perfil">
                 </div>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <input class="form-control" type="file" name="profilepic" id="profile-picture-input" accept="image/*" placeholder="Foto"/>
           </div>

         <script>
           document.getElementById("profile-picture-input").addEventListener("change", function(event) {
             var input = event.target;
             var reader = new FileReader();
             reader.onload = function() {
               var imgElement = document.getElementById("profile-picture-preview");
               imgElement.src = reader.result;
             };
             reader.readAsDataURL(input.files[0]);
           });
        </script>

        <input id="HDEst" type="hidden" name="HDEst" value="<?php echo $Esterilizado;?>">
        <input id="HDvc" type="hidden" name="HDvc">
        <input id="HDx" type="hidden" name="HDx" value="<?php echo $Sexo;?>">
        <input id="HDusr" type="hidden" name="HDusr" value="<?php echo $IdUsuario;?>">
        <input id="HDtm" type="hidden" name="HDtm" value="<?php echo $IdTipoMascota;?>">
        <input id="HDrz" type="hidden" name="HDrz" value="<?php echo $IdRaza;?>">
        <input id="HDm" type="hidden" name="HDm" value="<?php echo $mascota;?>">
        <input id="HDpic" type="hidden" name="HDpic" value="<?php echo $Foto;?>">
        <input value="<?php echo $pwd; ?>" type="hidden" name="Password_reg_masc" id="txtPassword_reg_masc" style="display:none;" />
        <input value="<?php echo $emailDuenio; ?>" type="hidden" name="EmailDuenio_masc" id="txtEmail_reg_masc" />
        <input value="<?php echo $TelefonoDuenio; ?>" type="hidden" name="TelefonoDuenio_masc" id="txtTelefono_reg_masc"/>
        <input value="<?php echo $TelefonoDuenio2; ?>" type="hidden" name="TelefonoDuenio2_masc" id="txtTelefono2_reg_masc">
        <input value="<?php echo $DireccionDuenio; ?>" type="hidden" name="DireccionDuenio_masc"  id="txtDireccion_reg_masc"/>

          <div class="input-box" style="position: relative; margin-top: 5px;">
            <span class="details">Edad</span>
            <input class="form-field d-flex align-items-center" value="<?php echo $Edad; ?>" id="txtEdadMascota" name="EdadMascota" type="text" style="border-radius: 15px; padding-left: 35px;" placeholder="Edad">
            <i class="fa fa-hourglass" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>
          <div class="input-box" style="position: relative; margin-top: 5px;">
            <span class="details" for="txtFechaNacimientoMascota">Fecha de nacimiento</span>
            <input class="form-field d-flex align-items-center fechaClassMasc" value="<?php echo $fechaNacimiento_formatNormal; ?>" type="type" id="txtFechaNacimientoMascota" name="FechaNacimientoMascota" style="border-radius: 15px; padding-left: 35px;" placeholder="Fecha de Nacimiento"/>
            <i class="fa fa-birthday-cake" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>

        <div class="input-box" style="position: relative;">
          <span class="details" for="txtPesoMascota">Peso</span>
          <input class="form-field d-flex align-items-center" value="<?php echo $Peso; ?>" id="txtPesoMascota" name="PesoMascota" style="border-radius: 15px; padding-left: 35px;" placeholder="Peso"/>
          <i class="fa fa-balance-scale" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 50%; t ransform: translateY(-50%);"></i>
        </div>
        <div class="input-box" style="position: relative;">
          <span class="details" for="radEsterilizado">Esterilizado</span>
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="form-check">
              <input class="form-check-input" type="radio" runat="server" id="Esterilizado_si" name="radEsterilizado" value="1" style="border-radius: 50px; width: 20px; height:20px;"/>
              <label class="form-check-label" for="flexRadioDefault1">Sí</label>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="form-check">
              <input class="form-check-input" type="radio" runat="server" id="Esterilizado_no" name="radEsterilizado" value="0" style="border-radius: 50px; width: 20px; height:20px;"/>
              <label class="form-check-label" for="flexRadioDefault1">No</label>
            </div>
          </div>
        </div>

          <div class="input-box" style="position: relative;">
            <span class="details" for="checkVacunas">Vacunas</span>
          </div>
         <div class="row" style="margin-left:5px;" id="dvCheckbox">
          <div class="form-check" id="dvCheckbox"> </div>
        </div>

        <div class="input-box" style="position: relative; margin-top: 10px;">
            <div class="form-group">
            <span class="details" for="txtInformacionVet">Información veterinaria</span>
              <textarea class="form-control" id="txtInformacionVet" name="InformacionVet" style="height: 50px; border-radius: 15px;"><?php echo $InfoVeterinaria;?></textarea>
            </div>
          </div>
        <div class="input-box" style="position: relative;">
          <div class="form-group">
            <span class="details" for="txtInformacionAdicional">Características adicionales</span>
              <textarea class="form-control" id="txtInformacionAdicional" name="InformacionAdicional" style="height: 50px; border-radius: 15px;"><?php echo $DescripcionExtra;?></textarea>
          </div>
        </div>
    </div>


          <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
              <button id="btnActualizarMasocta_valid" class="btn mt-1" style="font-size:1.2rem;">Actualizar</button>
              <input type="submit" style="display:none;" value="Actualizar" name="Actualizar" class="btn btn-primary" id="btnGuardar_post"/>
            </div>
            <div class="col-sm-4"></div>
          </div>

          <div class="text-left fs-6" style="margin-top: 10px;">
              <a href="Editar.php" style="font-size: 1rem;"> << Volver</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
</script>

</body>
</html>
