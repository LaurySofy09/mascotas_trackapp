<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="style/css/registromascota.css">
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
    <script src="JS/Forms/RegistroMascota.js"></script>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="wrapper" style="box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #cbced1; border-radius: 15px; margin-top:70px;">
    <div class="name col-md-12 col-sm-12 col-xs-12">Mi mascota</div>
    <div class="content">
      <form action="#">
        <!--<div class="user-details">-->
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="profile-img">
                  <img src="img/catdog.png" style="display: block; margin-left: auto; margin-right: auto;"/>
              </div>
            </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                <br>
                <div>
                 <input class="form-control" type="file" Name:"" style="margin-top:50px;"/>
              </div>
        </div>
        </div>
        <!--<div class="user-details">-->
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="input-box" style="position: relative;">
                <span class="details" for="txtNombreMascota">Nombre</span>
                <input class="form-field d-flex align-items-center" id="txtNombreMascota" name="NombreMascota" type="text" style="height: 45px; width: 300px; border-radius: 15px; padding-left: 35px;" placeholder="Nombre" required>
                <i class="fa fa-paw" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="input-box" style="position: relative;">
                <span class="details" for="txtEdadMascota">Edad</span>
                <input class="form-field d-flex align-items-center" id="txtEdadMascota" name="EdadMascota" type="text" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Edad" required>
                <i class="fa fa-hourglass" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
              </div>
              </div>
          </div>

          <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="input-box" style="position: relative;">
                <span class="details" for="txtSexoMascota">Sexo</span>
                <select class="form-field d-flex align-items-center" type="" id="txtSexoMascota" name="SexoMascota" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Sexo" required>
                  <option value="">--Seleccione--</option>
                  <option value="H">Hembra</option>
                  <option value="M">Macho</option>
                </select>
                <i class="fa fa-venus-mars" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
              </div>
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="input-box" style="position: relative;">
                <span class="details" for="ddlTipoMascota">Tipo de mascota</span>
                <select class="form-field d-flex align-items-center" type="" id="ddlTipoMascota" name="TipoMascota" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Tipo de mascota" required>
                  <option value="">--Seleccione--</option>
                </select>
                <i class="fa fa-tag" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
              </div>
              </div>
            </div>

        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="input-box" style="position: relative;">
              <span class="details" for="ddlRazaMascota">Raza</span>
              <select class="form-field d-flex align-items-center" id="ddlRazaMascota" name="RazaMascota" type="text" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Raza" required>
                <option value="">--Seleccione--</option>
              </select>
              <i class="fa fa-tag" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>
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

        <input id="HDusr" type="hidden" name="HDusr" value="">
        <input id="HDvc" type="hidden" name="HDvc">

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

    <!--  </div> cerrando details -->
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


          <!--</div>-->
          <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
              <button id="btnGuardar_valid" class="btn mt-1" style="font-size:1.2rem;" >Enviar</button>
              <input type="submit" style="display:none;" value="Guardar" name="Guardar" class="btn btn-primary" id="btnGuardar_post"/>
            </div>
            <div class="col-sm-4"></div>
          </div>

    </form>
    </div>
    </div>
    <!--<div class="text-left fs-6">
        <br>
        <a href="Login.html" style="font-size: 1rem; "> << Volver</a>
    </div>-->
  </div>
</body>
</html>
