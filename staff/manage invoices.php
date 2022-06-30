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
        window.onload = function(){
            fetchAllInvoice();
}
    </script>
</head>
<body>
    <h2>manage invoice</h2><br>
    <label for="inputSearch">Search:</label>
    <input type="text" id="inputSearch" onkeyup="fetchAllInvoice()" autofocus>
    <label for="inputSearch"> (by student BC)</label><br>
    <label for="sortType">Sort by: </label>
    <select name="sortType" id="sortType" onchange="fetchAllInvoice()">
        <option value="-" selected>-</option>
        <option value="student_BC">BC</option>
        <option value="invoice_year">Year</option>
        <option value="invoice_status">Status</option>
    </select><br>
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
    <br><div>
        <h5>generate yearly invoice</h5>
        <label for="inputYear">Enter Year: </label>
        <input type="number" min="2022" max="2050" step="1" value="2022" id="inputYear" />
        <button id="btnGenerateInvoices" onclick="generateInvoices()">Generate</button>
    </div>
    <br><br>
    <button onclick="createModal()">Test modal</button>
</body>
</html>