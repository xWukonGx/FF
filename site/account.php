<!DOCTYPE html>
<html>
    <head>
        <title><?php if(!isset($_COOKIE['username'])){header("location:../index.php");}else{echo $_COOKIE['username'];}?></title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/main_a.css">
    
    </head>
<body>
    
    <?php
    session_start();
        $anons = null;
        if(!isset($_SESSION['logged']) OR $_SESSION['logged'] != "yes" OR !isset($_COOKIE['username'])){
            header("location:../index.php");
        }
        else{
            $user = $_COOKIE['username'];
            $conn = mysqli_connect("localhost","root","root","fox_fire");
            $sql = "SELECT * From normal_users WHERE username='$user'";
            
            while($row = mysqli_fetch_assoc(mysqli_query($conn,$sql))){
                $anons = $row['anouncements'];
                $img_pic = $row['PIC'];
                break;
            }
            $last = 3-$anons;
            $dik = "$last/3";
        }
        
    ?>
   <navbar>
            <ul>
                <li id="exo" style="margin-right: 1.5%; padding:0;"><a href="../site/account.php"><img style="width: 34px;height: auto;border-radius: 50%;max-height: 33px;" src=<?php echo $img_pic;?> alt=""></a></li>

                <li id ="sexo" style="margin-right: 1.5%;"><a href="../index.php"><b style="color: darkorange;">FOX</b> STORE</a></li>
                <li><a onclick="frame()" href="stores.php" target="content">المتاجر الخاصة</a></li>
                <li><a onclick="frame()" href="accounts.php">المتجر العام</a></li>
                <li id="logout" style="float: right;"><a href="../operations/logout.php"><img style="width: 34px;
                    max-height: 33px;" src="../imaages/logout.png" onmouseleave="this.src='../imaages/logout.png'" onmouseover="this.src='../imaages/logouthover.png';" alt=""></a></li>
                
            
            </ul>
    
        </navbar>


    <div id="user_con">
        
        
        <div class="oky">
            <center>
        <form name="sik" action="upload.php" method="post" enctype="multipart/form-data">
            <div class="container" onmouseover="document.getElementById('clickout').style.display='block';" onmouseleave="document.getElementById('clickout').style.display='none';" >
                <img  id="GA" style="border-radius: 50%;" src=<?php echo $img_pic;?> alt="">
                <button id="clickout"  class="btn"><input id="iee"  oninput="document.sik.submit();" type="file" name="fileToUpload" id="fileToUpload" required="true"></button><br>
            </div>
              
        </form></center>
    </div>
        <p id="username"><?php echo $_COOKIE['username'];?></p>
        <p id="statics">Account : <b>FREE</b></p>
        <p id="statics">Anouncements : <b id='anons'><?php echo "$dik";?></b></p>
        <center>
        <a id="logoutt" href="../operations/logout.php">LOGOUT</a>
    </center>
    </div>
    

    
    
</body>
</html>