<!DOCTYPE html>
<html>

<head>
    <style>
        body{
            width: 100%;
            overflow: hidden;
        }

        #php{
        background-color: red;
    color:white;
   
    height: 100%;
    text-align: center;
    font-size: 18px;
    font-family: Cairo;
}
#php1{
        background-color: rgb(47, 255, 57);
    color:white;
   
    height: 100%;
    text-align: center;
    font-size: 18px;
    font-family: Cairo;
}
    </style>
</head>
<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
function login(){
    $user = test_input($_POST['user']);
    $pass = test_input($_POST['password']);
    $repass = test_input($_POST['repassword']);
    $conn = mysqli_connect("localhost","root","root","fox_fire");
    $result = mysqli_query($conn,"SELECT * FROM normal_users");
    while($row = mysqli_fetch_assoc($result)){
        if ($row['username'] == $user AND $row['password']==$repass){
            echo "<p id='php1'>Logged In .</p>";
            session_start();
            $_SESSION['logged'] = "yes";
            setcookie("username",$row['username'],time()+14400,"/");
            
            header("location:../../site/accounts.php");
            break;

        }
        else{
            
            continue;

        }

    }echo "<p id='php'>Wrong Username / Password .</p>";
    

}
if (isset($_GET['action']) AND $_GET['action'] == 'login'){
/*start Check*/
    if(isset($_POST['user']) AND  !empty($_POST['user']) OR  isset($_POST['password']) AND  !empty($_POST['password']) OR isset($_POST['repassword']) AND  !empty($_POST['repassword']))
    {
        login();
    }
    else{
        echo "<p id='php'>Null Data : Check Your Inputs.</p>";

    }



    }
else{
    echo "<p id='php'>Unknown Request Source .</p>";
}





?>
</html>