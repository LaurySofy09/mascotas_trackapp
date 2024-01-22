<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
<!-- App programada por Laura Sofía Domínguez y Tomás Calderón-->
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="style/css/signup.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="JS/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="JS/jquery-ui/jquery-ui.structure.css">
    <link rel="stylesheet" href="JS/jquery-ui/jquery-ui.theme.css">
    <link href="https://fonts.cdnfonts.com/css/austie-bost-kitten-klub" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!---<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--->
    <script src="JS/Jquery/jquery-3.6.3.js"></script>
    <script src="JS/Jquery/jquery-3.6.3.slim.js"></script>
    <script src="JS/jquery-ui/external/jquery/jquery.js"></script>
    <script src="JS/jquery-ui/jquery-ui.js"></script>
    <script src="JS/Jquery/alertify.js"></script>
    <script src="JS/Forms/signup.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="wrapper" style="box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #cbced1; border-radius: 15px;">
    <div class="name">Mi registro</div>
    <div class="content">
      <form action="<?php echo "registroNewUser.php"; ?>" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box" style="position: relative;">
            <span class="details">Nombre y Apellido</span>
            <input class="form-field d-flex align-items-center" name="Nombre_reg" id="txtNombre_reg" type="text" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte nombre y apellido" required>
            <i class="far fa-user" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>
          <div class="input-box" style="position: relative;">
            <span class="details">Usuario</span>
            <input class="form-field d-flex align-items-center" name="Usuario_reg" id="txtUsuario_reg" type="text" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte nombre de usuario" required>
            <i class="fa fa-user-circle" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>
          <div class="input-box" style="position: relative;">
            <span class="details">Contraseña</span>
            <input class="form-field d-flex align-items-center" type="password" name="Password_reg" id="txtPassword_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte contraseña" required>
            <i class="fas fa-key" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>
          <div class="input-box" style="position: relative;">
            <span class="details">Confirmar Contraseña</span>
            <input class="form-field d-flex align-items-center" type="password" name="PasswordConfirm_reg" id="txtPasswordConfirm_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Confirmar contraseña" required>
            <i class="fas fa-key" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>
          <div class="input-box" style="position: relative;">
            <span class="details">Cédula o Pasaporte</span>
            <input class="form-field d-flex align-items-center" name="Cedula_reg" id="txtCedula_reg" type="text" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte cédula o pasaporte" required>
            <i class="fa fa-id-card" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>
          <div class="input-box" style="position: relative;">
            <span class="details">Fecha de nacimiento</span>
            <input class="form-field d-flex align-items-center fechaClass" type="text" name="FechaNacimiento_reg" id="txtFechaNacimiento_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte fecha de nacimiento" required>
            <i class="fa fa-birthday-cake" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>
        <div class="input-box" style="position: relative;">
          <span class="details">Teléfono principal</span>
          <input class="form-field d-flex align-items-center" type="text" name="Telefono_reg" id="txtTelefono_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte teléfono principal" required>
          <i class="fa fa-phone" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
        </div>
        <div class="input-box" style="position: relative;">
          <span class="details">Teléfono alternativo</span>
          <input class="form-field d-flex align-items-center" type="text" name="Telefono2_reg" id="txtTelefono2_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte teléfono secundario">
          <i class="fa fa-phone" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
        </div>
          <div class="input-box" style="position: relative;">
            <span class="details">Email</span>
            <input class="form-field d-flex align-items-center" type="text" name="Email_reg" id="txtEmail_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte email" required>
            <i class="fa fa-envelope" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>
          <div class="input-box" style="position: relative;">
            <span class="details">Dirección</span>
            <input class="form-field d-flex align-items-center" type="text" name="Direccion_reg" class="fechaClass" id="txtDireccion_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte dirección" required>
            <i class="fa fa-map-marker" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>
          </div>
          <div class="row">
            <div id="DvmsgError" style="font-size:1rem; text-align: center; color:#cc0000;">
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
               <input type="button" style="font-size:1.2rem;" value="Guardar" name="btnGuardar_valid" class="btn mt-1" id="btnGuardar_valid"/>
              <!--<button id="btnGuardar_valid" class="btn mt-1" style="font-size:1.2rem;">Guardar</button>-->
              <input type="submit" style="display:none;" value="Guardar" name="Guardar" class="btn btn-primary" id="btnGuardar_post"/>
            </div>
            <div class="col-sm-4"></div>
          </div>


    </form>

    </div>
    <div class="text-left fs-6">
        <br>
        <a href="Login.php" style="font-size: 1rem; "> << Volver</a>
    </div>
  </div>
</body>
</html>
