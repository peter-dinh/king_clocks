$(document).ready(function(){
 
 $('#mainChkBox').change(function(){
     $(':checkbox').prop('checked', this.checked);
   });
});
var blank="../no-image.png";
$(document).ready(function() {
  $("#x").click(function() {
    $("#preview").attr("src",blank);  
  });
});
