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


$('#btnGuardar_valid').click(function(){
  if (ValidarCampos())
  {
    var vacunas = "";
    $("input:checkbox[name=VacunasCheck]:checked").each(function(){
      vacunas = vacunas +  $(this).val() + "|";
    });
  $('#HDvc').val(vacunas);
  $('#btnGuardar_post').click();
  }
});

$('#btnActualizarMasocta_valid').click(function(){
  if (ValidarCampos())
  {
    var vacunas = "";
    $("input:checkbox[name=VacunasCheck]:checked").each(function(){
      vacunas = vacunas +  $(this).val() + "|";
    });
  $('#HDvc').val(vacunas);
  $('#btnGuardar_post').click();
  }
});

function ValidarCampos(){
  return true;
}

 $( ".fechaClassMasc" ).datepicker({
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

  });

    if ($('#HDEst').val() == 1)
    {
      $("#Esterilizado_si").prop("checked", true);
      if(document.getElementById("Esterilizado_si_usr"))
      {
        $("#Esterilizado_si_usr").prop("checked", true);
      }
    }
    else {
        $("#Esterilizado_no").prop("checked", true);
        if(document.getElementById("Esterilizado_no_usr"))
        {
          $("#Esterilizado_no_usr").prop("checked", true);
        }
    }

     var ddlTipoMascota = $('#ddlTipoMascota');
      $.ajax({
          contentType: "application/json; charset=utf-8",
          url: host + "/mascotaproject_V1.0/ddlTipoMascota.php",
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
      });


       ddlTipoMascota.change(function(){
          var idTipo = $(this).val();
          var ddl = $('#ddlRazaMascota');

          if (idTipo != null && idTipo!= "" && idTipo!= undefined)
          {
            $.ajax({
                contentType: "application/json; charset=utf-8",
                url: host + "/mascotaproject_V1.0/ddlRazas.php",
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
                    var dv = $('#dvCheckbox');
                    dv.empty();
                    var len = data.length;
                    var vacunas = "";
                    if (len > 0)
                    {
                      for( var i = 0; i<len; i++){
                        var id = data[i]['id'];
                        var descripcion = data[i]['descripcion'];
                        var check = false;
                        if (data[i]['IScheck'] == 1)
                        {
                          vacunas = vacunas +  data[i]['id'] + "|";
                          check = true;
                        }

                        dv.append(
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
                         $('#myCheckBox'+i).prop("checked",check);
                      }

                      if(document.getElementById("HDvc_usr"))
                      {
                        $("#HDvc_usr").val(vacunas);
                      }

                    }
                    else {
                      var dv = $('#dvCheckbox');
                      $.ajax({
                          contentType: "application/json; charset=utf-8",
                          url: host + "/mascotaproject_V1.0/ddlVacunas.php",
                          data: {accion:"ddlVacuna" ,TipoMascota:idTipo},
                          dataType: "json",
                          success: function (data) {
                              var dv = $('#dvCheckbox');
                              dv.empty();
                              var len = data.length;

                              for( var i = 0; i<len; i++){
                                var id = data[i]['id'];
                                var descripcion = data[i]['descripcion'];

                                var dv = $('<div>', {
                                  id: 'DivParaCheks'
                              }).appendTo(dv);

                                dv.append(
                                    $(document.createElement('input')).prop({
                               id: 'myCheckBox'+i,
                               name: 'VacunasCheck',
                               value: id,
                               type: 'checkbox'
                             })).append(
                                  $(document.createElement('label')).prop({
                                      for: 'myCheckBox'+i,
                                      id: 'mylblCheck'+i
                                  }).html(descripcion)

                                );

                                dv.addClass('col-lg-3 col-md-3 col-sm-12 col-xs-12');
                                $('#myCheckBox'+i).addClass('form-check-input');
                                $('#myCheckBox'+i).css("width", 20);
                                $('#myCheckBox'+i).css("height", 20);
                                $('#mylblCheck'+i).addClass('form-check-label');

                              }

                          },
                          error: function ajaxError(result) {
                              alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
                          }
                      });

                    }


                },
                error: function ajaxError(result) {
                    alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
                }
            });
          }
        }


});
