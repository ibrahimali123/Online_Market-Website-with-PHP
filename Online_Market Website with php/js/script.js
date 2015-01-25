$(document).ready(function(){  
    console.log( "ready!" );
    $('#cars').hide();  
    $('#homes').hide();
    $('#jops').hide();
    $('select').on('change', function() {
       //alert( this.value ); // or $(this).val() 
       if (this.value == 1) {
         $('#cars').show();
         $('#homes').hide();
         $('#jops').hide();
       };
       if (this.value == 2) {
         $('#cars').hide();
         $('#homes').show();
         $('#jops').hide();
       };
       if (this.value == 3) {
         $('#cars').hide();
         $('#homes').hide();
         $('#jops').show();
       };
       if (this.value == -1) {
       $('#cars').hide();  
       $('#homes').hide();
       $('#jops').hide();         
       };
     });

});

/*
function viewCategoryForm() {  
         //alert(document.forms["general"]["category"].value);
    if(document.forms["general"]["category"].value == "Car" ){
      document.getElementById("car").style.display="block";
      document.getElementById("home").style.display="none";
      document.getElementById("job").style.display="none";
    }
      
    else if(document.forms["general"]["category"].value  == "Home" ){
      document.getElementById("car").style.display="none";
      document.getElementById("home").style.display="block";
      document.getElementById("job").style.display="none";;
    }

    else if(document.forms["general"]["category"].value  == "Job Offer" ){
      document.getElementById("car").style.display="none";
      document.getElementById("home").style.display="none";
      document.getElementById("job").style.display="block"; 
    }
    
    if(document.forms["general"]["category"].value != "Select Category" )
      document.getElementById("add").disabled=false;
  }
 */