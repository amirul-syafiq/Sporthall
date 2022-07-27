<nav class="nav">
    <div class="container-fluid">
        <div class="logo">
           <img src="../images\LOGO-UTM.png" height="42" alt="">

            <a href="" class="logolink">Sport Hall Booking System</a>
        </div>
        <div id="mainListDiv" class="main_list">
            <ul class="navlinks">
                <?php
                session_start();
                if (isset($_SESSION['role'])) {
                
                if ($_SESSION['role'] == 'customer' ) {
                     echo "<li><a href='' class='navlink'>Profile</a></li>";
                }            
                } ?>
               
               
                <li><a href="" class="navlink">Book now</a></li>
                <li><a href="" class="navlink">Event</a></li>
                <?php 

                    if(isset($_SESSION['username'])){
                        // echo '<li><a href='"+request.getContextPath()+"/Logout' class='navlink'>Log Out</a></li>';
                        echo "<li><a href='../src/profile.php' class='navlink'>Profile</a></li>";
                        echo "<li><a href='../src/logout.php' class='navlink'>Log Out</a></li>";
                    }

                 
                ?>
                
              
            </ul>
        </div>
    </div>
</nav>
<!-- Jquery needed -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


<!-- Function used to shrink nav bar removing paddings and adding black background -->
<script>
    $(window).scroll(function () {
        if ($(document).scrollTop() > 20) {
            $('.nav').addClass('affix');
            console.log("OK");
        } else {
            $('.nav').removeClass('affix');
        }
    });
</script>
