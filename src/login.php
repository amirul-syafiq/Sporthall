<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../template/head.php" ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    </head>
    <body>
        <?php include "../template/navigation.php" ?>
        <div class="container loginContainer d-flex justify-content-between pd-12">
            <div class="indexImage">
                <img src="../images/Main image 3.png" 
                     width="450"/>
            </div>
            <div class="login">
                <div class="login__content">
                    <div class="login__forms">
                        <form action="" class="login__registre" id="login-in"  >
                    

                            <div class="login__box">
                                <i class='bx bx-user login__icon'></i>
                                <input type="text" placeholder="Username" class="login__input" id="username" name="username">
                            </div>

                            <div class="login__box">
                                <i class='bx bx-lock-alt login__icon'></i>
                                <input type="password" placeholder="Password" class="login__input" id="password" name="password">
                            </div>

                            <a href="#" class="login__forgot">Forgot password?</a>

                            <button type="submit" class="login__button">Sign In</button>

                            <div>
                                <span class="login__account">Don't have an Account ?</span>
                                <span class="login__signin" id="sign-up"><a href="../src/register.php">Sign Up</a></span>
                            </div>
                        </form>

                        <!-- <form action="Register" class="login__create none" id="login-up" method="post">
                            <h1 class="login__title">Create Account</h1>
                           
                           
                           
                            <div class="login__box">
                                <i class='bx bx-user login__icon'></i>
                                <input type="text" placeholder="Username" name="username" class="login__input">
                            </div>

                            <div class="login__box">
                                <i class='bx bx-at login__icon'></i>
                              
                                <input type="email" placeholder="Email" name="email" class="login__input">

                              
                            </div>
                            <div class="login__box">
                                <i class='bx bx-lock-alt login__icon'></i>
                                
                                <input type="password" placeholder="Password" name="password" class="login__input">
                               
                            </div>

                            <button class="login__button">Sign Up</button>

                            <div>
                                <span class="login__account">Already have an Account ?</span>
                                <span class="login__signup" id="sign-in">Sign In</span>
                            </div>

                            <div class="login__social">
                                <a href="#" class="login__social-icon"><i class='bx bxl-facebook' ></i></a>
                                <a href="#" class="login__social-icon"><i class='bx bxl-twitter' ></i></a>
                                <a href="#" class="login__social-icon"><i class='bx bxl-google' ></i></a>
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>


        <?php include "../template/footer.html"; ?>

        
    </body>

    <script>
    
    
         $( document ).ready(function() {
            //sign in
          $("#login-in").submit(function(e){
            e.preventDefault();
            var username = $("#username").val();
            var password = $("#password").val();
          
            $.ajax({
                url: baseURL+"/api/login/"+username+"/"+password,
                type: "GET",
                dataType: "json",
                success: function(data,status,xhr){
                    if(data.length>0){
                       
                        window.location=baseURL;
                    }else{
                        alert(data);
                    }
                },
                error: function(xhr,status,error){
                    alert(error);
                }
            });
          });

    

        });
        
       
   

    </script>

                                    
    
</html>

