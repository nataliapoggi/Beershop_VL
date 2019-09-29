function validate(elem) {
  
    var form = document.getElementById(elem);
    var error= document.getElementById("errorConfirmation_numb");

    if  (form.value ==null || !Number.isInteger(+form.value) || +form.value < 1)
              {
                form.style.borderColor= "tomato";
                error.style.display= "block";
                event.preventDefault(); 
              }
    else      {
                form.style.borderColor= "#d2d7d3";
                error.style.display= "none";
                return true;
              }
};

window.onload = function(){
  document.getElementById("contactForm").addEventListener("submit", function(e){
    if (!validate("confirmation_numb")){ e.preventDefault();} });    
  };

     