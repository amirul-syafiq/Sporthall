<!DOCTYPE html>
<html>

    <head>
    <link rel="stylesheet" href="css/main.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

       
        <?php include 'template/head.php'; ?>
    </head>

    <body>
        <?php include 'template/navigation.php'; ?>
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
                                // echo '<a href="'.$GLOBALS['URL'].'" class="indexBtn">Book Now</a>';
                            }
                        ?>
                       
                    </div>
                </div>
            </div>
        </div>
        <?php include 'template/footer.html'; ?>

    </body>

    

</html>