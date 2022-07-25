<?php
        include "common.php";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>



    <style>
        body{
            background-image: url("indexp.png");
            background-repeat: no-repeat;
            background-attachment: fixed; 
            background-size: cover;
        }
        h2{text-align: center;
            margin-top: 15px;
            font-family: 'Snell Roundhand, cursive';
            font-size: 100px;
        }
        .container{
            text-align: center;

        }
    
        img{
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .space {
        width: 150px;
        height: auto;
        display: inline-block;
        }

        .button {
        display: inline-block;
        padding: 5px 10px;
        font-size: 20px;
        cursor: pointer;
        text-align: center;
        outline: none;
        color: white;
        background-color: #6b8e23;
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

        table {
        border-collapse: collapse;
        width: 100%;
        text-align: center;
        
        }

    </style>
</head>
<body>
<div class="container" > 
<img src="logo.png" alt="Logo Sekolah" width="200" height="200"  >
    <h2>e-pibg</h2>
    <p>Sekolah Kebangsaan Seri Ampang</p>
        <a href="log in.php" ><button class="button"><span><b>LOG IN</b></span></button></a> 
        <a href="sign up.php"><button class="button"><span><b>SIGN UP</b></span></button></a> 
    
</div> 
</body>
</html>