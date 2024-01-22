$(document).ready(function () {

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

    if ((pwd != pwdConfirm)  && (pwd != "" && pwdConfirm != "")) 
    {
      alertify.alert('Informativo', "Las contraseñas no coinciden", function () {
      });
    }else {
      $( "#btnGuardar_post" ).click();
    }

});



});
