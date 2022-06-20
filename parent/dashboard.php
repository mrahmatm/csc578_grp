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
        //echo "<script>alert('current session: ' + ".$currentUser.")</script>";
    ?>
    <style>
        h1 {text-align: center;
            margin-top: 50px;
            font-family: 'Courier New', monospace;
            font-size: 50px;
        }
        .container{
        width: 100%;
        float: left;
        text-align: center;
        }
        .container button{
        display: inline-block;
        }       
        a.butang:link{
            color: #fb3f00;
            text-decoration: none;
        }
        a.butang:visited
        {
        color: black;
        text-decoration: none;
        }
        a.butang:hover
        {
        color: #fb3f00;
        text-decoration: none;
        }


    </style>
</head>
<body>
    <div>
    <h1>Parent's Dashboard</h1>
    </div>
        <div class="container" class="box">
            <button>
            <a href="aduan.php" class="butang" id="btn1">Aduan</a><br>
            </button>
            <button>
            <a href="semak yuran.php" class="butang">Semakan Yuran</a><br>
            </button>
            <button>
            <a href="edit account.php" class="butang" id="btn3">Edit Account</a>
            </button>
            <br>
        </div>
    <div>
        <button id="btnLogout" onclick="logOut()">Log Out</button>
    </div>
</body>
</html>