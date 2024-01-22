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

  $( "#txtFechaNacimientoMascota" ).datepicker({
          showOn: "focus",
          buttonImageOnly: true,
          dateFormat: "dd/mm/yy",
          language: "es",
          changeMonth: true,
          changeYear: true,
          autoSize: true,
          maxDate: '0'

  });

  function ValidarCampos(){
    return true;
  }

//window.location.host;

$('#ddlTipoMascota').change(function(){
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
            ListarVacunas(idTipo);
        },
        error: function ajaxError(result) {
            alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
        }
    });
  }

});

function ListarVacunas(idTipo)
{
  if (idTipo != null && idTipo!= "" && idTipo!= undefined)
  {
    var dv = $('#dvCheckbox');
    $.ajax({
        contentType: "application/json; charset=utf-8",
        url: host + "/mascotaproject_V1.0/ddlVacunas.php",
        data: {accion:"ddlVacuna" ,TipoMascota:idTipo},
        dataType: "json",
        success: function (data) {
            dv.empty();
            var len = data.length;

            for( var i = 0; i<len; i++){
              var id = data[i]['id'];
              var descripcion = data[i]['descripcion'];

              var divNuevo = $('<div>', {
                id: 'DivParaCheks'
            }).appendTo(dv);

              divNuevo.append(
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

              divNuevo.addClass('col-lg-3 col-md-3 col-sm-12 col-xs-12');
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
}


});
