
<?php
session_start();
if (!isset($_COOKIE['username'])){
    header("location:../index.php");
}

$level = test_input($_POST['a']);
$price =test_input($_POST['price']);
$type = test_input($_POST['type']);
$accto = test_input($_POST['accto']);
$contact = test_input($_POST['contact']);
$desc = test_input($_POST['desciption']);
$owner = test_input($_COOKIE['username']);

echo "<meta charset='utf-8'>";
$conn = mysqli_connect("localhost","root","root","fox_fire") or die("Problem In Connection to the database.");
mysqli_set_charset($conn,"utf8");

    $username = $_COOKIE['username'];
    
            
    while($row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM normal_users WHERE username='$username'"))){
        $anons = $row['anouncements'];
        break;
    }
    $last = $anons-1;
    echo "UPDATE accounts SET anouncements=$last WHERE username=$username";
    mysqli_query($conn,"UPDATE normal_users SET anouncements=$last WHERE username='$username'");
    $result = mysqli_query($conn,"INSERT INTO accounts (TYPE,Price,ACCTO,LEVEL,DESCRIPTIION,Owner,contact,date) VALUES ('$type','$price','$accto','$level','$desc','$owner','$contact',NOW() );");
    if($result){
      
       header("location:../site/accounts.php?id=1");

    }
    else{
        
        
     header("location:../site/accounts.php?id=2");
   
    }
    mysqli_close($conn);
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>