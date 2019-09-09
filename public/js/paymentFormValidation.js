

function validate(elem) {
          
          var OK= true; 
          var inputVar = document.getElementsByName(elem);
          console.log(inputVar[0].value);
          switch (elem) {                  
              case 'address':
                var error= document.getElementById("errorAddress");
                if ( inputVar[0].value.length ==0)
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
                case 'phone':
                var error= document.getElementById("errorPhone");  
                if (inputVar[0].value.length < 8 || !Number.isInteger(+inputVar[0].value) )
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
                case 'cardname':
                var error= document.getElementById("errorCardname");  
                if (inputVar[0].value.length < 4 )
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
                case 'cardnumber':
                var error= document.getElementById("errorCcnum");  
                if (inputVar[0].value.length < 12 || inputVar[0].value.length > 19 || !Number.isInteger(+inputVar[0].value) )
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
                case 'cvv':
                var error= document.getElementById("errorCvv");  
                if  (inputVar[0].value.length < 3 || inputVar[0].value.length > 4 || !Number.isInteger(+inputVar[0].value) )
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
           return validate('cvv') && validate('ccnum')&& validate('cardname')&& validate('phone') && validate('address');
        };

        window.onload = function(){
            document.getElementById("paymentForm").addEventListener("submit", function(e){
              if (!validoTodo()){ e.preventDefault();} });    
            };