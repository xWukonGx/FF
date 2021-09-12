
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
<!DOCTYPE html>
<html>
    <head>
        <title></title>
  
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        <link rel="stylesheet" href="../styles/main_a.css">
    
    </head>




    <body onload="checkareas();" >
    <navbar>
            <ul>
                <li id="exo" style="margin-right: 1.5%; padding:0;"><a href="../site/account.php"><img style="width: 34px;height: auto;border-radius: 50%;max-height: 33px;" src=<?php echo $img_pic;?> alt=""></a></li>
                <li id ="sexo" style="margin-right: 1.5%;"><a href="../index.php"><b style="color: darkorange;">FOX</b> STORE</a></li>
                <li><a onclick="frame()" href="stores.php" >المتاجر الخاصة</a></li>
                <li><a onclick="frame()" href="accounts.php">المتجر العام</a></li>
         
                <li id="logout" style="float: right;"><a href="../operations/logout.php"><img style="width: 34px;
                    max-height: 33px;padding: 4px;" src="../imaages/logout.png" onmouseleave="this.src='../imaages/logout.png'" onmouseover="this.src='../imaages/logouthover.png';" alt=""></a></li>

            
            </ul>
    
        </navbar>

                    <div class="intro">
                    <div id="contenti">
                            <h2 ><span id="resp"> Welcome To </span><b>Stores</b> Area</h2>

    <p style="
    
    overflow-wrap: break-word;
    margin: 2% auto;
    font-size: 19px;
">نحن نوفر لك متجر الكتروني خاص بك لتسهيل وصول العملاء الى حساباتك المعروضة مع خاصية الاعلانات غير المحدودة مع عرض جهات الاتصال الخاصة بك لهم .</p>


<div id="links">                     
<a class="fa fa-facebook" href="https://web.facebook.com/mehdi.bf.5283"></a>
<a class="fa fa-google" href="mailto:pog2py@gmail.com"></a>
</div>   
</div>
                    </div>
    <?php
    $sql = "SELECT * From private_stores ";
    mysqli_set_charset($conn,"utf8");
            $result = mysqli_query($conn,$sql);
            echo '<br><span id="category">STORES</span>';
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['store_name'];
        $key = $row['KEY'];
        $owner = $row['OWNER'];
        
        $facebook_url = $row['FACEBOOK'];
        $email_te = $row['EMAIL'];
        $number = $row['Phone_number'];
        $store_image = $row['store_image'];
        $descrip = $row['descrip'];
        $puted = $row['puted_accounts'];
        
    echo '
    
   
    <div style="margin-top:1%;" class="card">
            <img src="'.$store_image.'" alt="">
            <div id="inf">
                <a href="store.php?store='.$owner.'"><h1>'.$title.'<span style="color:darkorange;"> Store</span></h1></a>
                <p id="own">'.$owner.'</p>
                <p>Accounts : <span style="color:darkorange;">'.$puted.'</span> </p></p>
            <p>'.$descrip.'</p>
            <div id="social">
                <a class="fa fa-facebook" href="'.$facebook_url.'"></a>
                <a class="fa fa-google" href="mailto:'.$email_te.'"></a>
               <a class="fa fa-phone" href="tel:+'.$number.'"></a>
            </div>
        </div></div>';
    }
    ?>
<p id="fook">CODED BY WUKONG</p>
        
        
        
        <script src="../js/ss.js"></script>
        
    </body>
</html>