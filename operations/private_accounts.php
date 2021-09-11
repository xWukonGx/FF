<?php if(!isset($_COOKIE['username']) AND !isset( $_SESSION['logged'])){header("location:../index.php");}?>
<html>
    <head><link rel="stylesheet" href="../styles/accs.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
    
        <body style="overflow-y: auto;">

        <center>


<?php
$conn = mysqli_connect("localhost","root","root","fox_fire");
mysqli_set_charset($conn,"utf8");

echo $owner;
$sql = "SELECT * FROM accounts ORDER BY date DESC WHERE Owner=$owner ";
$result = mysqli_query($conn,$sql);
echo "<div class='lad' style='overflow-y:auto;'>";
function getDescription($key){
    $result2 = mysqli_query($conn,"SELECT DESCRIPTIION FROM accounts WHERE KEY=$key");
    while($rs = mysqli_fetch_assoc($result)){ 
        $description =  $rs["DESCRIPTIION"];
        break;
    }
    return $description;
}    
while($row = mysqli_fetch_assoc($result) ){
    $type = $row['TYPE'];
    $price = $row['Price'];
    $accto = $row['ACCTO'];
    $level = $row['LEVEL'];
    $desc = $row['DESCRIPTIION'];
    $owner_local = $row['Owner'];
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
<div class="cart">
            <table style="font-family:Cairo;">
                <tr >
                    <td id="#ima"><img src="../imaages/'.$img.'" alt=""></td>
                    <td style="cursor:grab; margin: 4% 9%;width: 100%;display: block;" class= "rev1" id="info'.$key.'" onclick="desc('.$key.');" id="info"><b>'.$type.' ACCOUNT</b><br>Level '.$level.'<br>Linked to '.$accto.'<br>Price : '.$price.' DA<br>Owner : '.$owner_local.'<br>'.$contact.'</td>
                    <center>
                    <td class="rev" id="'.$key.'" onclick="desc('.$key.');"  style="display:none;width: 100%;">'.$desc.'</td>
                    </tr>
            </table>
                
            </div>
';
}

echo "</div>";
            ?>
            <form id='siio' action="../operations/all_accounts.php" method="get">
            <input type="hidden" name="id" value=<?php echo $result1; ?>>
            <button id="nex" type="submit" id="Active" style="position: fixed;bottom: 0;right: 0; float:right;background-color: #222;color:white;border:1px solid darkorange;border-radius: 25px;margin-top:1%;margin-right:5%;font-family: Cairo;margin-bottom: 0;" >>></button>
            
        </form>

        

                    </center>
                    

    </body>
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
checkCartes();
</script>
    
</html>