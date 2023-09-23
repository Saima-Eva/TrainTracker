<!DOCTYPE html>
<html>
    <head>
        <title>Train Tracker</title>
        <style>
            
            input[type=text],input[type=password]{
                width: 100%;
                padding: 10px 0px;
            }
            
            input[type=button]{
                width: 30%;
                padding: 6px;
                color: black;
                background-color: darkcyan;
            }
            
            .left{
                margin: auto;
                float: left;
                padding: 10px;
                width: 59%;
                border: 2px solid #ccc;
            }
            
            .logIn{
                margin: auto;
                float: right;
                padding: 10px;
                width: 35%;
                border: 3px solid #ccc;
                
            }
            body{
                margin: 50px;
                background-color: floralwhite;
            }
        </style>
        
        <script>
            xmlhttp = new XMLHttpRequest();
            function validate(){
                email=document.getElementById('email').value;
                password=document.getElementById('password').value;
                xmlhttp.onreadystatechange = function() {

                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        //alert(xmlhttp.responseText);

                        m=document.getElementById("showHint");
                        m.innerHTML=xmlhttp.responseText;
                        if(xmlhttp.responseText=="")
                            document.sign_in.submit();
                        else 
                            m.innerHTML=xmlhttp.responseText;
                    }
                };
                var url="signinHint.php?uname="+email+"&password="+password;
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }
            
        </script>
    </head>
    
    <body>
        <h1 style="color:darkcyan;">TRAIN TRACKER</h1>
        <div class="left">
            <form>
                <img src="train.jpg" alt="train" width="100%" height="100%">
            </form>
        </div>
        
        <div class="logIn">
            <form style="text-align: center" name="sign_in" action="signin.php" method="post">
                User Sign In<br><br><br>
                <input id="email" type="text" name="uname" placeholder="User e-mail" ><br><br>
                <input id="password" type="password" name="password" placeholder="User Password" ><br>
                <span id="showHint"></span><br>
                <input type="button" name="signin" value="SIGN IN" onclick="validate()" ><br><br>
                <a> Forgot Password ? </a>||<a href="signup.html"> SIGN UP </a><br><br>
                <a href="StationMaster/stationMasterSignIn.html"> Station Master Sign-in </a>||<a href="Admin/adminSignIn.html">Admin log in</a>
                
            </form>
        </div>
    </body>
</html>