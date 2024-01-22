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


var ddlRolUsuario = $('#ddlRolUsuario');
$.ajax({
    contentType: "application/json; charset=utf-8",
    url: host + "/mascotaproject_V1.0/admin/pages/tables/ddlRoles.php",
    data: {accion:"ddlRoles"},
    dataType: "json",
    success: function (data) {
        ddlRolUsuario.empty();
        ddlRolUsuario.append("<option value=''>-Seleccione-</option>");
        var len = data.length;
        for( var i = 0; i<len; i++){
          var id = data[i]['id'];
          var descripcion = data[i]['descripcion'];
          ddlRolUsuario.append($("<option></option>").val(id).html(descripcion));
        }
        //ddlRolUsuario.val($('#HDtm').val());
        //ddlRolUsuario.change();
    },
    error: function ajaxError(result) {
        alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
    }
});

ddlRolUsuario.change(function(){
   var rol = $(this).val();
   var dvDataMascota = $('#dvDataMascota');
   if (rol == 2)
   {
     dvDataMascota.removeClass("d-none");
   }
   else {
     dvDataMascota.addClass("d-none");
   }
});

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
        //ddlTipoMascota.val($('#HDtm').val());
        //ddlTipoMascota.change();
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
               //ddl.val($('#HDrz').val());
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
     //var idMascota  = $('#HDm').val();
     $.ajax({
         contentType: "application/json; charset=utf-8",
         url: host + "/mascotaproject_V1.0/ddlVacunas.php",
         data: {accion:"ddlVacunaMasc" ,TipoMascota:idTipo},
         dataType: "json",
         success: function (data) {
             dv.empty();
             var len = data.length;

             for( var i = 0; i<len; i++){
               var id = data[i]['id'];
               var descripcion = data[i]['descripcion'];
               var check = false;
               /*if (data[i]['IScheck'] == 1)
               {
                 check = true;
               }*/

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
         },
         error: function ajaxError(result) {
             alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
         }
     });
   }
 }


 $('#btnNuevoUsuario').click(function(){
   txtrolUsuario = $('#txtrolUsuario');
   txtrolUsuario.addClass("d-none");
   ddlRolUsuario = $('#ddlRolUsuario');
   ddlRolUsuario.removeClass("d-none");
 });

$('.btnDelete').click(function(){
  //document.getElementById('myModal').style.display='block'
});

$('.btnEdit').click(function(){

});


$('#btnNuevoUsuario').click(function(){
  $('#HDuserSelect').val("");
  var dvEstado = $('#dvEstado');
  dvEstado.addClass("d-none");
  $('#ddlEstado').val(1);
});

