
function validate(elem) {
  
    var form = document.getElementById(elem);
    
    var errorId= "error" + elem;
    var error= document.getElementById(errorId);
    if  (form.cant.value ==null || !Number.isInteger(+form.cant.value) || +form.cant.value < 1)
              {
                form.cant.style.borderColor= "tomato";
                error.style.display= "block";
                event.preventDefault(); 
              }
    else      {
                form.cant.style.borderColor= "#d2d7d3";
                error.style.display= "none";
              }
};