function validate(elem) {
          var OK= true; 
          var inputVar = document.getElementsByName(elem);
      
          function validateEmail(email) {

             var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
          };
      
          switch (elem) {                  
                case 'name':
                    var error= document.getElementById("errorName");
                    if (inputVar[0].value.length < 2 || inputVar[0].value.length > 255)
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
                case 'lname':
                    var error= document.getElementById("errorLname");
                    if (inputVar[0].value.length < 2 || inputVar[0].value.length > 255)
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
                case 'email':
                  var error= document.getElementById("errorEmail");  
                  if (!validateEmail( inputVar[0].value))
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
                case 'comment':
                    var error= document.getElementById("errorComment");
                    if (inputVar[0].value.length < 2 || inputVar[0].value.length > 1000)
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
           return validate('name') && validate('lname') && validate('email')&& validate('comment');
        };

        window.onload = function(){
            document.getElementById("contactForm").addEventListener("submit", function(e){
              if (!validoTodo()){ e.preventDefault();} });    
            };
            