$('#btnGuardar_valid').click(function(){

    var idUserSelect = $('#HDuserSelect').val();

      var nombreUsuario = $('#txtNombre').val();
      var cedula = $('#txtCedula').val();
      var email = $('#txtEmail').val();
      var telefono = $('#txtTelefono').val();
      var telefono2 = $('#txtTelefono2').val();
      var FechaNacimiento = $('#txtFechaNacimiento').val();
      var Direccion = $('#txtDireccion').val();
      var RolUsuario = $('#ddlRolUsuario').val();
      var usAdmin = $('#HDusAdmin').val();
      var Usuario = $('#txtUsuario').val();
      var NombreMascota = $('#txtNombreMascota').val();
      var EdadMascota = $('#txtEdadMascota').val();
      var TipoMascota = $('#ddlTipoMascota').val();
      var RazaMascota = $('#ddlRazaMascota').val();
      var FechaNacimientoMascota = $('#txtFechaNacimientoMascota').val();
      var PesoMascota = $('#txtPesoMascota').val();
      var Esterilizado;
      var isChecked = $('#Esterilizado_si').prop('checked');
      if (isChecked)
      {
        Esterilizado = 1;
      }
      else {
        Esterilizado = 0;
      }

      var InformacionVet = $('#txtInformacionVet').val();
      var InformacionAdicional = $('#txtInformacionAdicional').val();
      var SexoMascota = $('#ddlSexoMascota').val();

      var vacunas = "";
      $("input:checkbox[name=VacunasCheck]:checked").each(function(){
        vacunas = vacunas +  $(this).val() + "|";
      });
      $('#HDvc').val(vacunas);

      var allVacunas = $('#HDvc').val();
      var idMascota = $('#HDmasc').val();

      if (idUserSelect == ""){

        $.ajax({
          contentType: "application/json; charset=utf-8",
          url: host + "/mascotaproject_V1.0/registroUser.php",
          cache: false,
          data: {accion:"AdminNewUser", Nombre: nombreUsuario, Cedula:cedula, Email:email, Telefono:telefono, Telefono2:telefono2,
                FechaNacimiento:FechaNacimiento, txtDireccion:Direccion, RolUsuario:RolUsuario, HDusAdmin: usAdmin,
                txtUsuario:Usuario, NombreMascota: NombreMascota, EdadMascota: EdadMascota, TipoMascota:TipoMascota,
                RazaMascota:RazaMascota, FechaNacimientoMascota:FechaNacimientoMascota, PesoMascota:PesoMascota,
                radEsterilizado:Esterilizado, InformacionVet:InformacionVet, InformacionAdicional:InformacionAdicional,
                SexoMascota:SexoMascota, HDvc:allVacunas},
          dataType: "json",
          success: function (data) {
            if (data[0]['valid'] == "ok")
            {
             window.location.href = "loading.php";
          }
        },
          error: function ajaxError(result) {
              alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
          }

        });

      }
      else {

        $.ajax({
          contentType: "application/json; charset=utf-8",
          url: host + "/mascotaproject_V1.0/editUserAdmin.php",
          cache: false,
          data: {accion:"EditUser",  IdUsuario:idUserSelect, Nombre: nombreUsuario, Cedula:cedula, Email:email, Telefono:telefono, Telefono2:telefono2,
                FechaNacimiento:FechaNacimiento, txtDireccion:Direccion, HDusAdmin: usAdmin,
                txtUsuario:Usuario, NombreMascota: NombreMascota, EdadMascota: EdadMascota, TipoMascota:TipoMascota,
                RazaMascota:RazaMascota, FechaNacimientoMascota:FechaNacimientoMascota, PesoMascota:PesoMascota,
                radEsterilizado:Esterilizado, SexoMascota:SexoMascota,  InformacionVet:InformacionVet, InformacionAdicional:InformacionAdicional,
                HDvc:allVacunas, idMascota:idMascota, RolUsuario:RolUsuario},
          dataType: "json",
          success: function (data) {
            if (data[0]['valid'] == "ok")
            {
             window.location.href = "loading.php";
          }
        },
          error: function ajaxError(result) {
              alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
          }

        });


      }




});


$('#tblUsers').DataTable({
        language: {
          url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        }
      });

$('#btnCierreSession').click(function(){

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

  $.ajax({
    contentType: "application/json; charset=utf-8",
    url: host + "/mascotaproject_V1.0/cierreSession.php",
    cache: false,
    data: {accion:"cierre"},
    dataType: "json",
    success: function (data) {
      if (data[0]['valid'] == "ok")
      {
       window.location.href = "loading.php";
    }
  },
    error: function ajaxError(result) {
        alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
    }

  });

});

});


