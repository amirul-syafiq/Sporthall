<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <?php include "../template/head.php"; ?>
    <style>
        .manageBookingTitle{
            font-size: 40px;
            font-weight: 600;
        } 
        
        thead{
            font-size: 20px;
            font-weight: 600;
            text-align: center;
        }

        .table-condensed
        {
            background-color: #62BDBD;
        }

        tbody{
            font-size: 18px;
            background-color: lightgray;
            text-align: center;
        }

        td{
            padding:20px 20px 20px 10px;
        }
    </style> 
</head>
<body>
    
<?php include "../template/adminNav.php"; ?>

        <div class="container">
            <div class="manageBookingTitle"><br><br>View Sports Halls</div>
            <div class="row justify-content">
                <div class="col-md-12">
                    <div class=" mt-5">  
                        <div style="padding-bottom: 30px;" class="container-fluid page-body-wrapper"> 
                          <div class="container">
                              <h2>Basketball</h2>
                          <table class="table table-hover">
                              <thead class="table-condensed">
                                <tr>
                                  <td>Game</td>
                                  <td>Hall Number</td>
                                  <td>Session</td>
                                  <td>Date</td>
                                  <td>Vacancy</td>
                                </tr>
                              </thead>
                                <tbody id="tbodybb">
                                </tbody>                
                          </table>
                          <br>
                          <h2>Ping-Pong</h2>
                          <table class="table table-hover">
                              <thead class="table-condensed">
                                <tr>
                                  <td>Game</td>
                                  <td>Hall Number</td>
                                  <td>Session</td>
                                  <td>Date</td>
                                  <td>Vacancy</td>
                                </tr>
                              </thead>
                                <tbody id="tbodypp">
                                </tbody>                
                          </table>
                          <br>          
                          <h2>Gymnasium</h2>
                          <table class="table table-hover">
                              <thead class="table-condensed">
                                <tr>
                                  <td>Game</td>
                                  <td>Hall Number</td>
                                  <td>Session</td>
                                  <td>Date</td>
                                  <td>Vacancy</td>
                                </tr>
                              </thead>
                                <tbody id="tbodygym">
                                </tbody>                
                          </table>
                          </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>

    <script>
        
            $( document ).ready(function() {

                $.ajax({

                    type: "GET",
                    url: "http://localhost/Sporthall/api/halls",
                    dataType: "json",
                    success: function (item, status, xhr) {

                        for(let i=0;i<item.length;i++){

                        if(item[i].game == "basketball"){

                            var tbodybb="";

                            for(let j=0;j<item.length;j++){

                                if(item[j].game == "basketball"){
                                    tbodybb += "<tr><td>" + item[j].game +"</td>" + "<td>" + item[j].hallNo+ "</td>"
                                    +"</td>" + "<td>" + item[j].time + "</td>"
                                    +"</td>" + "<td>" + item[j].date+ "</td>"
                                    +"</td>" + "<td>" + item[j].vacancy + "</td><tr>";
                                }

                            }document.getElementById('tbodybb').innerHTML= tbodybb;

                        }else if(item[i].game == "ping-pong"){

                            var tbodypp="";

                            for(let j=0;j<item.length;j++){

                                if(item[j].game == "ping-pong"){
                                    tbodypp += "<tr><td>" + item[j].game +"</td>" + "<td>" + item[j].hallNo+ "</td>"
                                    +"</td>" + "<td>" + item[j].time + "</td>"
                                    +"</td>" + "<td>" + item[j].date+ "</td>"
                                    +"</td>" + "<td>" + item[j].vacancy + "</td><tr>";
                                }

                            }document.getElementById('tbodypp').innerHTML= tbodypp;

                        }else{

                            var tbodygym="";

                            for(let j=0;j<item.length;j++){

                                if(item[j].game == "gymnasium"){
                                    tbodygym += "<tr><td>" + item[j].game +"</td>" + "<td>" + item[j].hallNo+ "</td>"
                                    +"</td>" + "<td>" + item[j].time + "</td>"
                                    +"</td>" + "<td>" + item[j].date+ "</td>"
                                    +"</td>" + "<td>" + item[j].vacancy + "</td><tr>";
                                }

                            }document.getElementById('tbodygym').innerHTML= tbodygym;

                        }
                        }
                },
                error: function (xhr, status, error) {
                alert('error' + xhr + ", " + status + "," + error);
            }

            });});

    </script>

    <?php include "../template/footer.html"; ?> 

</body>
</html>