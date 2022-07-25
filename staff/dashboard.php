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
    <title>Dashboard staff</title>



<style>
body{
            background-image: url("dashboard.png");
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: cover;
            
        }
        .container{
            margin-left:100px;
            text-align: center;
            font-size: 18px;

            
        }

h1 {text-align: center;
            margin-top: 50px;
            font-family: Marker Felt, fantasy;
            font-size: 50px;
            
        }
        .container{
        width: 100%;
        float: left;
        text-align: center;
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
  background-color: #f5deb3;
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
</head>
<body>
  
</div>
        <div class="container" >
    <h1>e-Pibg</h1>
    <br><br><br>
    <a href="manage aduan.php"><button class="button"><span><b>PENGURUSAN ADUAN</b></span></button></a>
    <br><br>
    <a href="manage invoices.php"><button class="button"><span><b>PENGURUSAN INVOICES</b></span></button></a>
    <br><br>
    <a href="manage student.php"><button class="button"><span><b>PENGURUSAN PELAJAR</b></span></button></a>
    <br><br>
</div>
<button id="btnLogout" onclick="logOut()">Log keluar</button>

</body>
</html>