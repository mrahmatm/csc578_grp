<?php
        session_start();
        include "common.php";
        //remarks: kena include hok one folder up sbb benda alah ni dalam folder
        $currentUser = $_SESSION["currentUser"];
        //echo "<script>alert('current session: ' + ".$currentUser.")</script>";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
    body{
            background-image: url("dashboard.png");
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: cover;
            
        }
        
    h1 {text-align: center;
            margin-top: 50px;
            font-family: Marker Felt, fantasy;
            font-size: 50px;
    }
    .container{
            margin-left:100px;
            text-align: center;
            font-size: 18px;
    }
    .button {
  display: inline-block;
  padding: 5px 10px;
  font-size: 20px;
  cursor: pointer;
  text-align: center;
  outline: none;
  color: #f4a460;
  background-color: #8b4513;
  border: 2px solid #7a7a52;
  border-radius: 20px;
  box-shadow: 0 5px #b8b894;
}


.button:hover {
  background-color: #a9a9a9;
  color: black;
}

.button:active {
  background-color: #088A08;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
    
</style>


    </style>
</head>
<body>
    <div>
    <h1>Parent's Dashboard</h1>
    </div>
    <div class="container" class="box">
        <br><br><br>
            <a href="aduan.php"><button class="button"><span><b>Aduan</b></span></button></a>
            <br><br>
            <a href="semak yuran.php"><button class="button"><span><b>Semakan Yuran</b></span></button></a>
            <br><br>
            <a href="edit account.php"><button class="button"><span><b>Edit Account</b></span></button></a>
            <br><br><br><br><br>
            <button id="btnLogout" onclick="logOut()" class="button"><b>Log Out</b></button>
            <br>
        </div>
    <div>
        
    </div>
</body>
</html>