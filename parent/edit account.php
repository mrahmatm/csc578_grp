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
    <h5>update account page</h5>
    <div>
        <input type="checkbox" id="toggleEdit">
        <label for="toggleEdit">Edit Credentials</label><br>
        <label for="inputName">Name: </label>
        <input type="text" id="inputName" disabled>
        <label for="inputIC">IC: </label>
        <input type="text" id="inputIC" disabled>
        <label for="inputEmail">Email: </label>
        <input type="text" id="inputEmail" disabled>
        <label for="inputPhone">Phone Number: </label>
        <input type="text" id="inputPhone" disabled>
        <label for="inputPassword">Password: </label>
        <input type="password" disabled>
    </div>
</body>
</html>