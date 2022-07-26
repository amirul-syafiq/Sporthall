<nav class="nav">
    <div class="container-fluid">
        <div class="logo">
            <img src="../images/LOGO-UTM.png" 
                 height="42"/>
            <a href="../src/admin.php" class="logolink">Sport Hall Booking System</a>
        </div>
        <div id="mainListDiv" class="main_list">
            <ul class="navlinks">
                <li><a href="../src/manageAllUsers.php" class="navlink">Users</a></li>
                <li><a href="../src/viewHall.php" class="navlink">Halls</a></li>
                <li><a href="/ViewBookingHall" class="navlink">Bookings</a></li>
                <li><a href="/ViewEvent2" class="navlink">Events</a></li>
                <li><a href="/Logout" class="navlink">Log Out</a></li>
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
