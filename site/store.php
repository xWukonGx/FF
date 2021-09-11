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