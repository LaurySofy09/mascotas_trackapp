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
    <script src="JS/Forms/Login.js"></script>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

  <div class="wrapper" style="box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #cbced1; border-radius: 15px;">

    <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'InfoUsuario')" id="defaultOpen">Info de Usuario</button>
    <button class="tablinks" onclick="openCity(event, 'InfoMascota')">Mascota</button>
    <button class="tablinks" onclick="openCity(event, 'Fotos')">Fotos</button>
  </div>

    <div id="InfoUsuario" class="tabcontent">
    <div class="name">Editar mi registro</div>
    <div class="content">
      <form action="#">
        <div class="user-details">

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
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
              <button id="btnActualizar_valid" class="btn mt-1" style="font-size:1.2rem;" href="registromascota.php">Actualizar</button>
              <input type="submit" style="display:none;" value="Actualizar" name="Actualizar" class="btn btn-primary" id="btnActualizar_post"/>
            </div>
            <div class="col-sm-4"></div>
          </div>

    </form>
    </div>
    <div class="text-left fs-6">
        <br>
        <a href="Login.html" style="font-size: 1rem; "> << Volver</a>
    </div>
  </div>

  <div id="InfoMascota" class="tabcontent">
    <h3>Info de Mascota</h3>
  </div>

  <div id="Fotos" class="tabcontent">
    <h3>Galeria de Fotos</h3>
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
