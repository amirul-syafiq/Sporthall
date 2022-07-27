<php  ?>

<!DOCTYPE html>
<html>

    <head>
    <link rel="stylesheet" href="css/main.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

        <?php include 'template/head.php'; ?>
    </head>

    <body>
        
    <nav class="nav">
    <div class="container-fluid">
        <div class="logo">
           <img src="images\LOGO-UTM.png" height="42" alt="">

            <a href="" class="logolink">Sport Hall Booking System</a>
        </div>
        <div id="mainListDiv" class="main_list">
            <ul class="navlinks">
                <?php
                session_start();
                if (isset($_SESSION['role'])) {
                
                if ($_SESSION['role'] == 'customer' ) {
                    // echo '<li><a href='"+request.getContextPath()+"/Profile' class='navlink'>Profile</a></li>'
                     echo "<li><a href='' class='navlink'>Profile</a></li>";
                }            
                } ?>
               
                <!-- <li><a href="<%= request.getContextPath() %>/View/BookNow.jsp" class="navlink">Book now</a></li>
                <li><a href="<%= request.getContextPath() %>/ViewEvent" class="navlink">Event</a></li> -->
                <li><a href="src/pricing.php" class="navlink">Book now</a></li>
                <li><a href="" class="navlink">Event</a></li>
                <?php 

                    if(isset($_SESSION['username'])){
                        if($_SESSION['role'] == 'ADMIN'){
                            header("Location: src/admin.php");
                        }
                        // echo '<li><a href='"+request.getContextPath()+"/Logout' class='navlink'>Log Out</a></li>';
                        echo "<li><a href='src/logout.php' class='navlink'>Log Out</a></li>";
                    }

                    // if (isset($_GET['logout'])) {
                    //    session_destroy();
                    //   }
                ?>
                
              
            </ul>
        </div>
    </div>
</nav>
        <div class="container indexContainer d-flex justify-content-between pd-12">
            <div class="indexImage">
                <img src="images/Main image 3.png" alt="image" width="450">

            </div>
            <div class="indexContent">
                <div>
                    <div class="title">
                        <h3 class="indexTitle">
                            Stay Healthy,<br>
                            Stay Organized
                        </h3>
                    </div>
                    <div class="subtitle">
                        <p class="indexSubtitle">
                            Enjoy the experience of world class<br>
                            sport facilities
                        </p>
                    </div>
                    <div>
                        <?php 
                        

                            if(isset($_SESSION['username'])){
                                echo '<a href="src/booking.php" class="indexBtn">Book Now</a>';
                            }else{
                                echo '<a href="src/login.php" class="indexBtn">Book Now</a>';
                            }
                        ?>
                       
                    </div>
                </div>
            </div>
        </div>
        <?php include 'template/footer.html'; ?>

    </body>

    <script>
    $(window).scroll(function () {
        if ($(document).scrollTop() > 20) {
            $('.nav').addClass('affix');
            console.log("OK");
        } else {
            $('.nav').removeClass('affix');
        }
    });
    
    $( document ).ready(function() {
        
        //update daily date for hall
            var now = new Date();
            var day = now.getDate();
            var month = now.getMonth() + 1;
            var year = now.getFullYear();
            var date = day+"-"+month+"-"+year;
            
            $.ajax({
                type: "PUT",
                url: "http://localhost/Sporthall/api/hall/"+ date,
                async: true,
                dataType: "json",
                success: function (result, status, xhr) { 
                    console.log("Hall date updated.");
                },
                error: function (xhr, status, error) { 
                    alert('error' + xhr + ", " + status + "," + error);
                }
            });
        });
</script>

</html>