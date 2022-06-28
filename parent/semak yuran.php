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
        window.onload = fetchChildren('none');
        window.onload = fetchInvoice();
    </script>
</head>
<body>
    <h1>semak yuran baq hang</h1><br>
    <div>
        <h5>ni anak2 kau</h5><br>
        <div>
            <table id="childrenTable">
                <tr>
                    <th>Name</th><th>BC</th>
                </tr>
            </table><br>
            <p>bukan anak kau? ha pegi sini <a href="edit account.php">[link]</a></p>
        </div>
        <div>
            <h5>list semua invoice anak2:</h5>
            <table id="billTable">
                <tr>
                    <th>ID</th><th>Year</th><th>BC</th><th>Name</th><th>Status</th>
                </tr>
            </table><br>
        </div>
        <div>
            <h5>list tahun2</h5>
            <table id="billYearTable">
                <tr>
                    <th>Year</th><th>Action</th>
                </tr>
            </table>
            <button>Submit</button>
        </div>
    </div>
</body>
</html>