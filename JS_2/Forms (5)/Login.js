$(document).ready(function () {


$('#btnRegistrarse').click(function(){

  $('#dvRegistrarse').removeClass('Dsp_no');
  $('#dvLogin').addClass('Dsp_no');

});


$('#btnRegresarLogin').click(function(){

  $('#dvRegistrarse').addClass('Dsp_no');
  $('#dvLogin').removeClass('Dsp_no');

});

$('#btnGuardar_valid').click(function(){

$('#btnGuardar_post').click();

});

$( ".fechaClass" ).datepicker({
        showOn: "focus",
        buttonImageOnly: true,
        buttonImage: "../assets/imgs/logos/logo_contraloria.png",
        buttonText: "Calendario",
        dateFormat: "dd/mm/yy",
        dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Dicimbre"],
        monthNamesShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        changeMonth: true,
        changeYear: true,
        autoSize: true,
        maxDate: '-18y'

});

});

var qrcode = new QRCode("qrcode");

function makeCode () {
  var elText = document.getElementById("text");

  if (!elText.value) {
    alert("Input a text");
    elText.focus();
    return;
  }

  qrcode.makeCode(elText.value);
}

makeCode();

$("#text").
  on("blur", function () {
    makeCode();
  }).
  on("keydown", function (e) {
    if (e.keyCode == 13) {
      makeCode();
    }
  });
