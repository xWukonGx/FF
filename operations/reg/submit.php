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

$io = test_input($_GET['action']);
function checkUser(){
    $user = test_input($_POST['user']);

    if ($user != null){
        return true;
    }
    else {return false;}
}
function checkPass(){
    $pass = test_input($_POST['password']);
    if ($pass != null){
        return true;
    }
    else{
        return false;
    }
}
function checkRePass(){
    $repass = test_input($_POST['repassword']);
    if ($repass != null){
        return true;
    }
    else{
        return false;
    }
}
function checkEmail(){
    $email = test_input($_POST['email']);
    if ($email != null){
        return true;
    }
    else{
        return false;
    }
}
function checkPasswords(){
    $pass = test_input($_POST['password']);
    $repass = test_input($_POST['repassword']);
    if($pass != $repass){
        return false;
    }
    else {
        return true;
    }

}
function checkEmpty(){
 if (checkUser() ){
    return true;
 }
 else{
    echo "<p id='php'>Null Data : Username Is Empty.</p>";
    return false;

 }
 if (checkEmail()){
    return true;
 }
 else{
    echo "<p id='php'>Null Data : Email Is Empty.</p>";
    return false;

 }
 if(checkPass()){
     return true;
 }
 else{
    echo "<p id='php'>Null Data : Password Is Empty.</p>";
    return false;

 }
 if (checkRePass() AND checkPasswords()){
    return true;
 }
 else{
    echo "<p id='php'>Null Data : Passwords Is not Equal.</p>";
    return false;

 }
}
function signup(){
    $conn = mysqli_connect("localhost","root","root","fox_fire") or die("Problem In Connection to the database.");
    $ID = test_input($_POST['user'])."_fox";
    $user = test_input($_POST['user']);
    $email = test_input($_POST['email']);
    $pass = test_input($_POST['password']);
    
    if(mysqli_query($conn,"INSERT INTO normal_users (ID,username,email,password,anouncements) VALUES ('$ID','$user','$email','$pass',3)")){
        return true;

    }
    else{
        return false;
    }
    mysqli_close($conn);
    
}
function checkSame(){
    $conn = mysqli_connect("localhost","root","root","fox_fire");
    $result = mysqli_query($conn,"SELECT * FROM normal_users");
    $si = true;
    while($row = mysqli_fetch_assoc($result)){
        if ($row['username'] == test_input($_POST['user']) OR $row['email']==test_input($_POST['email'])){
            
            $si = false;
            break;

        }
        else{
            
            

        }
        

}
return $si;

}
function checkLength(){
    if(strlen(test_input($_POST['user'])) <= 3 OR strlen(test_input($_POST['password'])) <= 6 ){
        return false;
    }
    elseif (strlen(test_input($_POST['email'])) <= 10){
        return false;
    }
    else{
        return true;
    }
}
if (isset($io) AND $io == 'regist'){
    if(checkEmpty()){

    
            if (checkLength()){
                if(checkSame()){
                    if(signup()){
                        mkdir("../../site/user_photo/".$_POST['user']);
                        
                        echo "<p id='php1'>Account Registred Please Verify Email .</p>";

                    }
                }
                else{
                    echo "<p id='php'>Same Data in the Database .</p>";
                }


            }
            else{
                echo "<p id='php'>Invalid Data : Username Must be above 4 characters / Password above 6 / Email Invalid.</p>";
            }

    }
    else{
        echo "<p id='php'>Invalid Data : Check Your Inputs.</p>";
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }