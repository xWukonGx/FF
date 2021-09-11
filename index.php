<!DOCTYPE html>

<?php
if (isset($_COOKIE['username'])){
   
     header("location:site/accounts.php");
}

?>
<html>

<head>
        <title>
            Fire Fox
        </title>
        <link rel="stylesheet" href="styles/main.css">
        <link rel="shortcut icon" href="imaages/fox.jpg" type="image/x-icon">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    </head>
    <body>
        
        <navbar>
        <ul>
            <li style="margin-right: 1.5%;"><a href=""><b style="color: darkorange;">FOX</b> STORE</a></li>
            <li style="float: right;"><a href="">حول</a></li>
        
        </ul>

        </navbar>
    
    <center>
    
        <div id="main" class="main">
            <div id="se" class="pop animate">
                <div class="pop-content">
                    
                    <button id="close" onclick="closeForm()">X</button>
                
                    <br>
                    <iframe style="width: 100%;height: 50px;border:none; box-sizing: border-box;display: none;" id="kis"  name="status" ></iframe>
                
                    <div class="info">
                        
                    <div class="login">
                        <h1>Log In</h1>

                        <form  name="login" method="POST" action="operations/login/submit.php?action=login">
                        <input placeholder="Username" required="true" id="login-user" name="user"  type="text" > <br>
                        <input placeholder="Password" required="true" id="login-password" name="password"   type="password"><br>
                        <input placeholder="Re-Password" required="true" id="login-repassword" name="repassword"   type="password" ><br>
                        <input onclick="document.getElementById('kis').style.display='block'" id="submit" type="submit" >
                        </form>
                    </div>
                        
                    <div class="register">
                        <h1>Sign Up</h1>

                        <form target="status" name="sign" method="POST" action="operations/reg/submit.php?action=regist">
                            <input placeholder="Username" required="true" name="user"   type="text" > <br>
                            <input placeholder="Email" required="true" name="email"   type="email" > <br>
                            <input placeholder="Password" required="true" name="password"   type="password" >
                            <br>
                            <input placeholder="Re-Password" required="true" name="repassword"  type="password" ="Password">
                            <input onclick="document.getElementById('kis').style.display='block'" id="submit1" type="submit" value="Sign Up">    
                        </form>
                    
                    </div></div>

                   
                
                </div>
            </div>
            <p id="sk" ><b style="color: darkorange;"> FOX</b> STORE</p>
            <p id="desc">منصة حصرية لبيع وتبادل حسابات الألعاب والشحن<br>.لجميع الفئات وجميع انواع الالعاب</p>
            
            
            <button onclick="openForm()" id="skss">حساب مجاني</button>
            <button onclick="openForm()" id="skss">متجر مدفوع</button>
            

        </div>
        <script src="js/ss.js"></script>

    </body>
</html>