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
        </style> 
        
        <?php include "../template/head.php"; ?> 
        
    </head>
    <body>
               
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
                                    <!-- <tr>
                                        <td style="padding:10px;">
                                            <form action="ViewUser">
                                                <input type="hidden" name="username" value="<%=ul.get(i).getUserName()%>">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </td>
                                        <td style="padding:10px;">
                                            <form method="get" action="DeleteUser">
                                                <input type="hidden" name="username" value="<%=ul.get(i).getUserName()%>">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr> -->
                                </tbody>                
                          </table>
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
                                    +"</td>" + "<td>" + users[i].email + "</td>"
                                    +"</td>" + "<td>" + users[i].role + "</td><tr>";

                    }document.getElementById('tbodyusers').innerHTML= tbody;
            },
            error: function (xhr, status, error) {
                alert('error' + xhr + ", " + status + "," + error);
        }

        });});

        </script>

    <?php include "../template/footer.html"; ?>

    </body>
</html>