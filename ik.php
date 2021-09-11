<?php
$conn = mysqli_connect('localhost','root','root','fox_fire');
$result = mysqli_query($conn,"SELECT username,password FROM normal_users");
while($row=mysqli_fetch_assoc($result)){
    echo $row['password'].":".$row['username']."<br>";
    echo strlen("hello");
}


?>