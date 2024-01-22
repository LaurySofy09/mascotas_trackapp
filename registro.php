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

    <!-- Template Stylesheet -->
    <!--<link href="css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="style/css/registro.css">
    <link rel="stylesheet" href="style/css/registro2.css">

</head>

<body>

  <form role="form" method="post" action="<?php echo "registroNewUser.php"; ?>">

    <div class="wrapper">
      <div class="text-center mt-4 name">
          Formulario de registro
      </div>
      <br>
      <br>

      <form class="p-3 mt-3">
          <div class="form-field d-flex p-1 align-items-center">
              <span class="far fa-user"></span>
              <input type="text" name="Usuario_reg" id="txtUsuario_reg" placeholder="Usuario">
              <div class="Dsp_no" style="" id="spanErrorUserReg"> campo requerido </div>
          </div>
            <div class="form-field d-flex p-1 align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="Password_reg" id="txtPassword_reg" placeholder="Contraseña">
                <div class="Dsp_no" id="spanErrorPasswordReg"> campo requerido </div>
            </div>
            <div class="form-field d-flex p-1 align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="PasswordConfirm_reg" id="txtPasswordConfirm_reg" placeholder="Confirme Contraseña">
                <div class="Dsp_no" id="spanErrorConfirmPassReg"> campo requerido </div>
                <div class="Dsp_no" id="spanErrorNoCoincideReg"> La contraseña no coincide </div>
            </div>
          </div>
      </form>
    </div>

    <div class="wrapper2">
      <form class="p-3 mt-3">
          <div class="form-field d-flex p-1 align-items-center2">
              <span class="fa fa-user-circle"></span>
              <input type="text" name="Nombre_reg" id="txtNombre_reg" placeholder="Nombre y Apellido">
              <div class="Dsp_no" id="spanErrorNombreReg"> campo requerido </div>
          </div>
          <div class="form-field d-flex p-1 align-items-center">
              <span class="fa fa-id-card"></span>
              <input type="text" name="Cedula_reg" id="txtCedula_reg" placeholder="Cédula o Pasaporte">
              <div class="Dsp_no" id="spanErrorCedulaReg"> campo requerido </div>
          </div>
          <div class="form-field d-flex p-1 align-items-center">
              <span class="fa fa-envelope"></span>
              <input type="text" name="Email_reg" id="txtEmail_reg" placeholder="Correo electrónico">
              <div class="Dsp_no" id="spanErrorEmailReg"> campo requerido </div>
          </div>
          <div class="form-field d-flex p-1 align-items-center">
              <span class="fa fa-phone"></span>
              <input type="text" name="Telefono_reg" id="txtTelefono_reg" placeholder="Teléfono principal">
              <div class="Dsp_no" id="spanErrorTelefonoReg"> campo requerido </div>
          </div>
          <div class="form-field d-flex p-1 align-items-center">
              <span class="fa fa-phone"></span>
              <input type="text" name="Telefono2_reg" id="txtTelefono2_reg" placeholder="Teléfono alternativo">
          </div>
          <div class="form-field d-flex p-1 align-items-center">
              <span class="fa fa-calendar"></span>
              <input type="text" name="FechaNacimiento_reg" id="txtFechaNacimiento_reg" placeholder="Fecha de Nacimiento">
              <div class="Dsp_no" id="spanErrorFechaNacReg"> campo requerido </div>
          </div>
          <div class="form-field d-flex p-1 align-items-center">
              <span class="fa fa-map-marker"></span>
              <input type="text" name="Direccion_reg" class="fechaClass" id="txtDireccion_reg" rows="3" placeholder="Lugar donde vive">
              <div class="Dsp_no" id="spanErrorDireccionReg"> campo requerido </div>
          </div>
          <div>
             <!--<input type="button" value="Regresar" name="Regresar" class="btn btn-success" id="btnRegresarLogin"/> -->
             <a class="btn btn-success" value="Regresar" name="Regresar" href="Login.html"><span>Regresar</span></a>
             <br>
             <br>
             <input type="button" value="Guardar" name="Guardar" class="btn btn-primary" id="btnGuardar_valid"/>
             <input type="submit" style="display:none;" value="Guardar" name="Guardar" class="btn btn-primary" id="btnGuardar_post"/>
          </div>
      </form>
    </div>
</form>


</body>

</html>
