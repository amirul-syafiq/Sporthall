<head>
<?php include "../template/head.php"; ?>
<link rel="stylesheet" href="../css/pricing.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<?php include "../template/navigation.php" ?>
<section class="card container grid pd-12">
    <div class="card__container grid">
        <!--==================== CARD 1 ====================-->
        <article class="card__content grid">
            <div class="card__pricing">
                <div class="card__pricing-number">
                    <span class="card__pricing-symbol">RM</span>19
                </div>
                <span class="card__pricing-month">/session</span>
            </div>

            <header class="card__header">
                <div class="card__header-circle grid">
                    <i class="fas fa-table-tennis card__header-icon fa-2x"></i>
                </div>

                <span class="card__header-subtitle">Recommended</span>
                <h1 class="card__header-title">Ping Pong</h1>
            </header>

            <ul class="card__list grid">
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">up to 4 user</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">1 hour per session</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Standard Ping Pong Table</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Free 2 mineral bottle/session</p>
                </li>
            </ul>
            <form>
            <?php 
                        

                        if(isset($_SESSION['username'])){
                            echo '<a href="booking.php?game=ping-pong" class="pricing__button">Book Now</a>';
                        }else{
                            echo '<a href="login.php" class="pricing__button">Book Now</a>';
                        }
                    ?>
            </form>
        </article>

        <!--==================== CARD 2 ====================-->
        <article class="card__content grid">
            <div class="card__pricing">
                <div class="card__pricing-number">
                    <span class="card__pricing-symbol">RM</span>39
                </div>
                <span class="card__pricing-month">/session</span>
            </div>

            <header class="card__header">
                <div class="card__header-circle grid">
                    <i class="fas fa-basketball-ball card__header-icon fa-2x"></i>
                    <!--                    <img src="assets/img/pro-coin.png" alt="" class="card__header-img">-->
                </div>

                <span class="card__header-subtitle">Most popular</span>
                <h1 class="card__header-title">Basketball</h1>
            </header>

            <ul class="card__list grid">
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">up to 10 user</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">2 hour per session</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">(NBA) Court Size</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Free 2  100Plus bottle/session</p>
                </li>
            </ul>
            <form>
            <?php 
                        

                            if(isset($_SESSION['username'])){
                                echo '<a href="booking.php?game=basketball" class="pricing__button">Book Now</a>';
                            }else{
                                echo '<a href="login.php" class="pricing__button">Book Now</a>';
                            }
                        ?>
            </form>
        </article>

        <!--==================== CARD 3 ====================-->
        <article class="card__content grid">
            <div class="card__pricing">
                <div class="card__pricing-number">
                    <span class="card__pricing-symbol">RM</span>9
                </div>
                <span class="card__pricing-month">/session</span>
            </div>

            <header class="card__header">
                <div class="card__header-circle grid">
                    <i class="fas fa-dumbbell card__header-icon fa-2x"></i>
                    <!--                    <img src="assets/img/enterprise-coin.png" alt="" class="card__header-img">-->
                </div>

                <span class="card__header-subtitle">Recommended</span>
                <h1 class="card__header-title">Gymnasium</h1>
            </header>

            <ul class="card__list grid">
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">1 user</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">per entry</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">World Class Gym Facilities</p>
                </li>
                <li class="card__list-item">
                    <i class="uil uil-check card__list-icon"></i>
                    <p class="card__list-description">Free 1 mineral bottle/entry</p>
                </li>
            </ul>

            <form>
            <?php 
                        

                        if(isset($_SESSION['username'])){
                            echo '<a href="booking.php?game=gymnasium" class="pricing__button">Book Now</a>';
                        }else{
                            echo '<a href="login.php" class="pricing__button">Book Now</a>';
                        }
                    ?>
            </form>
        </article>
    </div>
</section>