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


$('.btnDelete').click(function(){
  document.getElementById('myModal').style.display='block'
});


$('.btnEdit').click(function(){
  document.getElementById('myModal').style.display='block'
});

});
