<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/editForm.css">
    <?php include "../template/head.php"; ?>

</head>

<body>

    <?php include "../template/adminNav.php"; ?>

    <center>
        <div class="main-block col-md-8">
            <div class="card">
                <h2></h2>
                <div class="card-body">
                    <form class="well form-horizontal" id="updateUserForm">
                        <div class="info">
                            <table>
                                <tbody id="updatetbody">
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {

                var username = sessionStorage.getItem('username');
                var name = sessionStorage.getItem('name');
                var role = sessionStorage.getItem('role');

                var userEmail, userPassword;

                $("h2").html("Edit " + name + "'s details here");

                var tbody = "";

                $.ajax({

                    type: "GET",
                    url: baseURL + "/api/user/" + username,
                    dataType: "json",
                    success: function(user, status, xhr) {

                        userEmail = user.email;
                        userPassword = user.password;

                    },
                    complete: function() {

                        if (role == "CUSTOMER") {

                            $.ajax({
                                type: "GET",
                                url: baseURL + "/api/customer/" + username,
                                dataType: "json",
                                success: function(userc, status, xhr) {

                                    tbody += "<tr><td>Name</td><td>:</td><td><input class='text' type='hidden' name='name' value='" + name + "'>" + name + "</td></tr>" +
                                        "<tr><td>Username</td><td>:</td><td><input class='text' type='hidden' name='username' value='\"" + username + "\"'>" + username + "</td></tr>" +
                                        "<tr><td>Email</td><td>:</td><td><input class='text' type='text' name='email' value='" + userEmail + "'></td></tr>" +
                                        "<tr><td>Age</td><td>:</td><td><input class='text' type='hidden' name='age' value='\"" + userc.age + "\"'>" + userc.age + "</td></tr>" +
                                        "<tr><td>Address</td><td>:</td><td><input class='text' type='hidden' name='address' value='\"" + userc.address + "\"'>" + userc.address + "</td></tr>" +
                                        "<tr><td>City</td><td>:</td><td><input class='text' type='hidden' name='city' value='\"" + userc.city + "\"'>" + userc.city + "</td></tr>" +
                                        "<tr><td>Country</td><td>:</td><td><input class='text' type='hidden' name='country' value='\"" + userc.country + "\"'>" + userc.country + "</td></tr>" +
                                        "<tr><td>Postal</td><td>:</td><td><input class='text' type='hidden' name='postal' value='\"" + userc.postal + "\"'>" + userc.postal + "</td></tr>" +
                                        "<tr><td><input class='text' type='hidden' name='password' value='" + userPassword + "'></td></tr>" +
                                        "<tr><td>Role</td><td>:</td>" +
                                        "<td><select class='role' name='role'><option value='CUSTOMER' selected>Customer</option>" +
                                        "<option value='ADMIN'>Admin</option></select></td></tr>" +
                                        "<tr><td><button type='submit' class='btn-item' style='margin:5px'>Update</button>" +
                                        "<button type='reset' class='btn-reset'>Reset</button></td></tr>";

                                    $("#updatetbody").html(tbody);
                                },
                                error: function(xhr, status, error) {
                                    alert('error' + xhr + ", " + status + "," + error);
                                }
                            });
                        } else {

                            tbody += "<tr><td>Name</td><td>:</td><td><input class='text' type='hidden' name='name' value=" + name + ">" + name + "</td></tr>" +
                                "<tr><td>Username</td><td>:</td><td><input class='text' type='hidden' name='username' value=" + username + ">" + username + "</td></tr>" +
                                "<tr><td>Email</td><td>:</td><td><input class='text' type='text' name='email' value=" + userEmail + "></td></tr>" +
                                "<tr><td><input class='text' type='hidden' name='password' value=" + userPassword + "></td></tr>" +
                                "<tr><td>Role</td><td>:</td>" +
                                "<td><select class='role' name='role'><option value='CUSTOMER'>Customer</option>" +
                                "<option value='ADMIN' selected>Admin</option></select></td></tr>" +
                                "<tr><td><button type='submit' class='btn-item' style='margin:5px'>Update</button>" +
                                "<button type='reset' class='btn-reset'>Reset</button></td></tr>";

                            $("#updatetbody").html(tbody);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('error' + xhr + ", " + status + "," + error);
                    }

                });

                $("#updateUserForm").submit(function(e) {

                    e.preventDefault();

                    var formData = $(this).serialize();

                    $.ajax({
                        type: "PUT",
                        url: baseURL + "/api/user/" + username,
                        async: true,
                        data: formData,
                        dataType: "json",
                        success: function(result, status, xhr) {
                            alert("Successfully updated!");
                            window.location.href = "manageAllUsers.php";
                        },
                        error: function(xhr, status, error) {
                            alert('error' + xhr + ", " + status + "," + error);
                        }

                    });
                });
            });
        </script>
    </center>
</body>

</html>