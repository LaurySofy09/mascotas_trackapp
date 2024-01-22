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

   <?php
   include ("BDClass.php");
   session_start();
   $mascota =0;
   $user=0;
    if (isset($_SESSION['NuevaMascota'])) {
      $mascota =   $_SESSION['NuevaMascota'];
      $IdUsuario="";
      $Nombre="";
      $Edad="";
      $Sexo="";
      $IdTipoMascota="";
      $IdRaza="";
      $fechaNacimiento_formatNormal="";
      $Peso ="";
      $Foto ="";
      $Esterilizado ="";
      $InfoVeterinaria ="";
      $DescripcionExtra="";
      $nombreDuenio = "";
      $TelefonoDuenio="";
      $TelefonoDuenio2="";
      $emailDuenio ="";
      $DireccionDuenio = "";


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
        $IdRaza = $row["IdRaza"];
        $FechaNacimiento = $row["FechaNacimiento"];
        $old_date = explode("-", $FechaNacimiento);
        $fechaNacimiento_formatNormal = $old_date[2]."/".$old_date[1]."/".$old_date[0];
        $Peso = $row["Peso"];
        $Foto = $row["Foto"];
        $Esterilizado = $row["Esterilizado"];
        $InfoVeterinaria = $row["InfoVeterinaria"];
        $DescripcionExtra = $row["DescripcionExtra"];
        $nombreDuenio = $row["NombreDuenio"];
        $TelefonoDuenio= $row["TelefonoDuenio"];
        $TelefonoDuenio2= $row["telefonoDuenio2"];
        $emailDuenio = $row["EmailDuenio"];
        $DireccionDuenio = $row["DireccionDuenio"];
      }


    }
    ?>

<form role="form" method="post" action="<?php echo "postActualizaMascota.php"; ?>">
  <div class="container-fluid" id="dvRegistroMascita">

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <h3 class="text-center"><strong>
                   <label>Información de: <?php echo $Nombre; ?></label> </strong></h3>
            </div>
        </div>
    </div>
      <input id="HDvc" type="hidden" name="HDvc">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="txtNombreMascota" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label required">Nombre</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                  <input type="text" class="form-control" id="txtNombreMascota" name="NombreMascota" placeholder="Nombre" value="<?php echo $Nombre; ?>">
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="txtEdadMascota" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label required">Edad</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                  <input type="text" class="form-control" id="txtEdadMascota" name="EdadMascota" placeholder="Edad" value="<?php echo $Edad; ?>">
          </div>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="txtSexoMascota" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label required">Sexo</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                  <select type="" class="form-control" id="ddlSexoMascota" name="SexoMascota" placeholder="Sexo">
                    <option value="">--Seleccione--</option>
                    <option value="M">Macho</option>
                    <option value="H">Hembra</option>
                  </select>
                  <input id="HDx" type="hidden" name="HDx" value="<?php echo $Sexo;?>">
                  <input id="HDusr" type="hidden" name="HDusr" value="<?php echo $IdUsuario;?>">
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="ddlTipoMascota" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label required">Tipo de Mascota</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <select type="" class="form-control" id="ddlTipoMascota" name="TipoMascota">
                </select>
                <input id="HDtm" type="hidden" name="HDtm" value="<?php echo $IdTipoMascota;?>">
          </div>
        </div>
      </div>

    </div>

    <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="ddlRazaMascota" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label required">Raza</label>
              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                      <select type="" class="form-control" id="ddlRazaMascota" name="RazaMascota" placeholder="Raza"> </select>
              </div>
            </div>
          </div>
          <input id="HDrz" type="hidden" name="HDrz" value="<?php echo $IdRaza;?>">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="form-group">
            <label for="txtFechaNacimientoMascota" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label">Fecha de Nacimiento</label>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <input type="text" class="form-control fechaClass" id="txtFechaNacimientoMascota" name="FechaNacimientoMascota" placeholder="Fecha de Nacimiento" value="<?php echo $fechaNacimiento_formatNormal;?>">
            </div>
          </div>
        </div>
    </div>
      <input id="HDm" type="hidden" name="HDm" value="<?php echo $mascota;?>">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="txtPesoMascota" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label">Peso</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                  <input type="text" class="form-control" id="txtPesoMascota" name="PesoMascota" placeholder="Peso" value="<?php echo $Peso;?>">
          </div>
        </div>
      </div>
        <input id="HDEst" type="hidden" name="HDEst" value="<?php echo $Esterilizado;?>">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="radEsterilizado" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label required">Esterilizado</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
            <label class="control-label">
              <input type="radio" runat="server" id="Esterilizado_si" name="radEsterilizado" value="1" />Sí</label>
               <label class="control-label">
                <input type="radio" runat="server" id="Esterilizado_no" name="radEsterilizado" value="0" />No</label>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="dvVacunas">
             <div class="form-group">
                 <label for="checkVacunas" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label">Vacunas</label>
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
                  <textarea type="text" class="form-control" id="txtInformacionVet" rows="3" name="InformacionVet"><?php echo $InfoVeterinaria;?></textarea>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="txtInformacionAdicional" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label">Información Adicional</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                  <textarea type="text" class="form-control" id="txtInformacionAdicional" rows="3" name="InformacionAdicional"><?php echo $DescripcionExtra;?></textarea>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="container-fluid" id="dvRegistroDuenio">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <h3 class="text-center"><strong>
                   <label>Responsable de: <?php echo $Nombre; ?></label> </strong></h3>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="txtNombreMascota" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label required">Nombre</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                  <input type="text" class="form-control" id="txtNombreMascota" name="NombreDuenio" placeholder="Nombre" value="<?php echo $nombreDuenio; ?>">
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="txtEmail_reg" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label required">Email</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                  <input type="text" class="form-control" id="txtEmail_reg" name="EmailDuenio" placeholder="Correo electrónico recurrente" value="<?php echo $emailDuenio; ?>">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="txtTelefono_reg" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label required">Teléfono</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                  <input type="text" class="form-control" id="txtTelefono_reg" name="TelefonoDuenio" placeholder="Teléfono principal" value="<?php echo $TelefonoDuenio; ?>">
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="txtTelefono2_reg" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label">Teléfono Secundario</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                  <input type="text" class="form-control" id="txtTelefono2_reg" name="TelefonoDuenio2" placeholder="Teléfono alternativo" value="<?php echo $TelefonoDuenio2; ?>">
          </div>
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
          <label for="txtDireccion_reg" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-form-label required">Dirección</label>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
              <textarea type="text" class="form-control" id="txtDireccion_reg" rows="3" name="DireccionDuenio" placeholder="Lugar donde vive"><?php echo $DireccionDuenio; ?></textarea>
          </div>
        </div>
      </div>

    </div>


  </div>

  <div class="container-fluid" id="dvRegistroDuenio">
    <div class="row">
          <div class="offset-sm-2  text-center">
            <input type="button" value="Guardar" name="Guardar" class="btn btn-primary" id="btnGuardar_valid"/>
          </div>
          <input type="submit"
           style="display:none;" value="Guardar" name="Guardar" class="btn btn-primary" id="btnGuardar_post"/>
    </div>

  </div>

</form>


<script src="JS/Forms/PerfilMascota.js"></script>
  </body>


  </html>
