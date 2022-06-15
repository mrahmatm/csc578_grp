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
        window.onload   = fetchAllInvoice();
    </script>
</head>
<body>
    <h2>manage invoice</h2><br>
    <div>
        <table id="invoiceTable">
            <tr>
                <th>ID</th><th>BC</th><th>Year</th><th>Status</th><th>Attachment</th><th>Select</th>
            </tr>
        </table>
    </div>
    <br><div>
        <h5>actions (on selected invoices)</h5>
        <button onclick="alterInvoices('delete')">Delete</button>
        <br>
        <button onclick="alterInvoices('approved')">Approved</button>
        <br>
        <button onclick="alterInvoices('rejected')">Rejected</button>
        <br>
        <button onclick="alterInvoices('pending')">Pending</button>
    </div>
</body>
</html>