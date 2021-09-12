<?php 
session_start();


?>
<html>
    <head>
        <title>المتجر</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="../styles/main_a.css">
        <script>
function AddAn(){
    var ie = document.getElementById("frame-cn").style.display="none";
    document.getElementById("se").style.display="block";
}
function CloseAn(){
    var ie = document.getElementById("frame-cn").style.display="block";
    document.getElementById("se").style.display="none";
}
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    
    <body>
        <?php
        function echResul(){
            echo '<style>
                @keyframes animates {
    from{ opacity: 0;}
    to{opacity: 1;}    
}
                </style>';
            if (isset($_GET['id'])){
                if ($_GET['id'] == 1){
                    $style = "color:white;
                    text-align: center;
                    font-family: Cairo;
                    border-radius:25px;
                    font-size:1vw;
                    opacity:0;
                    animation-name:animates;
                    animation-duration:1.5s;
                    padding : 3%;  
                    border: 1px solid rgb(0, 255, 0);";
                    echo "<br><center><span style='$style'>Added</span>";
                }
                else if ($_GET['id']){
                    $style = "color:white;
                    text-align: center;
                    font-family: Cairo;
                    animation-name:animates;
                    animation-duration:1.5s;

                    border-radius:25px;
                    font-size:1vw;
                    padding : 3%;
                      
                    border:1px solid rgb(255, 0, 0);";
                    echo "<br><center><span style='$style'>Error In Database</span>";

                }
            }
            else{
                echo "";
            }
        }
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
                $status = $row['private'];
                break;
            }
            $last = 3-$anons;
            $last1 = 999-$anons;
            
        }
        
    ?>
        <navbar>
            <ul>
                <li id="exo" style="margin-right: 1.5%; padding:0;"><a href="../site/account.php"><img style="width: 34px;height: auto;border-radius: 50%;max-height: 33px;" src=<?php echo $img_pic;?> alt=""></a></li>
                <li id ="sexo" style="margin-right: 1.5%;"><a href="../index.php"><b style="color: darkorange;">FOX</b> STORE</a></li>
                <li><a onclick="frame()" href="stores.php" >المتاجر الخاصة</a></li>
                <li><a onclick="frame()" href="accounts.php">المتجر العام</a></li>
                <li  style="float: right;"><?php

                    if ($last >= 3){
                            
                    }
                    else{
                        echo '<a onclick="AddAn()"><img  style="width: 34px;
                            max-height: 33px;padding: 4px;" id="addme" src="../imaages/addme.png"  ></a>';
    
                    }
                    ?></li>
                <li id="logout" style="float: right;"><a href="../operations/logout.php"><img style="width: 34px;
                    max-height: 33px;padding: 4px;" src="../imaages/logout.png" onmouseleave="this.src='../imaages/logout.png'" onmouseover="this.src='../imaages/logouthover.png';" alt=""></a></li>

            
            </ul>
    
        </navbar>
        
        <div class="user_cont">
            <center>

            <img style="max-height: 200px;" src=<?php echo $img_pic;?>  alt="">
    </center>
            
            <p id="username"><?php echo $_COOKIE['username'];?></p>
            <?php if($status == 1){$dik = "$last1";$contpaid = "Private Store";}else{$dik = "$last/3";$contpaid = "FREE";}?>
            <p id="statics">Account : <b><?php echo $contpaid;?></b></p>
                    
            <p id="statics">Anouncements : <b id="anons"><?php echo "$dik";?></b></p>

            <center><br>
                <?php
                if ($status == 1){
                    echo '<button id="addmas" onclick="AddAn()" style="padding:1% 12%;color:white;border:tomato 1px solid;border-radius:25px;background-color: #222;">Add</button>';

                }
                else{
                if ($last >= 3){
                        
                }
                else{
                    echo '<button id="addmas" onclick="AddAn()" style="padding:1% 12%;color:white;border:tomato 1px solid;border-radius:25px;background-color: #222;">Add</button>';
                }
                }
                ?>
            </center>
            <?php echResul();?>
        </div>
        <center>
        <div id="se">
            <form id="ddos" method="POST" action="../operations/add.php"  oninput="x.value=parseInt(a.value)">
                <div class="io">
                    <a style="background-color: transparent;padding: 0.1% 1.5%;border: none;float: right;" onmouseleave="this.style.backgroundColor='#222'" onmouseover="this.style.backgroundColor='red';" onclick="CloseAn()">X</a>
                <span style="font-family: 'Courier New', Courier, monospace; font-size: 20px; color: white;">Level </span><output style="font-family: 'Courier New', Courier, monospace;font-size: 20px; color: darkorange;" name="x" for="a b"></output></o>&NonBreakingSpace;&nbsp;&nbsp;&nbsp;<input id="range" type="range" id="a" name="a" value="0">
    
                  
                <br><input required="true" placeholder="السعر بالدينار الجزائري" style="margin-top: 4%;" type="text" maxlength="5" name="price" id=""><br>
                    <select class="resultii" oninput="checkInput();" required="true"  style="margin-top: 2%;" id="type" name="type"><br>
                        <option  value="FREE FIRE">فري فاير</option>
                        <option value="PUBG" >بوبجي</option>
                        <option value="COD">كول أوف ديوتي</option>
                        <option value="SPOTIFY">سبوتيفاي</option>
                        <option value="NETFLIX">نتفليكس</option>
                        </select>
                        <br>
                    <select class="linko" required style="margin-top: 2%;" id="type" name="accto"><br>
                        <option value="Unknown">  .. مربوط بحساب</option>
                        <option value="FACEBOOK">FACEBOOK</option>
                        <option value="GMAIL">GMAIL</option>
                        <option value="Unknown">Other</option>
                        </select><br>
                        <input required="true" style="margin-top: 2%;" maxlength="34" placeholder="رقم الهاتف او الايميل"  type="text" name="contact" id=""><br>
                        <textarea onload="this.focus();" rows="10" cols="30" style="margin-top: 2%;" maxlength="99" required="true" name="desciption" id="desc">لا يوجد وصف</textarea><br>
                        
                  <br><br><input type="submit" value="اضافة اعلان">
                </form>
        </div>
    </center>
        <div id="frame-cn" class="accounts_cont">
            <iframe id="tiko" src="../operations/all_accounts.php?id=0" ></iframe>
        </div>
        <script src="../js/ss.js"></script>
    </body>


</html>