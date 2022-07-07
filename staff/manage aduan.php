<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
</head>
<body>
    <h2>manage aduan</h2>
    <div>
        <button id="btnRefresh" onclick="fetchAduan()">Refresh</button><br>
        <label for="displayLimiter">Displaying the first </label>
        <input type="number" step="5" min="10" value="10" id="displayLimiter">
        <label for="displayLimiter"> entries.</label>
        <div>
            <table id="tableAduan" class="table">
                <th>ID</th><th>Title</th><th>Username</th><th>Description</th>
            </table>
        </div>     
    </div>
</body>
</html>