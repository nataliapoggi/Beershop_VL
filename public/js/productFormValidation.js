

function validate(elem) {
          var OK= true; 
          var inputVar = document.getElementsByName(elem);
    
          switch (elem) {                  
                case 'name':
                    var error= document.getElementById("errorName");
                    if (inputVar[0].value.length < 6 || inputVar[0].value.length > 30)
                    {
                      inputVar[0].style.borderColor= "tomato";
                      error.style.display= "block";
                      OK= false;
                    }
                    else{
                      inputVar[0].style.borderColor= "#d2d7d3";
                      error.style.display= "none";
                      OK= true;
                    }
                    break;
                case 'size':
                    var error= document.getElementById("errorSize");
                    if (inputVar[0].value ==null || !Number.isInteger(+inputVar[0].value) || inputVar[0].value < 1)
                    {
                      inputVar[0].style.borderColor= "tomato";
                      error.style.display= "block";
                      OK= false;
                    }
                    else{
                      inputVar[0].style.borderColor= "#d2d7d3";
                      error.style.display= "none";
                      OK= true;
                    }
                    break;
                case 'price':
                    var error= document.getElementById("errorPrice");
                    if (inputVar[0].value ==null || !(typeof(+inputVar[0].value)==="number") || inputVar[0].value < 0.1 || inputVar[0].value >10000)
                    {
                      inputVar[0].style.borderColor= "tomato";
                      error.style.display= "block";
                      OK= false;
                    }
                    else{
                      inputVar[0].style.borderColor= "#d2d7d3";
                      error.style.display= "none";
                      OK= true;
                    }
                    break;
                case 'img':
                    var error= document.getElementById("errorImg");
                    if (inputVar[0].value ==null )
                    {
                      inputVar[0].style.borderColor= "tomato";
                      error.style.display= "block";
                      OK= false;
                    }
                    else{
                      inputVar[0].style.borderColor= "#d2d7d3";
                      error.style.display= "none";
                      OK= true;
                    }
                    break;
              }
              return OK;
        };

        function validoTodo() {
           return validate('name') && validate('size') && validate('price')&& validate('img');
        };

        window.onload = function(){
            document.getElementById("prodForm").addEventListener("submit", function(e){
              if (!validoTodo()){ e.preventDefault();} });    
            };