<!DOCTYPE html>
<html>

<head>
    <?php include "../template/head.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
</head>

<body>
    <?php include "../template/navigation.php"; ?>
    <div class="container-fluid profileHeader " style="min-height: 600px;
             background-image: url(../images/Workout.jpg); 
             background-size: cover; background-position: center top;">
        <div class="container pd-12">
            <div class="row">
                <div class="profileTitle_section col">
                    <h2 class="profileTitle">Profile</h2>
                    <p class="profileSubtitle">This is your profile page. You can edit your personal information here</p>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>
    <div class="profileContainer container">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="../images/sports.png">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <!-- <%
                                Customer customer = (Customer) session.getAttribute("customer");
                            %> -->
                    </div>
                    <div class="pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3 class="profileSideTitle">
                                <div id="profileNameAge"></div>
                            </h3>
                            <div class="profileSideSubtitle">
                                <div id="profileCityCountry"></div>
                            </div>
                            <hr class="my-4">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card background-color shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">My account</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="Profile" id="updateProfile">
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused" id="input-username">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group" id="input-email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused" id='input-name'>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group focused" id='input-age'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Contact information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused" id='input-address'>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group focused" id='input-city'>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group focused" id='input-country'>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group" id='input-postal-code'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <button class="login__button">Update</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
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

        $(document).ready(function() {

            var username = <?php echo (json_encode($_SESSION['username'])); ?>;

            var profileNameAge = "";
            var profileCityCountry = "";

            var inputUsername = "";
            var inputEmail = "";
            var inputName = "";
            var inputAge = "";
            var inputAddress = "";
            var inputCity = "";
            var inputCountry = "";
            var inputPostal = "";

            var customer = "";

            $.ajax({

                type: 'GET',
                url: baseURL + "/api/customer/" + username,
                dataType: "json",
                success: function(users, status, xhr) {
                    customer = users;
                },
                error: function(xhr, status, error) {
                    alert(error);
                },
                complete: function() {
                $.ajax({

                    type: "GET",
                    url: baseURL + "/api/user/" + username,
                    dataType: "json",
                    success: function(users, status, xhr) {

                        profileNameAge += users.name  +" , "+ customer.age;
                        profileCityCountry += customer.city +" , "+ customer.country;
                        inputUsername += "<label class='form-control-label' for='input-username'>Username</label><input type='text' id='input-username' class='form-control form-control-alternative'+ placeholder='Username' name='username' readonly value='" + username + "'>";
                        inputEmail += "<label class='form-control-label' for='input-email'>Email address</label><input type='email' id='input-email' class='form-control form-control-alternative'+ placeholder='jesse@example.com' name='email' readonly value='" + users.email + "'>";
                        inputName += "<label class='form-control-label' for='name'>Name</label><input type='text' id='input-name' class='form-control form-control-alternative'+ placeholder='name' name='name' readonly value='" + users.name + "'>";
                        inputAge += "<label class='form-control-label' for='age'>Age</label><input type='number' id='input-age' class='form-control form-control-alternative'+ placeholder='age' name='age' value='" + customer.age + "'>";
                        inputAddress += "<label class='form-control-label' for='input-address'>Address</label><input type='text' id='input-address' class='form-control form-control-alternative' + placeholder='Home Address' name='address' value='" + customer.address + "'>"
                        inputCity += "<label class='form-control-label' for='input-city'>City</label><input type='text' id='input-city' class='form-control form-control-alternative'+ placeholder='City' name='city' value='" + customer.city + "'>";
                        inputCountry += "<label class='form-control-label' for='input-country'>Country</label><input type='text' id='input-country' class='form-control form-control-alternative' + placeholder='Country' name='country' value='" + customer.country + "'>";
                        inputPostal += "<label class='form-control-label' for='input-country'>Postal code</label><input type='number' id='input-postal-code' class='form-control form-control-alternative'+ placeholder='Postal code' name='postal' value='" + customer.postal + "'>";

                        document.getElementById('profileNameAge').innerHTML = profileNameAge;
                        document.getElementById('profileCityCountry').innerHTML = profileCityCountry;
                        document.getElementById('input-username').innerHTML = inputUsername;
                        document.getElementById('input-email').innerHTML = inputEmail;
                        document.getElementById('input-name').innerHTML = inputName;
                        document.getElementById('input-age').innerHTML = inputAge;
                        document.getElementById('input-address').innerHTML = inputAddress;
                        document.getElementById('input-city').innerHTML = inputCity;
                        document.getElementById('input-country').innerHTML = inputCountry;
                        document.getElementById('input-postal-code').innerHTML = inputPostal;

                    }
                });

            }
            })
        });

        $("#updateProfile").submit(function(e) {
            var username = <?php echo (json_encode($_SESSION['username'])); ?>;
            e.preventDefault();

            var formData = $(this).serialize();
            $.ajax({
                type: "PUT",
                url: baseURL + "/api/updateProfile/" + username,
                async: true,
                data: formData,
                dataType: "json",
                success: function(result, status, xhr) {
                    alert("Successfully updated!");
                    window.location.href = "profile.php"
                    // location.reload();
                },
                error: function(xhr, status, error) {
                    alert('error' + xhr + ", " + status + "," + error);
                    // alert("Successfully updated!");
                }

            });
        });
    </script>
    <?php include "../template/footer.html"; ?>
</body>

</html>