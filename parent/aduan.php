<?php

session_start();

//remarks: kena include hok one folder up sbb benda alah ni dalam folder
$currentUser = $_SESSION["currentUser"];
echo "
<script>         
    var globalCurrentUser = '".$currentUser."';  
    //alert('current session: ' + globalCurrentUser);
</script>";
include "common.php";
include "boot.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css>
    <title>Document</title>

    
    <style>
        h1 {text-align: center;
            margin-top: 50px;
            font-family: Marker Felt, fantasy;
            font-size: 50px;
    }
    .container{
        text-align: center;
    }
    textarea{
        width:100%;
        max-width: 900px;
        height:50%;
        max-height: 900px;
    }
    </style>
</head>
<body>
    <div class="header">
     

    <h1>Page Aduan</h1> 
    <a href="dashboard.php" class="cta">
    <polyline points="-8 -1 -12 -5 -8 -9"></polyline>
    <span>Back</span>
    <svg width="13px" height="10px" viewBox="0 0 13 10">
    <path d="M1,5 L11,5"></path>
    
  </svg>
</a>

    </div>
    <div>
        <div class= "container">
            <label for="inputTitle" style="font-size:25px;">Tajuk aduan: </label><br>
            <input type="text" id="inputTitle"style="width:50%; height:5%"><br>
            <div>
                <br><label for="inputDetails" style="font-size:25px;">Details: </label><br>
                <textarea placeholder="What's your problem?" id="inputDetails" cols="30" rows="10" style="vertical-align: middle;"></textarea>
            </div>
            <br><button id="btnSubmit" onclick="submitAduan()" class="button"><span>Hantar</span></button>
        </div>
    </div>
</body>
</html>