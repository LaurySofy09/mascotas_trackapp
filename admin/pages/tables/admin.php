<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mascota Tracking Admin</title>

  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <link rel="stylesheet" href="JS/jquery-ui/jquery-ui.css">
  <link rel="stylesheet" href="JS/jquery-ui/jquery-ui.structure.css">
  <link rel="stylesheet" href="JS/jquery-ui/jquery-ui.theme.css">
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">


  <script src="JS/Jquery/jquery-3.6.3.js"></script>
  <script src="JS/Jquery/jquery-3.6.3.slim.js"></script>
  <script src="JS/jquery-ui/external/jquery/jquery.js"></script>
  <script src="JS/jquery-ui/jquery-ui.js"></script>


<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .letra { font-family: Calibri!important; font-size: 20px!important; }

    /* Estilo para el modal */
    .modal {
      display: none; /* Por defecto, el modal está oculto */
      position: fixed; /* Permite que el modal aparezca por encima del contenido principal de la página */
      z-index: 1; /* Coloca el modal en la parte superior de la pila de elementos */
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto; /* Permite hacer scroll dentro del modal si es necesario */
      background-color: rgba(0,0,0,0.4); /* Fondo oscuro semitransparente */
    }

    /* Estilo para el contenido del modal */
    .modal-content {
      background-color: #fefefe;
      margin: 5% auto; /* Centra el modal verticalmente */
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      height: 130%;
    }

    /* Estilo para el botón "X" */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    @media screen and (max-width: 600px) {
    .modal-content {
      margin: 30% auto;
      width: 90%;
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
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="../../index.html"><img src="../../images/LogoCatDogBanner.jpg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../images/LogoCatDog.jpg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
            </a>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Cerrar sesión
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">

            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

      <div class="main-panel">
        <div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <h4 class="card-title">Panel de Administrador de Usuarios</h4>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <button id="btnNuevoUsuario" class="btn btn-primary" style="font-size:1.2rem;" >Nuevo Usuario</button>
                    </div>
                  </div>
                  <p class="card-description">
                    <!--Add class <code>.table-hover</code>-->
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover dtUser">
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
                          <td class=''> <center> <a style='color: #FFFFFF;' id='btnDel' class='btn btn-danger btnDelete'> <i class='fa fa-eraser'></i></a> </center> </td>
                          <td class=''> <center> <a style='color: #FFFFFF;' id='btnEdit' class='btn btn-primary btnEdit'> <i class='fa fa-pen'></i></a> </center> </td>
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
                          <td> <?= $row['DescEstado'] ?></td>
                          </tr>
                        <?php endforeach ?>
                        <!--<tr>
                          <td>1</td>
                          <td class="py-1">
                            <img src="../../images/faces/face1.jpg" alt="image"/>
                          </td>
                          <td>Jacob</td>
                          <td>Photoshop</td>
                          <td class="text-danger"> 28.76% <i class="ti-arrow-down"></i></td>
                          <td><label class="badge badge-danger">Pending</label></td>
                        </tr>
                        -->
                      </tbody>
                    </table>

                    <!-- El modal -->
                    <div id="myModal" class="modal">
                      <div class="modal-content">
                        <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
                        <div class="card">

                          <input id="HDusAdmin" type="hidden" name="HDusAdmin" value="<?php echo $userAdmin; ?>">
                          <input id="HDvc" type="hidden" name="HDvc">

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
                                  <input class="form-field d-flex align-items-center" id="txtFechaNacimiento" name="FechaNacimiento" type="text" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Fecha de Nacimiento" required/>
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
                                  <input class="form-field d-flex align-items-center" id="txtTelefono2" name="Telefono2" type="text" style="border-radius: 15px; height: 45px; width: 300px; padding-left: 35px;" placeholder="Telefono2" required/>
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
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <?php
      }
      else {
        echo "<h1>Usuario no válido o su sesión a vencido</h1>";
      }
  ?>


  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <script src="../../js/Datatable/datatables.min.js"></script>
  <script src="../../js/Admin.js"></script>

  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
