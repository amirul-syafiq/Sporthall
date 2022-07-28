<!DOCTYPE html>
<html>

<head>
    <?php include "../template/head.php"; ?>
</head>

<body>
    <?php include "../template/navigation.php" ?>
    <?php if (isset($_GET['event'])) {
        $event = $_GET['event'];
    }
    ?>
    <div class="container-fluid" style="min-height: 70vh; 
             background-image: url(<%= request.getContextPath()%>/images/Workout.jpg); 
             background-size: cover; background-position: center top;">
    </div>
    <div class="eventContainer container">
        <div class="row">
            <div class="card background-color shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Event Registration</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="RegisterEvent">
                        <h6 class="heading-small text-muted mb-4">Event information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-username">Activity</label>

                                        <input type='text' class='form-control' placeholder='Event' name='eventName' readonly value='<?php echo $event; ?>'>
                                        <input type='hidden' class='form-control' placeholder='Event' name='username' readonly value='<?php echo $_SESSION['username']; ?>'>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">PRICE</label>
                                        <input type='text' readonly class='form-control' value="RM 15.00">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-city">Choose Date</label>
                                        <input type="date" class="form-control" placeholder="01-01-2022" name="eventDate">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">



                        <button class="login__button">Register</button>

                </div>
                </form>
            </div>
        </div>

    </div>
    </div>
    <?php include '../template/footer.html'; ?>
    <script>
        $(document).ready(function() {
            var event = <?php echo (json_encode($event)); ?>;
            $("#RegisterEvent").submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                alert(formData);


                $.ajax({
                    type: "POST", //change type here
                    url: baseURL + "/api/event", //url yang handle db
                    async: true,
                    data: formData, //nama variable yg serialize form tu
                    dataType: "json", //data type dia change to json

                    success: function(result, status, xhr) {
                        alert("successfully added");

                        window.location.href = "../index.php";
                    },
                    error: function(xhr, status, error) {
                        alert('error' + xhr + ", " + status + "," + error);
                    }

                });
            });


        });
        $(window).scroll(function() {
            if ($(document).scrollTop() < 20) {
                $('.logolink').addClass('logo-white');
                $('.navlink').addClass('nav-white');
                $('.logolink').removeClass('logolink');
                $('.navlink').removeClass('navlink');
            } else {
                $('.logo-white').addClass('logolink');
                $('.nav-white').addClass('navlink');
                $('.logolink').removeClass('logo-white');
                $('.navlink').removeClass('nav-white');
            }
        });
    </script>
</body>

</html>