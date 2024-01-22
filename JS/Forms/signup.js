$(document).ready(function () {
  var url = window.location.href;
  var arra = url.split(':')
  var urlhost;

  if (url.search("localhost") == -1) {
     urlhost = 'https://' + window.location.host;
  }
  else {
     urlhost = 'http://' + window.location.host;
  }

  const host = urlhost;


  $( ".fechaClass" ).datepicker({
          showOn: "focus",
          buttonImageOnly: true,
          dateFormat: "dd/mm/yy",
          language: "es",
          changeMonth: true,
          changeYear: true,
          autoSize: true,
          maxDate: '-18y'

  });


$( "#btnGuardar_valid" ).click(function(){
    var pwd = $( "#txtPassword_reg" ).val();
    var pwdConfirm = $( "#txtPasswordConfirm_reg" ).val();
    var txtUsuario_reg = $( "#txtUsuario_reg" ).val();
    var txtEmail_reg = $( "#txtEmail_reg" ).val();

    var DvmsgError = $("#DvmsgError");
    DvmsgError.empty();
    if ((pwd != pwdConfirm)  && (pwd != "" && pwdConfirm != ""))
    {
      /*alertify.alert('Informativo', "Las contraseñas no coinciden", function () {
      });*/
      DvmsgError.append($("<p></p>").html("Las contraseñas no coinciden"));
    }else {
      DvmsgError.empty();
      if (txtUsuario_reg.length > 0 && txtEmail_reg.length > 0 )
      {
        $.ajax({
            contentType: "application/json; charset=utf-8",
            url: host + "/mascotaproject_V1.0/validUserYCorreo.php",
            data: {userName: txtUsuario_reg ,correo:txtEmail_reg},
            dataType: "json",
            success: function (data) {
                    var valido = data[0]['valido'];

                    if (valido=="No")
                    {
                    DvmsgError.append($("<p></p>").html("El usuario o el correo ya existen, intente nuevamente."));
                    }else {
                      DvmsgError.empty();
                      $( "#btnGuardar_post" ).click();
                    }

            },
            error: function ajaxError(result) {
                alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
            }
        });
      }
      else{
          DvmsgError.append($("<p></p>").html("Llene los campos requeridos."));
          /*alertify.alert('Informativo', "Usuario o Correo ya existentes", function () {
          });*/
      }


    }

});



});
