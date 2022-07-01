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
</head>
<body>
    <h1>staffs's dashboard</h1>
    <a href="manage aduan.php">go to manage aduan</a>
    <br>
    <a href="manage invoices.php">go to manage invoices</a>
    <br>
    <a href="manage student.php">go to manage student</a>
    <br>
    <button id="btnLogout" onclick="logOut()">Log Out</button>
</body>
</html>