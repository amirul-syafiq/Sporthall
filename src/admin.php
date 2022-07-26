<!DOCTYPE html>
<html>
    <head>
        <?php include "../template/head.php"; ?>
        <title>Admin Page</title>
    </head>
    <body>
        <?php include "../template/adminNav.php"; ?>
        <div class="container loginContainer d-flex justify-content-between pd-12">
        <div class="indexContent">
        <div>
            <div class="title">
                <h3 class="indexTitle">
                    Welcome Back Admin
                </h3>         
            </div>
            <div>
                <a style="width: 50%; text-align: center;" href="../src/manageAllUsers.php" class="indexBtn">Manage User Profile</a><br>
                <a style="width: 50%; text-align: center;" href="../src/viewHall.php" class="indexBtn">View Hall</a><br>
                <a style="width: 50%; text-align: center;" href="/ViewBookingHall" class="indexBtn">View Booking</a><br>
                <a style="width: 50%; text-align: center;" href="/ViewEvent" class="indexBtn">View Event</a><br>
            </div>
        </div>
        </div>  
        <div class="indexImage">
        <img src="../images/Main image 3.png" width="450"/>
            </div>
        </div>    

        <!--===== MAIN JS =====-->
        <script src="main.js"></script>
        <?php include "../template/footer.html"; ?>
    </body>
</html>