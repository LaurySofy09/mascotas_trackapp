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
      <link href="https://fonts.cdnfonts.com/css/austie-bost-kitten-klub" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Template Stylesheet -->
    <!--<link href="css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="style/css/login.css">
</head>

<body style="background: linear-gradient(135deg, #71b7e6, #9b59b6); background-repeat: no-repeat; background-size: 4000px 4000px;">

  <?php
    session_start();
    if (isset($_SESSION['NuevaMascota'])) {
      $_SESSION['NuevaMascota']= null;
    }

    if (isset($_SESSION['IdUsuario'])) {
      $_SESSION['IdUsuario']= null;
    }

    if (isset($_SESSION['form'])) {
        $_SESSION['form']= null;
    }

  ?>

                      <div class="wrapper" style="box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #cbced1;">
                        <div class="logo">
                            <img src="img/3500_2_13.jpg" alt="">
                        </div>
                        <div class="text-center mt-4 name" style="font-size:1.5rem">
                            MascotasTrackApp
                        </div>
                        <form class="p-3 mt-3" action="validLogin.php">
                            <div class="form-field d-flex p-1 align-items-center">
                                <span class="far fa-user"></span>
                                <input type="text" name="userName" id="userName" placeholder="Usuario" required/>
                            </div>
                            <div class="form-field d-flex p-1 align-items-center">
                                <span class="fas fa-key"></span>
                                <input type="password" name="password" id="pwd" placeholder="Contraseña" required/>
                            </div>
                            <div style="font-size:1rem; text-align: center; color:#cc0000;">
                              <?php
                                if (isset($_SESSION['IdLogin'])) {
                                  if ($_SESSION['IdLogin'] == 1) { echo "<p>Datos incorrectos</p>"; }
                                  else { echo "<p> </p>"; }}
                                  else{
                                     echo "<p> </p>";
                                  }
                              ?>
                            </div>
                            <div class="row">
                              <div class="col-sm-4"></div>
                              <div class="col-sm-4">
                                <button class="btn mt-1" style="font-size:1.2rem">Entrar</button>
                              </div>
                            <div class="col-sm-4"></div>
                          </div>
                        </form>
                        <div class="text-center fs-6">
                            <a href="recuperar.php">Olvidó la contraseña?</a> o <a href="signup.php">Registrarse</a>
                        </div>
                    </div>
    <!-- Back to Top -->
</body>
</html>
