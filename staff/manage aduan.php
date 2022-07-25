<?php

session_start();
include "common.php";
include "designAduan.php";
//remarks: kena include hok one folder up sbb benda alah ni dalam folder
$currentUser = $_SESSION["currentUser"];
echo "
<script>
    //alert('current session: ' + '".$currentUser."');
    var globalCurrentUser = '".$currentUser."';  
</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>manage aduan</title>


    <script>
        window.onload = function(){
            fetchAduan();
}
        window.setInterval(function(){
            fetchAduan();
        }, 3000);
    </script>
    <style>
        body{
            background-color: #8b4513; 
            background-size: cover;
            color: white;
            
        }

h1 {text-align: right;
            margin-top: 20px;
            font-family: Impact, fantasy;
            font: size 42px;
            
        }
</style>

</head>
<body>
<div class="header">
<h1>SENARAI ADUAN</h1>
    <a href="dashboard.php" class="cta">
    <polyline points="-8 -1 -12 -5 -8 -9"></polyline>
    <span>KEMBALI</span>
    <svg width="13px" height="10px" viewBox="0 0 13 10">
    <path d="M1,5 L11,5"></path>
    </svg>
</a>
</div>
    <div>
        <br>
        <label for="displayLimiter">Papar </label>
        <input type="number" step="5" min="10" value="10" id="displayLimiter">
        <label for="displayLimiter"> pertama.</label>
        <br>
        <button id="btnRefresh" onclick="fetchAduan()" class="btn"><i class="fa fa-refresh"></i></button><br>
        <div>
            <table id="tableAduan" class="table1">
                <tr>
                    <th>ID</th>
                    <th>Tajuk</th>
                    <th>Nama Pengguna</th>
                    <th>Keterangan</th>
                </tr>
            </table>
        </div>     
    </div>
</body>
</html>