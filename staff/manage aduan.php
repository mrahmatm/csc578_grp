<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>manage aduan</title>

    <?php

        session_start();
        include "common.php";
        //remarks: kena include hok one folder up sbb benda alah ni dalam folder
        $currentUser = $_SESSION["currentUser"];
        echo "
        <script>
            //alert('current session: ' + '".$currentUser."');
            var globalCurrentUser = '".$currentUser."';  
        </script>";
    ?>
    <script>
        window.onload = function(){
            fetchAduan();
}
        window.setInterval(function(){
            fetchAduan();
        }, 3000);
    </script>
    <style>
.header{
  background-color: purple;
  color: beige;
  padding: 30px;
}

body{
            background-color: #191970;
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: cover;
            color: white;
            
        }
.btn {
  background-color:black ;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: purple;
}

table {
  border-collapse: collapse;
  width: 100%;
  color:white;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  color:white;
}

tr:hover {background-color:#8a2be2;}

h1 {text-align: left;
            margin-top: 20px;
            font-family: Impact, fantasy;
            font: size 42px;
            
        }
</style>
</head>
<body>
<div class="header">
<h1>SENARAI ADUAN</h2>
  
</div>
    <div>
        <br>
        <label for="displayLimiter">Displaying the first </label>
        <input type="number" step="5" min="10" value="10" id="displayLimiter">
        <label for="displayLimiter"> entries.</label>
        <br>
        <button id="btnRefresh" onclick="fetchAduan()" class="btn"><i class="fa fa-refresh"></i></button><br>
        <div>
            <table id="tableAduan" class="table">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Username</th>
                    <th>Description</th>
                </tr>
            </table>
        </div>     
    </div>
</body>
</html>