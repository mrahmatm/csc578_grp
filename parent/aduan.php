<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    ?>
    
</head>
<body>
    <h1>page aduan</h1>
    <div>
        <div>
            <label for="inputTitle">Tajuk aduan: </label>
            <input type="text" id="inputTitle"><br>
            <div>
                <label for="inputDetails">Details: </label>
                <textarea id="inputDetails" cols="30" rows="10" style="vertical-align: middle;"></textarea>
            </div>
            <button id="btnSubmit" onclick="submitAduan()">Hantar</button>
        </div>
    </div>
</body>
</html>