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

/*$('#btnGuardar_valid').click(function(){
  if (ValidarCampos())
  {
    var vacunas = "";
    $("input:checkbox[name=VacunasCheck]:checked").each(function(){
      vacunas = vacunas +  $(this).val() + "|";
    });
  $('#HDvc').val(vacunas);
  $('#btnGuardar_post').click();
  }
});*/

/*function ValidarCampos(){
  return true;
}*/

/*  $( ".fechaClass" ).datepicker({
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
          maxDate: '0'

  });  */

/*  $('#ddlSexoMascota').val($('#HDx').val());
  if ($('#HDEst').val() == 1)
  {
    $("#Esterilizado_si").prop("checked", true);
  }
  else {
      $("#Esterilizado_no").prop("checked", true);
  }*/


/*  var ddlTipoMascota = $('#ddlTipoMascota');
  $.ajax({
      contentType: "application/json; charset=utf-8",
      url: host + "/mascotaproject/ddlTipoMascota.php",
      data: {accion:"ddlTipoMascota"},
      dataType: "json",
      success: function (data) {
          ddlTipoMascota.empty();
          ddlTipoMascota.append("<option value=''>-Seleccione-</option>");
          var len = data.length;
          for( var i = 0; i<len; i++){
            var id = data[i]['id'];
            var descripcion = data[i]['descripcion'];
            ddlTipoMascota.append($("<option></option>").val(id).html(descripcion));
          }
          ddlTipoMascota.val($('#HDtm').val());
          ddlTipoMascota.change();
      },
      error: function ajaxError(result) {
          alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
      }
  });*/

/*  ddlTipoMascota.change(function(){
    var idTipo = $(this).val();
    var ddl = $('#ddlRazaMascota');

    if (idTipo != null && idTipo!= "" && idTipo!= undefined)
    {
      $.ajax({
          contentType: "application/json; charset=utf-8",
          url: host + "/mascotaproject/ddlRazas.php",
          data: {accion:"ddlRaza" ,TipoMascota:idTipo},
          dataType: "json",
          success: function (data) {
              ddl.empty();
              ddl.append("<option value=''>-Seleccione-</option>");
              var len = data.length;
              for( var i = 0; i<len; i++){
                var id = data[i]['id'];
                var descripcion = data[i]['descripcion'];
                ddl.append($("<option></option>").val(id).html(descripcion));
              }
              ddl.val($('#HDrz').val());
              ListarVacunas(idTipo);
          },
          error: function ajaxError(result) {
              alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
          }
      });
    }

  });*/

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

  ListarVacunas($('#HDtm').val());

  function ListarVacunas(idTipo)
  {
    if (idTipo != null && idTipo!= "" && idTipo!= undefined)
    {
      var dv = $('#dvCheckbox');
      var idMascota  = $('#HDm').val();
      $.ajax({
          contentType: "application/json; charset=utf-8",
          url: host + "/mascotaproject_V1.0/ddlVacunas.php",
          data: {accion:"ddlVacunaMasc" ,TipoMascota:idMascota},
          dataType: "json",
          success: function (data) {
              dv.empty();
              var len = data.length;

              for( var i = 0; i<len; i++){
                var id = data[i]['id'];
                var descripcion = data[i]['descripcion'];
                var check = false;
                if (data[i]['IScheck'] == 1)
                {
                  check = true;
                }

                dv.append($(document.createElement('label')).prop({
                    for: 'dvCheckbox'
                }).html(descripcion));

                /*dv.append(
                    $(document.createElement('input')).prop({
               id: 'myCheckBox'+i,
               name: 'VacunasCheck',
               value: id,
               type: 'checkbox'

             })).append(
                  $(document.createElement('label')).prop({
                      for: 'myCheckBox'
                  }).html(descripcion)

                ).append(document.createElement('br'));
                 $('#myCheckBox'+i).prop("checked",check);*/
              }
          },
          error: function ajaxError(result) {
              alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
          }
      });
    }
  }


});
