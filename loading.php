<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <!---<title> Responsive Registration Form | CodingLab </title>--->
  <link rel="stylesheet" href="style/css/signup.css">
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

   <meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
 <?php
    session_start();
    $form =0;
     if (isset($_SESSION['form'])) {
       $form =   $_SESSION['form'];
     }

     ?>
 <body>
   <div id="loader">
     <div class="row">
       <div class="col-md-6 col-sm-12 col-xs-12">
         <div class="profile-img">
           <img src="img/giphy.gif"></img>
           <input id="HDf" type="hidden" name="HDf" value="<?php echo $form;?>">
         </div>
         </div>
       </div>
   </div>

  <script>
  var form = $('#HDf').val();

  if (form == 1)
  {
    setTimeout(() => {  window.location.href = "registromascota.php"; }, 2500);
  }
  else {
    if (form == 2)
    {
      setTimeout(() => {  window.location.href = "pet.php"; }, 2500);
    }
    else {
      if (form==3){
        setTimeout(() => {  window.location.href = "editar.php"; }, 2500);
      }
      else {
        if (form==4){
          setTimeout(() => {  window.location.href = "Tabs.php"; }, 2500);
        }
        else {
          if (form==5)
          {
            setTimeout(() => {  window.location.href = "admin.php"; }, 2500);
          }
          else {
            if (form==6)
            {
              setTimeout(() => {  window.location.href = "login.html"; }, 2500);
            }
          }
        }
      }
    }
  }

   </script>

 </body>

</html>
