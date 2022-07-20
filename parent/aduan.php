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
    </style>
</head>
<body>
    <h1>Page Aduan</h1>
    <div>
        <div class= "container">
            <label for="inputTitle">Tajuk aduan: </label><br>
            <input type="text" id="inputTitle"><br>
            <div>
                <br><label for="inputDetails">Details: </label><br>
                <textarea id="inputDetails" cols="30" rows="10" style="vertical-align: middle;"></textarea>
            </div>
            <br><button id="btnSubmit" onclick="submitAduan()">Hantar</button>
        </div>
    </div>
</body>
</html>