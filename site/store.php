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




    <body>
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
        <div id="ll">
        <div id="i"><p style="color:white;border-bottom: 1px solid white;">STORE</p></div>

        </div>
        <?php
        $conn = mysqli_connect("localhost","root","root","fox_fire");

        $sql = "SELECT * From private_stores ";
    mysqli_set_charset($conn,"utf8");
            $result = mysqli_query($conn,$sql);
            
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
    

    <div style="float:none;" id="ss" class="card">
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
        </div></div>';break;
    }



    ?>
    <div id="i"><p style="color:white;border-bottom: 1px solid white;">Accounts</p></div>
    <br>
<br>
<center>
        <?php
        
        
        function checkPrivate(){
            $conn = mysqli_connect("localhost","root","root","fox_fire");
        $sql = "SELECT * FROM normal_users WHERE private='1'";
        $owner2 = $_GET['store'];

            $resultp = mysqli_query($conn,$sql);
            $sik = false;
            while($row = mysqli_fetch_assoc($resultp)){
                if($owner2 == $row['username']){
                    $sik =true;;
                    break;
                }
                else{

                }
            }
            return $sik;

        }
        function getAllAccounts(){
            $conn = mysqli_connect("localhost","root","root","fox_fire");
            $owner2 = $_GET['store'];
        $sql = "SELECT * FROM accounts WHERE Owner='$owner2'";
        
        $resultp = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($resultp) ){
            $type = $row['TYPE'];
            $price = $row['Price'];
            $accto = $row['ACCTO'];
            $level = $row['LEVEL'];
            $desc = $row['DESCRIPTIION'];
            $owner = $row['Owner'];
            $key = $row['KEY'];
            $contact = $row['contact'];
            
            
            if ($row['TYPE'] == "FREE FIRE"){
                $img = "ff.jpg";
            
            }
            elseif ($row['TYPE']== "PUBG"){
                $img = "pubg.jpg";
            }
            elseif($row['TYPE'] == "COD"){
                $img = "cod.jpg";
            }
            elseif($row['TYPE'] == "NETFLIX"){
                $img = "netflix.png";
            }
            elseif($row['TYPE'] == "SPOTIFY"){
                $img = "spotify.png";
            }
            
        echo '
        <div  class="cart">
                    <table style="font-family:Cairo;">
                        <tr >
                            <td id="#ima"><img src="../imaages/'.$img.'" alt=""></td>
                            <td style="cursor:grab; margin: 4% 9%;width: 100%;display: block;" class= "rev1" id="info'.$key.'" onclick="desc('.$key.');" id="info"><b>'.$type.' ACCOUNT</b><br><span style="color:white;">Level '.$level.'<br>Linked to '.$accto.'<br>Price : '.$price.' DA<br>Owner : '.$owner.'<br>'.$contact.'</span></td>
                            <center>
                            <td class="rev" id="'.$key.'" onclick="desc('.$key.');"  style="display:none;width: 100%;">'.$desc.'</td>
                            </tr>
                    </table>
                        
                    </div>
        ';
        }
       
        }
        if(checkPrivate()){
            getAllAccounts();
        }
        else{
            header("location:stores.php");
        }
        
        
        ?>
</center>
    </div>
    <script>
function aCopy(IDs){
  /*var sio = document.getElementById(ID);*/
  var ID = document.getElementById(IDs);
  ID.select();
  ID.setSelectionRange(0, 99999); 

 
  document.execCommand("copy");

  alert("Copied the text: " + ID.value);
}
function desc(key){
    document.getElementById("info"+key.toString()).style.width="100%";
    if (document.getElementById(key.toString()).style.display=="none"){
        document.getElementById("info"+key.toString()).style.display = "none";
        document.getElementById(key.toString()).style.display="block";
    }
    else{
        document.getElementById("info"+key.toString()).style.display = "block";
        document.getElementById(key.toString()).style.display="none";
    }
        
    
}
function checkCartes(){
    var y = document.getElementsByClassName("cart");
    
    if(y.length == 0){
        document.getElementsByTagName("body")[0].style.overflow="hidden";
        document.write("<center><span style='position:fixed;top:48%;bottom:48%;right:0;left:0;'>لا توجد حسابات</span>");
        document.getElementById("nex").style.display="none";
    }
    else{

    }
    

}

</script>
        </body>
</html>