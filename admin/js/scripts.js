<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
/*tinymce.init({selector:'textarea'});
$(document).ready(function(){
  
  $('#selectAllBoxes').click(function(event){
    if(this.checked) {
    
  $('.checkBoxes').each(function(){
    this.checked=true;
    
    
  });
    
  } else{
     $('.checkBoxes').each(function(){
    this.checked=false;
    
    
  });
  }                     
 });
});*/
/*
$(document).ready(function() {
  $('#selectAllBoxes').click(function() {
    $('input[type="checkbox"]').prop('checked', this.checked);
  })
});*/

function loadUsersOnline(){
  $.get("function.php?onLineusers=result",function(data){
    
    $("usersonline").text(data);
    
  });
}
setInterval(function(){
  loadUsersOnline();
  
},500);


