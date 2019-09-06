

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
                case 'password':
                  var error= document.getElementById("errorPassword");  
                  if (inputVar[0].value.length < 8 )
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
                case 'password_confirmation':
                    var passwd = document.getElementsByName('password');
                    var error= document.getElementById("errorPassword_confirmation");  
                    if (inputVar[0].value != passwd[0].value )
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
                case 'bdate':
                      var error= document.getElementById("errorBdate");
                      var TODAY = new Date(Date.now());
                      var EIGHTEEN_YEARS_BACK = new Date(new Date(TODAY).getDate() + "/" + new Date(TODAY).getMonth() + "/" + (new Date(TODAY).getFullYear() - 18));
                      var bdate = new Date(inputVar[0].value);
                                if (EIGHTEEN_YEARS_BACK < bdate )
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
           return validate('name') && validate('lname') && validate('email') && validate('password') && validate('password_confirmartion') && validate('bdate');
        };

        window.onload = function(){
            document.getElementById("registerForm").addEventListener("submit", function(e){
              if (!validoTodo()){ e.preventDefault();} });    
            };