function AbrirModalEdit(id)
{
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

  var dvEstado = $('#dvEstado');
  dvEstado.removeClass("d-none");
  $('#ddlEstado').val(1);
   dvDataMascota = $('#dvDataMascota');
   txtrolUsuario = $('#txtrolUsuario');
   txtrolUsuario.removeClass("d-none");
   ddlRolUsuario = $('#ddlRolUsuario');
   ddlRolUsuario.addClass("d-none");

  $.ajax({
    contentType: "application/json; charset=utf-8",
    url: host + "/mascotaproject_V1.0/ConsultarEditUsario.php",
    cache: false,
    data: {accion:"consultaUser", IdUsuario: id},
    dataType: "json",
    success: function (data) {
      if (data[0]['IdUsuario'] > 0)
      {
        $('#HDuserSelect').val(data[0]['IdUsuario']);
        $('#ddlRolUsuario').val(data[0]['Rol']);
        $('#txtrolUsuario').val(data[0]['descRol']);
        $('#ddlEstado').val(data[0]['Estado']);
        $('#txtUsuario').val(data[0]['UserName']);
        $('#txtNombre').val(data[0]['Nombre']);
        $('#txtFechaNacimiento').val(data[0]['FechaNacimiento']);
        $('#txtCedula').val(data[0]['Cedula']);
        $('#txtTelefono').val(data[0]['Telefono']);
        $('#txtTelefono2').val(data[0]['Telefono2']);
        $('#txtEmail').val(data[0]['Email']);
        $('#txtDireccion').val(data[0]['Direccion']);

        if (data[0]['Rol'] == 2)
        {
          dvDataMascota.removeClass("d-none");
          $('#HDmasc').val(data[0]['IdMascota']);
          $('#txtNombreMascota').val(data[0]['NombreMasc']);
          $('#txtEdadMascota').val(data[0]['Edad']);
          $('#ddlTipoMascota').val(data[0]['IdTipoMascota']);
          var raza = data[0]['IdRaza'];
          var ddlR = $('#ddlRazaMascota');
          $.ajax({
              contentType: "application/json; charset=utf-8",
              url: host + "/mascotaproject_V1.0/ddlRazas.php",
              data: {accion:"ddlRaza" ,TipoMascota: data[0]['IdTipoMascota']},
              dataType: "json",
              success: function (data) {
                  ddlR.empty();
                  ddlR.append("<option value=''>-Seleccione-</option>");
                  var len = data.length;
                  for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var descripcion = data[i]['descripcion'];
                    ddlR.append($("<option></option>").val(id).html(descripcion));
                  }
                  ddlR.val(raza);
              },
              error: function ajaxError(result) {
                  alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
              }
          });
          $('#txtFechaNacimientoMascota').val(data[0]['FechaNacimientoMasc']);
          $('#txtPesoMascota').val(data[0]['Peso']);
          $('#ddlSexoMascota').val(data[0]['Sexo']);
          $('#txtInformacionVet').val(data[0]['InfoVeterinaria']);
          $('#txtInformacionAdicional').val(data[0]['DescripcionExtra']);
         if (data[0]['Esterilizado'] == 1)
         {
           $('#Esterilizado_si').prop('checked', true);
         }
         else {
           $('#Esterilizado_no').prop('checked', true);
         }
          ListarVacunas_edit(data[0]['IdTipoMascota'], data[0]['IdMascota']);
        }
        else {
          dvDataMascota.addClass("d-none");
        }

      }
  },
    error: function ajaxError(result) {
        alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
    }

  });

}

function ListarVacunas_edit(idTipo, idMascota)
{
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

  if (idTipo != null && idTipo!= "" && idTipo!= undefined)
  {
    var dv = $('#dvCheckbox');
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
        },
        error: function ajaxError(result) {
            alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
        }
    });
  }
}

function confirmDeleteRegistro(id){

  alertify.confirm("¿Deseas eliminar este registro?", function() {
     // Si se hace clic en el botón "Sí"
     DeleteRegistro(id);
   }, function() {
     // Si se hace clic en el botón "No"
     //alertify.error('¡Cancelado!');
   }).set('labels', {ok:'Sí', cancel:'No'});

}


function DeleteRegistro(id){

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

  $.ajax({
    contentType: "application/json; charset=utf-8",
    url: host + "/mascotaproject_V1.0/deleteUserAdmin.php",
    cache: false,
    data: {accion:"delUser",  IdUsuario:id},
    dataType: "json",
    success: function (data) {
      if (data[0]['valid'] == "ok")
      {
       window.location.href = "loading.php";
    }
  },
    error: function ajaxError(result) {
        alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
    }

  });

}
