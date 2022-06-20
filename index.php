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

    <style>
        body{
            background-image: url("web.jpg");
            background-color: #cccccc;
        }
        h1 {text-align: center;
            margin-top: 50px;
            font-family: 'Courier New', monospace;
            font-size: 100px;
        }
        .container{
            text-align: center;
        }
        a.nav-link:link
        {
        color: #fb3f00;
        text-decoration: none;
        }
        a.nav-link:visited
        {
        color: #fb3f00;
        text-decoration: none;
        }
        a.nav-link:hover
        {
        color: #fb3f00;
        text-decoration: none;
        }
        a.nav-link:active
        {
        color: #fb3f00;
        text-decoration: none;
        }    
        button{

            width: 150px;
            height: 50px;
            font-size: 20px;
            display: inline-block;
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
    </style>
</head>
<body>
    


    <h1>SKSA</h1>
    <img src="logo.png" alt="Logo Sekolah" width="200" height="200"  >
    <div class="container" style="margin-left: 105px">    
        <button>
        <a href="log in.php" class="nav-link">Log In</a>    
        </button>

        <button>
        <a href="sign up.php" class="nav-link">Sign Up</a>
        </button>
    </div> 
</body>
</html>