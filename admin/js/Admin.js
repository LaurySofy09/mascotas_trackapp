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


/*$( ".fechaClassMasc" ).datepicker({
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

 });*/


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


$('.btnDelete').click(function(){
  document.getElementById('myModal').style.display='block'
});

$('.btnEdit').click(function(){
  document.getElementById('myModal').style.display='block'
});

$('#btnNuevoUsuario').click(function(){
  document.getElementById('myModal').style.display='block'
});

$('#btnGuardar_valid').click(function(){

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
    if ($('#Esterilizado_si').checked())
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


    $.ajax({
      type: "POST",
      contentType: "application/json; charset=utf-8",
      url: host + "/mascotaproject_V1.0/admin/pages/tables/registroUser.php",
      cache: false,
      data: {accion:"AdminNewUser", Nombre: nombreUsuario, Cedula:cedula, Telefono:telefono, Telefono2:telefono2,
            FechaNacimiento:FechaNacimiento, txtDireccion:Direccion, RolUsuario:RolUsuario, HDusAdmin: usAdmin,
            txtUsuario:Usuario, NombreMascota: NombreMascota, EdadMascota: EdadMascota, TipoMascota:TipoMascota,
            RazaMascota:RazaMascota, FechaNacimientoMascota:FechaNacimientoMascota, PesoMascota:PesoMascota,
            radEsterilizado:Esterilizado, InformacionVet:InformacionVet, InformacionAdicional:InformacionAdicional,
            SexoMascota:SexoMascota, HDvc:allVacunas},
      dataType: "json",
      success: function (data) {


      },
      error: function ajaxError(result) {
          alert(result.status + ' : ' + result.statusText + ' : ' + result.responseText);
      }

    });


});

//$('.dtUser').DataTable();

});
