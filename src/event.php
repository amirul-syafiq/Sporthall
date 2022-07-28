<!DOCTYPE html>
<html>

<head>
    <?php include "../template/head.php"; ?>

    <<link rel="stylesheet" href="../css/event.css">
</head>

<body>
    <?php include "../template/navigation.php" ?>
    <!-- ***** Features Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Choose <em>Event</em></h2>
                        <img src="../images/line-dec.png" alt="waves">
                        <p>Come and join from various selection of event , activity and programme offered by us!.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="../images/features-first-icon.png" alt="First One">
                            </div>
                            <div class="right-content">
                                <h4>Basic Fitness</h4>
                                <p>We’ll reveal and teach 5 basic fitness in this session</p>


                                <?php
                                if (isset($_SESSION['username'])) {
                                    echo '<a href="registerevent.php?event=Basic Fitness" class="text-button">Discover More</a>';
                                } else {
                                    echo '<a href="login.php" class="text-button">Discover More</a>';
                                }

                                ?>

                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="../images/features-first-icon.png" alt="second one">
                            </div>
                            <div class="right-content">
                                <h4>Gym Training</h4>
                                <p>This course teaches user to setup their workout routine in gym</p>
                                <?php
                                if (isset($_SESSION['username'])) {
                                    echo '<a href="registerevent.php?event=Gym Training" class="text-button">Discover More</a>';
                                } else {
                                    echo '<a href="login.php" class="text-button">Discover More</a>';
                                }

                                ?>


                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="../images/features-first-icon.png" alt="third gym training">
                            </div>
                            <div class="right-content">
                                <h4>Basic Muscle Course</h4>
                                <p>This course is recommended for beginner user that wants to build muscle</p>
                                <?php
                                if (isset($_SESSION['username'])) {
                                    echo '<a href="registerevent.php?event=Basic Muscle Course" class="text-button">Discover More</a>';
                                } else {
                                    echo '<a href="login.php" class="text-button">Discover More</a>';
                                }

                                ?>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="../images/features-first-icon.png" alt="fourth muscle">
                            </div>
                            <div class="right-content">
                                <h4>Advanced Muscle Course</h4>
                                <p> This Course is recommend to the Amateur customer thats wants to workout</p>
                                <?php
                                if (isset($_SESSION['username'])) {
                                    echo '<a href="registerevent.php?event=Advanced Muscle Course" class="text-button">Discover More</a>';
                                } else {
                                    echo '<a href="login.php" class="text-button">Discover More</a>';
                                }

                                ?>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="../images/features-first-icon.png" alt="training fifth">
                            </div>
                            <div class="right-content">
                                <h4>Yoga Training</h4>
                                <p>This training allows the user to learn more about Yoga</p>
                                <?php
                                if (isset($_SESSION['username'])) {
                                    echo '<a href="registerevent.php?event=Yoga Training" class="text-button">Discover More</a>';
                                } else {
                                    echo '<a href="login.php" class="text-button">Discover More</a>';
                                }

                                ?>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="../images/features-first-icon.png" alt="gym training">
                            </div>
                            <div class="right-content">
                                <h4>Body Building Course</h4>
                                <p>This Course is for the customer to build a good body</p>
                                <?php
                                if (isset($_SESSION['username'])) {
                                    echo '<a href="registerevent.php?event=Body Building Course" class="text-button">Discover More</a>';
                                } else {
                                    echo '<a href="login.php" class="text-button">Discover More</a>';
                                }

                                ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


</body>

</html>