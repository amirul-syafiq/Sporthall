<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>View Bookings</title>
        <!--Fonts-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
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
        </style> 
        
        <?php include "../template/head.php"; ?>
        
    </head>
    <body>
    <?php include "../template/adminNav.php"; ?>      
        <div class="container">
            <div class="manageBookingTitle"><br><br>View Bookings</div>
            <div class="row justify-content">
                <div class="col-md-12">
                    <div class=" mt-5">  
                        <div style="padding-bottom: 30px;" class="container-fluid page-body-wrapper"> 
                            <div class="container">
                            <table class="table table-hover">
                                <thead class="table-condensed">
                                <tr>
                                  <td style="padding:20px 20px 20px 10px;">Booking ID</td>
                                  <td style="padding:20px 20px 20px 10px;">Customer ID</td>
                                  <td style="padding:20px 20px 20px 10px;">Date</td>
                                  <td style="padding:20px 20px 20px 10px;">Status</td>
                                  <td style="padding:20px 20px 20px 10px;">Amount to Pay</td>
                                  <td style="padding:20px 20px 20px 10px;">Hall Number</td>
                                  <td style="padding:20px 20px 20px 10px;">Session</td>
                                  <td style="padding:20px 20px 20px 10px;">Game</td>
                                  <td style="padding:20px 20px 20px 10px;"></td>
                                </tr>
                                </thead>
                                <tbody id="tbodyBooking">
                                </tbody>              
                            </table>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $.ajax({
                    type:"GET",
                    url:baseURL+"/api/managebooking",
                    dataType:"json",
                    success: function (booking,status,xhr) {

                        var tbodyBooking = "";
                        for (let i = 0; i < booking.length; i++) {
                            tbodyBooking += "<tr><td style='padding:20px 20px 20px 10px;'>"+booking[i].id
                            +"</td><td style='padding:20px 20px 20px 10px;'>"+booking[i].customerId
                            +"</td><td style='padding:20px 20px 20px 10px;'>"+booking[i].date
                            +"</td><td style='padding:20px 20px 20px 10px;'>"+booking[i].status
                            +"</td><td style='padding:20px 20px 20px 10px;'>"+booking[i].amountToPay
                            +"</td><td style='padding:20px 20px 20px 10px;'>"+booking[i].hallNo
                            +"</td><td style='padding:20px 20px 20px 10px;'>"+booking[i].session
                            +"</td><td style='padding:20px 20px 20px 10px;'>"+booking[i].game
                            +"</td><td style='padding:10px;'><input type='hidden' name="id" value='"+booking[i].id+"'>"
                            +"<button class='btn btn-danger' onclick='deleteBooking(\""+booking[i].id+"\")'>Delete</button></td></tr>"
                            
                        }document.getElementById('tbodyBooking').innerHTML= tbodyBooking;
                    },
                    error: function (xhr, status, error) {
                        alert('error' + xhr + ", " + status + "," + error);
                    }
                });
            });

            function deleteBooking(id) {
                $.ajax({
                    type:"DELETE",
                    url:baseURL+"/api/deletebooking/"+id,
                    dataType:"json",
                    success: function (data, status, xhr) {
                        location.reload();
                    },
                    error: function (xhr, resp, text) {
                        alert("error " + xhr + ", " + resp + ", " + text);
                    }
                });
            }
        </script>
        <?php include "../template/footer.html"; ?>                                 
    </body>
</html>
