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
    <div class="name">Editar info de registro</div>
    <div class="content">
      <form action="#">
        <div class="user-details">

          <div class="input-box" style="position: relative;">
            <span class="details">Contraseña</span>
            <input class="form-field d-flex align-items-center" type="password" name="Password_reg" id="txtPassword_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte contraseña">
            <i class="fas fa-key" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>
          <div class="input-box" style="position: relative;">
            <span class="details">Confirmar Contraseña</span>
            <input class="form-field d-flex align-items-center" type="password" name="PasswordConfirm_reg" id="txtPasswordConfirm_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Confirmar contraseña">
            <i class="fas fa-key" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>

        <div class="input-box" style="position: relative;">
          <span class="details">Teléfono principal</span>
          <input class="form-field d-flex align-items-center" type="text" name="Telefono_reg" id="txtTelefono_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte teléfono principal">
          <i class="fa fa-phone" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
        </div>
        <div class="input-box" style="position: relative;">
          <span class="details">Teléfono alternativo</span>
          <input class="form-field d-flex align-items-center" type="text" name="Telefono2_reg" id="txtTelefono2_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte teléfono secundario">
          <i class="fa fa-phone" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
        </div>
          <div class="input-box" style="position: relative;">
            <span class="details">Email</span>
            <input class="form-field d-flex align-items-center" type="text" name="Email_reg" id="txtEmail_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte email">
            <i class="fa fa-envelope" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
          </div>
          <div class="input-box" style="position: relative;">
            <span class="details">Dirección</span>
            <input class="form-field d-flex align-items-center" type="text" name="Direccion_reg" class="fechaClass" id="txtDireccion_reg" style="border-radius: 15px; padding-left: 35px;" placeholder="Inserte dirección">
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
    <div class="name">Editar info de mascota</div>
    <div class="content">
      <form action="#">
        <div class="row">
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="input-box" style="position: relative;">
              <span class="details" for="txtEdadMascota">Edad</span>
              <input class="form-field d-flex align-items-center" id="txtEdadMascota" name="EdadMascota" type="text" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Edad" required>
              <i class="fa fa-hourglass" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
            </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="input-box" style="position: relative;">
                <span class="details" for="txtFechaNacimientoMascota">Fecha de nacimiento</span>
                <input class="form-field d-flex align-items-center fechaClass" type="text" id="txtFechaNacimientoMascota" name="FechaNacimientoMascota" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Fecha de Nacimiento" required>
                <i class="fa fa-birthday-cake" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
              </div>
            </div>
          </div>

          <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="input-box" style="position: relative;">
                  <span class="details" for="txtPesoMascota">Peso</span>
                  <input class="form-field d-flex align-items-center" id="txtPesoMascota" name="PesoMascota" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Peso" required>
                  <i class="fa fa-balance-scale" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 50%; t ransform: translateY(-50%);"></i>
                </div>
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
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
                      <input class="form-check-input" type="radio" runat="server" id="Esterilizado_si" name="radEsterilizado" value="0" style="border-radius: 50px; width: 20px; height:20px;"/>
                      <label class="form-check-label" for="flexRadioDefault1">No</label>
                      </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <span class="details" for="checkVacunas">Vacunas</span>
              </div>
            </div>
            <div class="row" id="vacunascaninas">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" runat="server" id="checkbox1" name="checkbox1" style="width: 20px; height:20px;"/>
                      <label class="form-check-label" for="flexRadioDefault1">Rabia</label>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" runat="server" id="checkbox2" name="checkbox2" style="width: 20px; height:20px;"/>
                      <label class="form-check-label" for="flexRadioDefault1">Parvovirus</label>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" runat="server" id="checkbox3" name="checkbox3" style="width: 20px; height:20px;"/>
                      <label class="form-check-label" for="flexRadioDefault1">Moquillo</label>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                      <div class="form-check">
                      <input class="form-check-input" type="checkbox" runat="server" id="checkbox4" name="checkbox4" style="width: 20px; height:20px;"/>
                      <label class="form-check-label" for="flexRadioDefault1">Hepatitis</label>
                      </div>
                    </div>
                  </div>

                  <!-- <div class="row" id="vacunasgatunas">
                      <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" runat="server" id="checkbox1" name="checkbox1" style="width: 20px; height:20px;"/>
                        <label class="form-check-label" for="flexRadioDefault1">Rabia</label>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" runat="server" id="checkbox2" name="checkbox2" style="width: 20px; height:20px;"/>
                        <label class="form-check-label" for="flexRadioDefault1">Trivalente</label>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" runat="server" id="checkbox3" name="checkbox3" style="width: 20px; height:20px;"/>
                        <label class="form-check-label" for="flexRadioDefault1">Leucemia</label>
                        </div>
                      </div>
                    </div>-->

                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="input-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="details" for="txtInformacionVet">Información veterinaria</span>
                        <textarea class="form-field d-flex align-items-center col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="3" id="txtInformacionVet" name="InformacionVet" style="height: 50px; border-radius: 15px;"></textarea>
                    </div>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="input-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <span class="details" for="txtInformacionAdicional">Características adicionales</span>
                        <textarea class="form-field d-flex align-items-center col-lg-12 col-md-12 col-sm-12 col-xs-12" id="txtInformacionAdicional" name="InformacionAdicional" style="height: 50px; border-radius: 15px;"></textarea>
                      </div>
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
  </div>

  <div id="Fotos" class="tabcontent">

    <style>
      * {
        box-sizing: border-box;
      }

      body {
        margin: 0;
        font-family: Arial;
      }

      .header {
        text-align: center;
        padding: 32px;
      }

      .row {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap; /* IE10 */
        flex-wrap: wrap;
        padding: 0 4px;
      }

      /* Create four equal columns that sits next to each other */
      .column {
        -ms-flex: 25%; /* IE10 */
        flex: 25%;
        max-width: 25%;
        padding: 0 4px;
      }

      .column img {
        margin-top: 8px;
        vertical-align: middle;
        width: 100%;
      }

      /* Responsive layout - makes a two column-layout instead of four columns */
      @media screen and (max-width: 800px) {
        .column {
          -ms-flex: 50%;
          flex: 50%;
          max-width: 50%;
        }
      }

      /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
      @media screen and (max-width: 600px) {
        .column {
          -ms-flex: 100%;
          flex: 100%;
          max-width: 100%;
        }
      }
</style>
    <div class="name">Galeria de Fotos</div>

    <div class="row">
      <div class="column">
        <img src="img/bc1.jpg" style="width:100%">
        <img src="img/bc2.jpg" style="width:100%">
        <img src="img/bc3.jpg" style="width:100%">
        <img src="img/bc4.jpg" style="width:100%">
        <img src="img/bc5.jpg" style="width:100%">
      </div>
      <div class="column">
      <img src="img/bc6.jpg" style="width:100%">
      <img src="img/bc7.jpg" style="width:100%">
      <img src="img/bc8.jpg" style="width:100%">
      <img src="img/bc9.jpg" style="width:100%">
      <img src="img/bc10.jpg" style="width:100%">
      </div>
      <div class="column">
      <img src="img/bc11.jpg" style="width:100%">
      </div>
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
