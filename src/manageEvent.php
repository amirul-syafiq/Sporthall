<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>View Events</title>
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
            <div class="manageBookingTitle"><br><br>View Events</div>
            <div class="row justify-content">
                <div class="col-md-12">
                    <div class=" mt-5">  
                        <div style="padding-bottom: 30px;" class="container-fluid page-body-wrapper"> 
                          <div class="container">
                          <table class="table table-hover">
                              <thead class="table-condensed">
                                <tr>
                                  <td style="padding:20px 20px 20px 10px;">ID</td>
                                  <td style="padding:20px 20px 20px 10px;">Event Name</td>
                                  <td style="padding:20px 20px 20px 10px;">Date</td>
                                  <td style="padding:20px 20px 20px 10px;">Price</td>
                                  <td style="padding:20px 20px 20px 10px;">Customer ID</td>
                                  <td style="padding:20px 20px 20px 10px;"></td>
                                </tr>
                              </thead>
                              <!-- <%
                                List<Event> ul = (List<Event>)request.getAttribute("ul");
                                    for(int i=0;i<ul.size();i++){
                                       %>
                                   <tbody>
                                    <tr>
                                        <td style="padding:20px 20px 20px 10px;"><%=ul.get(i).getId()%></td>
                                        <td style="padding:20px 20px 20px 10px;"><%=ul.get(i).getEventName()%></td>
                                        <td style="padding:20px 20px 20px 10px;"><%=ul.get(i).getEventDate()%></td>
                                        <td style="padding:20px 20px 20px 10px;"><%=ul.get(i).getEventPrice()%></td>
                                        <td style="padding:20px 20px 20px 10px;"><%=ul.get(i).getCustomerId()%></td>
                                        <td style="padding:10px;">
                                            <form method="get" action="DeleteEvent">
                                                <input type="hidden" name="id" value="<%=ul.get(i).getId()%>">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                   <% } %>
                                    </tr>
                                </tbody>                 -->
                                <tbody id='tbodyEvent'>

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
                    url:baseURL+"/api/manageevent",
                    dataType:"json",
                    success: function (event,status,xhr) {

                        var tbodyEvent = "";
                        for (let i = 0; i < event.length; i++) {
                            event += "<tr><td style='padding:20px 20px 20px 10px;'>"+event[i].id
                            +"</td><td style='padding:20px 20px 20px 10px;'>"+event[i].eventName
                            +"</td><td style='padding:20px 20px 20px 10px;'>"+event[i].eventDate
                            +"</td><td style='padding:20px 20px 20px 10px;'>"+event[i].eventPrice
                            +"</td><td style='padding:20px 20px 20px 10px;'>"+event[i].customerId
                            +"</td><td style='padding:10px;'><input type='hidden' name="id" value='"+event[i].id+"'>"
                            +"<button class='btn btn-danger' onclick='deleteEvent(\""+event[i].id+"\")'>Delete</button></td></tr>"
                            
                        }document.getElementById('tbodyEvent').innerHTML= tbodyEvent;
                    },
                    error: function (xhr, status, error) {
                        alert('error' + xhr + ", " + status + "," + error);
                    }
                });
            });

            function deleteEvent(id) {
                $.ajax({
                    type:"DELETE",
                    url:baseURL+"/api/deleteevent/"+id,
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
