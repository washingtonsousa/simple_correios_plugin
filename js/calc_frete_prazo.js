$(document).ready( function() {



$('#Calc_frete').click ( function () {



if($("#CEP").val().length == 8) {

$.get($("input[name=url]").val()+'main-class.php', {

  dir: $("input[name=url]").val(),
  CEP : $("#CEP").val(),
  peso : $("input[name=peso]").val(),
  comp : $("input[name=comprimento]").val(),
  altura : $("input[name=altura]").val(),
  largura :  $("input[name=largura]").val(), 
  qty: $("input[name=quantity]").val(),

}).done(function(data) {

$("#FreteBox").html(data);

}).fail(function(data, status) {
    console.log( "error" );
    
  }).always(function() {
    console.log( "finished" );
  });

} else {

alert("Por favor, verifique seu CEP");

}

})
});