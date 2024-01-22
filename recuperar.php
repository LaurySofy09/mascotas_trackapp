<!DOCTYPE html>
<html lang="en">
<!-- App programada por Laura Sofía Domínguez y Tomás Calderón-->
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
    <link rel="stylesheet" href="style/css/login.css">

</head>

<body style="background: linear-gradient(135deg, #71b7e6, #9b59b6); background-repeat: no-repeat; background-size: 4000px 4000px;">

<?php
  $flag_mensaje = 0
?>
                      <div class="wrapper" style="box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #cbced1; min-height:300px;">

                        <div class="text-left mt-4 name" style="font-size:2rem; text-align: center; color:#000000;">
                            Recuperar contraseña
                        </div>
                        <form class="p-3 mt-3" action="<?php echo "EnvioCorreo.php"; ?>">
                            <span class="details" style="font-size:1.2rem">Email</span>
                            <div class="form-field d-flex p-1 align-items-center">
                                <span class="fa fa-envelope"></span>
                                <input type="text" name="Email_rec" id="txtEmail_rec" required placeholder="Inserte email"/>
                            </div>
                            <div class="row">
                              <div class="col-sm-4"></div>
                              <div class="col-sm-4">
                                <button class="btn mt-1" style="font-size:1.2rem">Enviar</button>
                              </div>
                            <div class="col-sm-4"></div>
                          </div>
                          <div style="font-size:1rem; text-align: center; color:#cc0000;">
                            <?php
                              if (isset($_GET["vu"])) {
                              if (($_GET["vu"]) == 1) { echo "<p>Mensaje enviado correctamente</p>"; }
                              elseif (($_GET["vu"]) == 2) { echo "<p>No se pudo enviar el correo, intente mas tarde</p>"; }
                              elseif (($_GET["vu"]) == 3) { echo "<p>Correo incorrecto</p>"; }}
                            ?>
                          </div>
                        </form>
                        <div class="text-left fs-6">
                            <br>
                            <a href="Login.html" style="font-size: 1rem; "> << Volver</a>
                        </div>
                    </div>
    <!-- Back to Top -->
</body>
</html>
