<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
        include "common.php";
    ?>

</head>
<body>
    <style>
        
    </style>
    <div>
            <div>
                <label for="inputUsername">Username: </label>
                <input type="text" id="inputUsername">
                <label for="inputPassword">Password: </label>
                <input type="password" id="inputPassword">
                <div>
                    <input type="radio" name="userType" value="staff" id="radStaff">
                    <label for="radStaff">Staff</label>
                    <input type="radio" name="userType" value="parent" id="radParent">
                    <label for="radParent">Parent</label>
                </div>
                <button id="btnLogin" onclick="verifyLogIn()">Submit</button>
            </div>
    </div>
</body>
</html>