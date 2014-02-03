$(document).ready(function(){
  var par = $('.closedp');
  $(par).hide();
	
  $(".titleq").click(function(){
    $(this).next("p").toggle("slow");
  });
}); 