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
        body{
            background-image: url("web.jpg");
            background-color: #cccccc;
        }
        .container{
            margin-left:100px;
            text-align: center;
            font-size: 18px;

            
        }
        h1 {text-align: center;
            margin-top: 40px;
            font-family: 'Courier New', monospace;
            font-size: 100px;
        }
        img{
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .radio{
            font-size: 19px;
            margin-top: 10px;

        }
 
    </style>
    <div>
        <h1>SKSA</h1>
        <img src="logo.png" alt="Logo Sekolah" width="150" height="150"  >
            <div class="container">
                <label for="inputUsername">Username: </label>
                <input type="text" id="inputUsername"><br> <br>
                <label for="inputPassword">Password: </label>
                <input type="password" id="inputPassword">
                <div class="radio">
                    <input type="radio" name="userType" value="staff" id="radStaff">
                    <label for="radStaff">Staff</label> 
                    <input type="radio" name="userType" value="parent" id="radParent" style= "margin-left: 50px";>
                    <label for="radParent">Parent</label>
                </div>
                <br>
                <button id="btnLogin" onclick="verifyLogIn()">Submit</button>
            </div>
    </div>
</body>
</html>