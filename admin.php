<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
      <meta charset="UTF-8">

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
      <link rel="stylesheet" href="JS/jquery-ui/jquery-ui.css">
      <link rel="stylesheet" href="JS/jquery-ui/jquery-ui.structure.css">
      <link rel="stylesheet" href="JS/jquery-ui/jquery-ui.theme.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/bootstrap.min.css" />

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
       <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
      <!---<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--->
      <script src="JS/Jquery/jquery-3.6.3.js"></script>
      <script src="JS/Jquery/jquery-3.6.3.slim.js"></script>
      <script src="JS/jquery-ui/external/jquery/jquery.js"></script>
      <script src="JS/jquery-ui/jquery-ui.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"></script>

      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <style>
        .letra { font-family: Calibri!important; font-size: 20px!important; }

        /* Ajustar tamaño del modal en dispositivos móviles */
          @media (max-width: 575.98px) {
            .modal-dialog {
              margin: 0;
              width: 100%;
              max-width: none;
            }
          }

          /* Ajustar tamaño del modal en dispositivos tablet */
          @media (max-width: 767.98px) {
            .modal-dialog {
              max-width: 90%;
            }
          }

          /* Ajustar tamaño del modal en dispositivos desktop */
          @media (min-width: 768px) {
            .modal-dialog {
              margin: 30px auto;
              max-width: 600px;
            }
          }
      </style>

  </head>

  <?php

  include ("BDClass.php");
  session_start();

  $userAdmin = 0;
  if (isset($_SESSION['IdUsuario'])) {
    $userAdmin = $_SESSION['IdUsuario'];
  }

  ?>

  <body>

    <?php
       if ($userAdmin > 0)
       {
    ?>

<div class="container-scroller">
  <div class="content">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
        <a class="navbar-brand" href="#">Mascota Tracking Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!--   <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Acerca de</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contacto</a>
            </li>
          </ul> -->
        </div>
        <div class="d-flex">
          <img src="img/catdog.png" class="rounded-circle d-none" alt="Foto de perfil">
          <button class="btn btn-outline-danger" id="btnCierreSession" type="button">Cerrar sesión</button>
        </div>
      </div>
    </nav>

      <div class="row">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-sm-12 col-xs-12">
                <h4 class="card-title">Panel de Administrador de Usuarios</h4>
              </div>
              <div class="col-md-6 col-sm-12 col-xs-12">
                  <button id="btnNuevoUsuario" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" style="font-size:1.2rem;" >Nuevo Usuario</button>
              </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
            </div>

            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-lg-12 col-xs-12">
                  <div class="table-responsive">
                      <table id="tblUsers" class="table table-hover dtUser">
                        <thead>
                          <tr>
                            <th class="letra"> </th>
                            <th class="letra"> </th>
                            <th class="letra">#</th>
                            <th class="letra">Foto</th>
                            <th style="display: none;">IdUsuario</th>
                            <th class="letra">Nombre</th>
                            <th class="letra">Cédula</th>
                            <th class="letra">Email</th>
                            <th class="letra">Teléfono</th>
                            <th class="letra">Teléfono 2</th>
                            <th class="letra">Fecha de nacimiento</th>
                            <th class="letra">Dirección</th>
                            <th class="letra">Fecha Miembro</th>
                            <th class="letra">Mascota</th>
                            <th class="letra">Estado</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $pdo = BD::obtenerBD()->obtenerConexion();
                          $comando = 'Call SP_Admin_Consultar_Usuarios();';
                          $smt = BD::obtenerBD()->obtenerConexion()->prepare($comando);
                          $smt->execute();
                          $data = $smt->fetchAll();  ?>

                          <?php foreach ($data as $row):
                            $FechaNacimiento = $row['FechaNacimiento'];
                            $old_date = explode("-", $FechaNacimiento);
                            $fechaNacimiento_formatNormal = $old_date[2]."/".$old_date[1]."/".$old_date[0];
                             ?>
                             <tr>
                               <td class=''> <center> <a style='color: #FFFFFF;' id='btnDel' class='btn btn-danger btnDelete' onclick="confirmDeleteRegistro(<?=$row['IdUsuario']?>)"> <i class='fa fa-eraser'></i> <span class="d-none"> <?=$row['IdUsuario']?> </span></a> </center> </td>
                               <td class=''> <center> <a style='color: #FFFFFF;' id='btnEdit' class='btn btn-primary btnEdit' onclick="AbrirModalEdit(<?=$row['IdUsuario']?>)" data-bs-toggle="modal" data-bs-target="#myModal"> <i class='fa fa-pen'></i></a> </center> </td>
                               <td> <?=$row['Secuencia']?></td>
                               <td> <?=$row['Foto']?> </td>
                               <td  style="display: none;"> <?=$row['IdUsuario']?> </td>
                               <td> <?=$row['nombreUsuario']?> </td>
                               <td> <?=$row['cedula']?> </td>
                               <td> <?= $row['Email'] ?> </td>
                               <td> <?= $row['Telefono'] ?> </td>
                               <td> <?= $row['Telefono2'] ?> </td>
                               <td> <?= $fechaNacimiento_formatNormal?></td>
                               <td> <?= $row['Direccion'] ?></td>
                               <td> <?= $row['FechaCrea'] ?></td>
                               <td> <?= $row['NombreMascota'] ?></td>
                               <td> <?= $row['DescEstado'] ?></td>
                               </tr>
                             <?php endforeach ?>
                        </tbody>
                      </table>


                      <div id="myModal" class="modal fade">
                         <div class="modal-dialog">

                         </div>
                        <div class="modal-content">

                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Llene la Información Solicitada</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                          <!--<span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>-->
                          <div class="modal-body">
                            <div class="card">

                              <input id="HDusAdmin" type="hidden" name="HDusAdmin" value="<?php echo $userAdmin; ?>">
                              <input id="HDvc" type="hidden" name="HDvc">
                              <input id="HDuserSelect" type="hidden" name="HDuserSelect">
                              <input id="HDmasc" type="hidden" name="HDmasc">

                                <div class="row">
                                  <h3>Datos del Usuario</h3>
                                </div>
                                </hr>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="input-box">
                                      <span class="details" for="ddlTipoMascota">Rol del Usuario</span>
                                        <select class="form-field d-flex align-items-center" type="" id="ddlRolUsuario" name="RolUsuario" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Rol del Usuario" required>
                                            <option value="">--Seleccione--</option>
                                        </select>
                                        <input class="form-field d-flex align-items-center d-none" disabled="disabled" id="txtrolUsuario" name="txtrolUsuario" type="text" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Nombre de Usuario"/>
                                      <!--<i class="far fa-user" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>-->
                                  </div>
                                  </div>

                                  <div class="col-md-6 col-sm-12 col-xs-12 d-none" id="dvEstado">
                                    <div class="input-box">
                                      <span class="details" for="ddlEstado">Estado</span>
                                        <select class="form-field d-flex align-items-center" type="" id="ddlEstado" name="Estado" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" required>
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                      <!--<i class="far fa-user" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>-->
                                  </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6 col-sm-12 col-xs-12">
                                      <div class="input-box">
                                          <span class="details">Usuario</span>
                                          <input class="form-field d-flex align-items-center" id="txtUsuario" name="txtUsuario" type="text" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Nombre de Usuario" required/>
                                          <!--<i class="fa fa-user-circle" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>-->
                                      </div>
                                  </div>

                                  <div class="col-md-6 col-sm-12 col-xs-12">
                                      <div class="input-box">
                                        <span class="details" for="txtNombreUsuario">Nombre</span>
                                        <input class="form-field d-flex align-items-center" id="txtNombre" name="Nombre" type="text" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Nombre Y Apellido" required/>
                                        <!--<i class="far fa-user" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>-->
                                      </div>
                                  </div>

                              </div>

                              <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="input-box">
                                      <span class="details" for="txtFechaNacimiento">Fecha de nacimiento</span>
                                      <input class="form-field d-flex align-items-center fechaClass" id="txtFechaNacimiento" name="FechaNacimiento" type="text" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Fecha de Nacimiento" required/>
                                      <!--<i class="fa fa-birthday-cake" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>-->
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="input-box">
                                      <span class="details" for="txtCedula">Cédula</span>
                                      <input class="form-field d-flex align-items-center" id="txtCedula" name="Cedula" type="text" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Cédula" required/>
                                      <!--<i class="fa fa-id-card" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>-->
                                    </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="input-box">
                                      <span class="details" for="txtTelefono">Teléfono</span>
                                      <input class="form-field d-flex align-items-center" id="txtTelefono" name="Telefono" type="text" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Teléfono" required/>
                                      <!--<i class="fa fa-phone" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>-->
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="input-box">
                                      <span class="details" for="txtTelefono2">Teléfono 2</span>
                                      <input class="form-field d-flex align-items-center" id="txtTelefono2" name="Telefono2" type="text" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Telefono2"/>
                                      <!--<i class="fa fa-phone" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>-->
                                    </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="input-box">
                                      <span class="details" for="txtEmail">Email</span>
                                      <input class="form-field d-flex align-items-center" id="txtEmail" name="Email" type="text" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Email" required/>
                                      <!--<i class="fa fa-envelope" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>-->
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                  <div class="input-box">
                                    <span class="details">Dirección</span>
                                    <input class="form-field d-flex align-items-center" id="txtDireccion" name="txtDireccion" type="text" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Dirección" required/>
                                    <!--<i class="fa fa-map-marker" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>-->
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
                              </div>

                              <div class="row d-none" id="dvDataMascota">

                                <div class="row">
                                  <h3>Datos de la Mascota</h3>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
                                </div>


                                <div class="row">
                                  <div class="col-md-6 col-sm-12 col-xs-12">
                                      <div class="input-box">
                                          <span class="details">Nombre de mascota</span>
                                          <input class="form-field d-flex align-items-center" id="txtNombreMascota" name="NombreMascota" type="text" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Nombre de mascota" required/>
                                          <!--<i class="fa fa-user-circle" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>-->
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12 col-xs-12">
                                      <div class="input-box">
                                        <span class="details" for="txtEdadMascota">Edad</span>
                                        <input class="form-field d-flex align-items-center" id="txtEdadMascota" name="EdadMascota" type="text" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Edad de mascota" required/>
                                        <!--<i class="far fa-user" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>-->
                                      </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="input-box">
                                      <span class="details" for="ddlTipoMascota">Tipo de mascota</span>
                                        <select class="form-field d-flex align-items-center" type="" id="ddlTipoMascota" name="TipoMascota" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Tipo de mascota" required>
                                            <option value="">--Seleccione--</option>
                                        </select>
                                      <!--<i class="far fa-user" aria-hidden="true" style="position: absolute; width: 20px; height: 20px; left: 12px; top: 70%; transform: translateY(-70%);"></i>-->
                                  </div>
                                  </div>

                                  <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="input-box">
                                    <span class="details" for="ddlRazaMascota">Raza</span>
                                    <select class="form-field d-flex align-items-center" id="ddlRazaMascota" name="RazaMascota" type="" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Raza" required/>
                                      <option value="">--Seleccione--</option>
                                    </select>
                                  </div>
                                </div>

                              </div>

                              <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                  <div class="input-box" style="position: relative;">
                                    <span class="details" for="txtFechaNacimientoMascota">Fecha de nacimiento</span>
                                    <input class="form-field d-flex align-items-center fechaClassMasc" type="text" id="txtFechaNacimientoMascota" name="FechaNacimientoMascota" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Fecha de Nacimiento" required/>
                                  </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                  <div class="input-box" style="position: relative;">
                                    <span class="details" for="txtPesoMascota">Peso</span>
                                    <input class="form-field d-flex align-items-center" id="txtPesoMascota" name="PesoMascota" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Peso"/>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
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
                                        <input class="form-check-input" type="radio" runat="server" id="Esterilizado_no" name="radEsterilizado" value="0" style="border-radius: 50px; width: 20px; height:20px;"/>
                                        <label class="form-check-label" for="flexRadioDefault1">No</label>
                                        </div>
                                      </div>
                                  </div>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="input-box" style="position: relative;">
                                  <span class="details" for="txtSexoMascota">Sexo</span>
                                  <select class="form-field d-flex align-items-center" type="" id="ddlSexoMascota" name="SexoMascota" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Sexo" required/>
                                    <option value="">--Seleccione--</option>
                                    <option value="M">Macho</option>
                                    <option value="H">Hembra</option>
                                  </select>
                                </div>
                              </div>
                              </div>

                              <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <span class="details" for="checkVacunas">Vacunas</span>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-10 col-sm-10 col-xs-10">
                                  <div class="form-check" id="dvCheckbox">

                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="input-box">
                                  <span class="details" for="txtInformacionVet">Información veterinaria</span>
                                  <textarea class="form-field d-flex align-items-center col-lg-12 col-md-12 col-sm-12 col-xs-12" rows="3" id="txtInformacionVet" name="InformacionVet" style="height: 50px; border-radius: 15px;"></textarea>
                                  </div>
                                </div>
                            </div>

                            <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="input-box">
                                  <span class="details" for="txtInformacionAdicional">Características adicionales</span>
                                  <textarea class="form-field d-flex align-items-center col-lg-12 col-md-12 col-sm-12 col-xs-12" id="txtInformacionAdicional" name="InformacionAdicional" style="height: 50px; border-radius: 15px;"></textarea>
                                </div>
                              </div>
                            </div>

                              </div>


                          </div>
                          </div>

                        <div class="modal-footer">
                          <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                              <button id="btnGuardar_valid" class="btn mt-1" style="font-size:1.2rem;" >Enviar</button>
                                <!--   <input type="submit" style="display:none;" value="Guardar" name="Guardar" class="btn btn-primary" id="btnGuardar_post"/> -->

                            </div>
                            <div class="col-sm-4"></div>
                          </div>
                        </div>

                      </div>

                  </div>
              </div>

            </div>


          </div>
        </div>
      </div>

  </div>

</div>


    <?php
        }
        else {
          echo "<h1>Usuario no válido o su sesión a vencido</h1>";
        }
    ?>

    <script src="JS/Forms/Admin.js"></script>

  </body>

</html>
