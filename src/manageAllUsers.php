<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Manage User Profile</title>
        <!--Fonts-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
        
        <style>
            .manageUserTitle{
                font-size: 40px;
                font-weight: 600;
            } 
            
            table{
                text-align: center;
            }
            
            thead{
                font-size: 20px;
                font-weight: 600;
            }

            .table-condensed
            {
                background-color: #62BDBD;
            }

            tbody{
                background-color: lightgray;
            }

            td{
                padding: 20px 20px 20px 10px;
            }

            #tbodyusers td{
                padding:10px;
            }
        </style> 
        
        <?php include "../template/head.php"; ?> 
        
    </head>
    <body>

    <?php include "../template/adminNav.php"; ?>
            
        <div class="container">
            <div class="manageUserTitle"><br><br>Manage User Profile</div>
            <div class="row justify-content">
                <div class="col-md-12">
                    <div class=" mt-5">  
                        <div style="padding-bottom: 30px;" class="container-fluid page-body-wrapper"> 
                          <div class="container">
                          <table class="table table-hover">
                              <thead class="table-condensed">
                                <tr>
                                  <td>Username</td>
                                  <td>Name</td>
                                  <td>Email</td>
                                  <td>Role</td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </thead>
                              <tbody id="tbodyusers">
                                </tbody>                
                          </table>
                          <div>
                          <p></p>
                          </div>
                          </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        <script>
        
        $(document).ready(function() {


            $.ajax({

                type: "GET",
                url: "http://localhost/Sporthall/api/user",
                dataType: "json",
                success: function (users, status, xhr) {

                    var tbody="";

                    for(let i=0;i<users.length;i++){


                        tbody += "<tr><td>" + users[i].username +"</td>" + "<td>" + users[i].name + "</td>"
                                    +"<td>" + users[i].email + "</td>"
                                    +"<td>" + users[i].role + "</td>"
                                    +"<td><button class='btn btn-primary' onclick='updatePage(\""+users[i].username+"\",\""+users[i].name+"\",\""+users[i].role+"\")'>Update</button></td>"
                                    +"<td><button class='btn btn-danger' onclick='deleteUser(\""+users[i].username+"\")'>Delete</button></td></tr>";

                    }document.getElementById('tbodyusers').innerHTML= tbody;
                },
                error: function (xhr, status, error) {
                    alert('error' + xhr + ", " + status + "," + error);
            }

            });
        });
        
        function updatePage(username,name,role){

            sessionStorage.setItem("username", username);
            sessionStorage.setItem("name", name);
            sessionStorage.setItem("role", role);
            window.location.href = "updateUser_admin.php";

        }   

        function deleteUser(username) {

            var hallNo, game, time, vacancy;

            $.ajax({
                    type: "GET",
                    url: "http://localhost/Sporthall/api/booking/"+ username,
                    dataType: "json",
                    success: function (item, status, xhr) {

                        if(item.length>0){

                            for(let i=0;i<item.length;i++){
                                hallNo = item[i].hallNo;
                                game = item[i].game;
                                time = item[i].session;
                                vacancy = "1";
                                updateVacancy.call(this, hallNo, game, time, vacancy);
                            }
                        }
                    },
                    complete: function(){
                        $.ajax({
                                dataType: "json",
                                type: "DELETE",
                                url: "http://localhost/Sporthall/api/user/"+ username,
                                
                                success: function (data, status, xhr) {
                                    location.reload();
                                },
                                error: function (xhr, resp, text) {
                                    alert("error " + xhr + ", " + resp + ", " + text);
                                }
                            });                        
                    },
                    error: function (xhr, resp, text) {
                        alert("error " + xhr + ", " + resp + ", " + text);
                    }
            });                 
        }

        function updateVacancy(hallNo, game, time, vacancy) { 

            $.ajax({
                
                type: "PUT",
                url: "http://localhost/Sporthall/api/hall/" + hallNo + "/" + game + "/" + time + "/" + vacancy,
                async: true,
                dataType: "json",
                success: function (result, status, xhr) { 
                    console.log("Hall vacancy updated.");
                },
                error: function (xhr, status, error) { 
                    alert('error' + xhr + ", " + status + "," + error);
                }
            });          
        }

        </script>

    <?php include "../template/footer.html"; ?>

    </body>
</html>