
function validate(elem) {
  console.log(elem);
    var form = document.getElementById(elem);
    console.log(form.cant.value);
    var error= document.getElementById("errorCant");
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