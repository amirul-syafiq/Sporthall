
<!DOCTYPE html>
<html>
    <head>
    <?php include "../template/head.php"; ?>
        <title>Gymnasium Booking Page</title>
    </head>
    <body>
    <?php include "../template/navigation.php" ?>
        
    
        
        <div class=" container  pd-12">
            
                            <form id="confirm">
                                <div class="pl-lg-4">
                                    <h6 class="heading-small text-muted mb-4">User information</h6>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-username">Username</label>
    
                                                <input type='text' id='input-username' class='form-control form-control-alternative'
                                                       placeholder='Username' name='username' readonly value="<?php echo $_SESSION['username'];?>">
                                                
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group"id="email">
                                                
                                                <!-- <label class="form-control-label" for="input-email">Email address</label>
                                                <input type='email' id='input-email' class='form-control form-control-alternative'
                                                        placeholder='jesse@example.com' name='email' readonly value=""> -->
                                                        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused"id="name">
                                                <!-- <label class="form-control-label" for="name">Name</label>
                                                <input type='text' id='name' class='form-control form-control-alternative'
                                                       placeholder='name' name='name' readonly value="${customer.name}"> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused"id="age">
                                                <!-- <label class="form-control-label" for="age">Age</label>
                                                <input type='number' id='age' class='form-control form-control-alternative'
                                                             placeholder='age' name='age' readonly value="${customer.age}" -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">Booking Information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group focused"id="game">
                                                <!-- <label class="form-control-label" for="input-game">Game</label>
                                               
                                                    <input type='text' id='input-game' class='form-control form-control-alternative'
                                                             placeholder='game' name='game'readonly value='" + game + "'> -->
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group focused"id="hall">
                                                <!-- <label class="form-control-label" for="input-hall">Hall No</label>
                                               
                                                    <input type='text' id='input-hall' class='form-control form-control-alternative'
                                                            placeholder='Hall' name='hall' readonly value='" + hall + "'> -->
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused"id="time">
                                                <!-- <label class="form-control-label" for="input-session">Session</label>
                                               
                                                    <input type='text' id='input-session' class='form-control form-control-alternative'
                                                             placeholder='Session' name='session'readonly value='" + time + "'> -->
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group"id="date">
                                                <!-- <label class="form-control-label" for="input-country">Date</label>
                                                
                                                    "<input type='text' id='input-date' class='form-control form-control-alternative'
                                                             placeholder='Date' name='date' readonly value='" + df +"'>
                                                -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <button class="login__button">Confirm</button>
                            </form>
                        </div>
                        <?php include '../template/footer.html'; ?> 
    </body>
    <script>
        var username = <?php echo(json_encode($_SESSION['username'])); ?>;
        $(document).ready(function(){
           var hall=sessionStorage.getItem("hall");
           var time=sessionStorage.getItem("time");
            var game=sessionStorage.getItem("game");
            
            
            var now = new Date();
            var email= '';
            var name= '';
            var userobj= '';
            var age='';
            var h='';
            var t='';
            var g='';
            var ldate='';
            var localdate=now.toLocaleDateString();
            
            $.ajax({
    
    type: "GET",
    url: baseURL+"/api/user/"+username,
    dataType: "json",
    success: function (user, status, xhr) {
        
       userobj= user;
        

        
        },
    
error: function (xhr, status, error) {
alert('error' + xhr + ", " + status + "," + error);
},
complete:function(){
    $.ajax({
    
    type: "GET",
    url: baseURL+"/api/customer/"+username,
    dataType: "json",
    success: function (customer, status, xhr) {
        
       
        

        email+="<label class='form-control-label' for='input-email'>Email address</label><input type='email' id='input-email' class='form-control form-control-alternative'"
                                                        +"placeholder='jesse@example.com' name='email' readonly value='"+userobj.email+"'>";
                                                        
        name+="<label class='form-control-label' for='name'>Name</label><input type='text' id='input-name' class='form-control form-control-alternative'placeholder='name' name='name' readonly value='"+userobj.name+"'>";
        age+="<label class='form-control-label' for='age'>Age</label><input type='number' id='input-age' class='form-control form-control-alternative'placeholder='age' name='age' readonly value='"+customer.age+"'>";
        g+="<label class='form-control-label' for='input-game'>Game</label><input type='text' id='input-game' class='form-control form-control-alternative'placeholder='game' name='game'readonly value='" + game + "'>";
        h+="<label class='form-control-label' for='input-hall'>Hall No</label><input type='text' id='input-hall' class='form-control form-control-alternative'placeholder='Hall' name='hallNo' readonly value='" + hall + "'>"
        t+="<label class='form-control-label' for='input-session'>Session</label><input type='text' id='input-session' class='form-control form-control-alternative'placeholder='Session' name='session'readonly value='" + time + "'> "                                                
        ldate+="<label class='form-control-label' for='input-country'>Date</label><input type='text' id='input-date' class='form-control form-control-alternative'placeholder='Date' name='date' readonly value='" + localdate +"'>"                                                
                                                        document.getElementById('email').innerHTML= email;
                                                        document.getElementById('name').innerHTML= name;
                                                        document.getElementById('age').innerHTML= age;
                                                        document.getElementById('game').innerHTML= g;
                                                        document.getElementById('hall').innerHTML= h;
                                                        document.getElementById('time').innerHTML= t;
                                                        document.getElementById('date').innerHTML= ldate;
                                                    
                                                        
                                                        
        }
});

}});
$("#confirm").submit(function(e){
            e.preventDefault();

            var formData= $(this).serialize();
            

        
        $.ajax({
            type:"POST",//change type here
            url:baseURL+"/api/booking",//url yang handle db
            async: true,
            data: formData,//nama variable yg serialize form tu
            dataType: "json",//data type dia change to json

            success: function(result,status,xhr){
                    alert("successfully added");
                    
                    window.location.href = "../index.php";
            },
            complete:function(){   

            $.ajax({
                
                type: "PUT",
                url: baseURL+"/api/hall/" + hall + "/" + game + "/" + time + "/0" ,
                async: true,
                dataType: "json",
                success: function (result, status, xhr) { 
                    console.log("Hall vacancy updated.");
                },
                error: function (xhr, status, error) { 
                    alert('error' + xhr + ", " + status + "," + error);
    }
});          

            },
            error: function(xhr,status,error){
                alert('error'+ xhr+", "+status+ ","+error);
            }

        });
    });
});
       
        </script>
</html>