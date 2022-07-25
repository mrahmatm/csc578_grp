<?php
        include "common.php";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG MASUK</title>



</head>
<body>
    <style>
        body{
            background-image: url("lil.png");
            background-size: cover;
            color:black;
        }
        .container{
            text-align: center;


            
        }
        h2 {text-align: center;
            margin-top: 10px;
            font-family: 'Snell Roundhand, cursive';
            font-size: 50px;
            color:black;
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
        .button {
        display: inline-block;
        padding: 5px 10px;
        font-size: 20px;
        cursor: pointer;
        text-align: center;
        outline: none;
        color: black;
        background-color: grey;
        border: 2px solid #7a7a52;
        border-radius: 20px;
        box-shadow: 0 5px #b8b894;
        }

        .button:active {
        background-color: #f5deb3;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
        }
 
    </style>
    <div class="container">
    <img src="logo.png" alt="Logo Sekolah" width="200" height="200"  >
    <h2>e-PIBG</h2>
    <p>Sekolah Kebangsaan Seri Ampang</p>
                <label for="inputUsername">NAMA PENGGUNA: </label>
                <input type="text" id="inputUsername"><br> <br>
                <label for="inputPassword">KATA LALUAN: </label>
                <input type="password" id="inputPassword">
                <div class="radio">
                    <input type="radio" name="userType" value="staff" id="radStaff">
                    <label for="radStaff">Kakitangan</label> 
                    <input type="radio" name="userType" value="parent" id="radParent" style= "margin-left: 50px";>
                    <label for="radParent">Ibubapa</label>
                </div>
                <br>
                <button id="btnLogin" onclick="verifyLogIn()" class="button">log masuk</button>
            </div>
    </div>
</body>
</html>