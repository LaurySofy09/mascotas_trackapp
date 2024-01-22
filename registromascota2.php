<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
  <link rel="stylesheet" href="style/css/bootstrap.min.css">
  <link rel="stylesheet" href="JS/jquery-ui/jquery-ui.css">
  <link rel="stylesheet" href="JS/jquery-ui/jquery-ui.structure.css">
  <link rel="stylesheet" href="JS/jquery-ui/jquery-ui.theme.css">
  <link rel="stylesheet" href="style/Estilos.css">


  <script src="JS/Jquery/jquery-3.6.3.js"></script>
  <script src="JS/Jquery/jquery-3.6.3.slim.js"></script>
  <script src="JS/jquery-ui/external/jquery/jquery.js"></script>
  <script src="JS/jquery-ui/jquery-ui.js"></script>
</head>



<body>

<form role="form" method="post" action="<?php echo "postRegistroMascota.php"; ?>">

<div class="container-fluid" id="dvRegistroMascita">

  <div class="panel panel-default">
      <div class="panel-heading">
          <div class="row">
              <h3 class="text-center"><strong>
                 <label>Información de su Mascota</label> </strong></h3>
          </div>
      </div>
  </div>

  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="txtNombreMascota" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label required">Nombre</label>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <input type="text" class="form-control" id="txtNombreMascota" name="NombreMascota" placeholder="Nombre">
                <div class="Dsp_no" id="spanErrorNombreMas"> campo requerido </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="txtEdadMascota" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label required">Edad</label>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <input type="text" class="form-control" id="txtEdadMascota" name="EdadMascota" placeholder="Edad">
                <div class="Dsp_no" id="spanErrorEdadMas"> campo requerido </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="txtSexoMascota" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label required">Sexo</label>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <select type="" class="form-control" id="txtSexoMascota" name="SexoMascota" placeholder="Sexo">
                  <option value="">--Seleccione--</option>
                  <option value="M">Macho</option>
                  <option value="H">Hembra</option>
                </select>
                <div class="Dsp_no" id="spanErrorSexoMas"> campo requerido </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="ddlTipoMascota" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label required">Tipo de Mascota</label>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
              <select type="" class="form-control" id="ddlTipoMascota" name="TipoMascota" placeholder="Sexo">
                  <option value="">--Seleccione--</option>

              </select>
              <div class="Dsp_no" id="spanErrorTipoMas"> campo requerido </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="ddlRazaMascota" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label required">Raza</label>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <select type="" class="form-control" id="ddlRazaMascota" name="RazaMascota" placeholder="Sexo"> </select>
                <div class="Dsp_no" id="spanErrorSexoMas"> campo requerido </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="txtFechaNacimientoMascota" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label">Fecha de Nacimiento</label>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <input type="text" class="form-control fechaClass" id="txtFechaNacimientoMascota" name="FechaNacimientoMascota" placeholder="Fecha de Nacimiento">
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="txtPesoMascota" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label">Peso</label>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <input type="text" class="form-control" id="txtPesoMascota" name="PesoMascota" placeholder="Peso">
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="radEsterilizado" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label required">Esterilizado</label>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
          <label class="control-label">
            <input type="radio" runat="server" id="Esterilizado_si" name="radEsterilizado" value="1" />Sí</label>
 						 <label class="control-label">
 							<input type="radio" runat="server" id="Esterilizado_no" name="radEsterilizado" value="0" />No</label>
          <div class="Dsp_no" id="spanErrorEsterilizadoMas"> campo requerido </div>
        </div>
      </div>
    </div>
  </div>
  <input id="HDusr" type="hidden" name="HDusr" value="">
  <input id="HDvc" type="hidden" name="HDvc">
 <div class="row">

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 Dsp_no" id="dvVacunas">
          <div class="form-group">
              <label for="checkVacunas" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label">Vacunas</label> <!-- Quemar 4 checbox -->
              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" id="dvCheckbox">
              </div>
          </div>
    </div>

 </div>

  <div class="row">

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="txtInformacionVet" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label">Información de Veterinario</label>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <textarea type="text" class="form-control" id="txtInformacionVet" rows="3" name="InformacionVet"></textarea>
        </div>
      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="form-group">
        <label for="txtInformacionAdicional" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label">Información Adicional</label>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <textarea type="text" class="form-control" id="txtInformacionAdicional" rows="3" name="InformacionAdicional"></textarea>
        </div>
      </div>
    </div>


  </div>

  <div class="row">
        <div class="offset-sm-2  text-center">
          <input type="button" value="Guardar" name="Guardar" class="btn btn-primary" id="btnGuardar_valid"/>
        </div>
        <input type="submit"
         style="display:none;" value="Guardar" name="Guardar" class="btn btn-primary" id="btnGuardar_post"/>
  </div>

</div>

</form>

<script src="JS/Forms/RegistroMascota.js"></script>

</body>


</html>
