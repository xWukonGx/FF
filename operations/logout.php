<?php
session_start();
setcookie("username","",0,"/");
header("location:../index.php");


?>