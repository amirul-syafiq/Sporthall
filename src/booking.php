
<!DOCTYPE html>
<html>
    <head>
    <?php include "../template/head.php"; ?>
        <title>Basketball Booking Page</title>
    </head>
    <body>
    <?php include "../template/navigation.php" ?>


        <div class="container BookingContainer d-flex justify-content-between pd-12 ">
<!--            style="width: 50em; text-align: center;align-content: center;"-->
            <table id="Game"class="table table-light table-striped table-hover shadow" >
                <thead>

                <td>Hall No</td>
                <td>Time</td>
                <td>Game</td>
                <td>Vacancy</td>
                <td>Action</td>
                </thead>
                <tbody id="tbody">
                    <form action="/bookingconfirm.php"method="post"hidden="TRUE">
                <?php
                
                
                if(isset($_GET['game']))
                {
                    $game=$_GET['game'];
                }
                ?>
                </form>
               </tbody>
               
                


               
            </table>
            
        </div>
        <?php include '../template/footer.html'; ?>        
    </body>
    <script>
        
        $(document).ready(function(){
            var game = <?php echo(json_encode($game)); ?>;
            
            alert(game);
$.ajax({
    
    type: "GET",
    url: "http://localhost/Sporthall/api/halls",
    dataType: "json",
    success: function (item, status, xhr) {

        for(let i=0;i<item.length;i++){
            var tbody="";

        if(item[i].game == game){

            //basketball

            for(let j=0;j<item.length;j++){

                if(item[j].game == "basketball"){
                    
                    if(item[j].vacancy == "1"){
                        tbody += "</td><td><input type='text' value='" + item[j].hallNo+ "'name='hall' hidden</td>"
                    +"<td>" + item[j].time + "</td>"
                    +"<td>" + item[j].date+ "</td>";
                        tbody += "<td>Available</td>";
                         tbody+="<td><button class='basketballBtn btn btn-primary'>Booking</button></td></tr>";
                        
                    }
                    
                }

            }
        }else if(item[i].game == game){

            //ping-pong

            for(let j=0;j<item.length;j++){

                if(item[j].game == "ping-pong"){
                    
                    if(item[j].vacancy == "1"){
                        tbody += "</td><td>" + item[j].hallNo+ "</td>"
                    +"<td>" + item[j].time + "</td>"
                    +"<td>" + item[j].date+ "</td>";
                        tbody += "<td>Available</td>";
                        tbody+="<td><button class='ping-pongBtn btn btn-primary'>Booking</button></td></tr>";
                    }
                }

            }

        }else{

     //gym

            for(let j=0;j<item.length;j++){

                if(item[j].game == game){

                    
                    if(item[j].vacancy == "1"){
                        tbody += "</td><td>" + item[j].hallNo+ "</td>"
                    +"<td>" + item[j].time + "</td>"
                    +"<td>" + item[j].game+ "</td>";
                        tbody += "<td>Available</td>";
                        tbody+="<td><button class='gymnasiumBtn btn btn-primary'>Booking</button></td></tr>";
                    }
                }

            }

        }
        document.getElementById('tbody').innerHTML= tbody;
        }
},
error: function (xhr, status, error) {
alert('error' + xhr + ", " + status + "," + error);
}

});
            
    // code to read selected table row cell data (values).
    $("#Game").on('click','.gymnasiumBtn',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         
         var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
         var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
         var col3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD
         var data=col1+"\n"+col2+"\n"+col3;
            sessionStorage.setItem("hall", col1);
            sessionStorage.setItem("time", col2);
            sessionStorage.setItem("game", col3);
            window.location.href = "bookingconfirm.php";
         
        //   data.submit();
         alert(data);
    });
    $("#Game").on('click','.ping-pongBtn',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         
         var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
         var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
         var col3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD
         var data=col1+"\n"+col2+"\n"+col3;
        //  data.submit();
            sessionStorage.setItem("hall", col1);
            sessionStorage.setItem("time", col2);
            sessionStorage.setItem("game", col3);
            window.location.href = "bookingconfirm.php";
         alert(data);
         
    });
    $("#Game").on('click','.basketballBtn',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         
         var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
         var col2=currentRow.find("td:eq(1)").text(); // get current row 2nd TD
         var col3=currentRow.find("td:eq(2)").text(); // get current row 3rd TD
         var data=col1+"\n"+col2+"\n"+col3;
            sessionStorage.setItem("hall", col1);
            sessionStorage.setItem("time", col2);
            sessionStorage.setItem("game", col3);
            window.location.href = "bookingconfirm.php";
        //   data.submit();
         alert(data);
         
         
    });
});
    </script>
</html>