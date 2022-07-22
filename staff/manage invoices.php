<?php

session_start();
include "common.php";
include "designInvoices.php";
//remarks: kena include hok one folder up sbb benda alah ni dalam folder
$currentUser = $_SESSION["currentUser"];
echo "
<script>
    //alert('current session: ' + '".$currentUser."');
    var globalCurrentUser = '".$currentUser."';  
</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>PENGURUSAN INVOICE</title>
    <style>
        body{
            background-color: #b0c4de; 
            background-size: cover;
            color: black;
            
        }

        </style>


    <script>
        window.onload = function(){
            fetchAllInvoice();
}
    </script>
</head>
<body>
<div class="header">
<h1>PENGURUSAN INVOICE</h1>
    <a href="dashboard.php" class="cta">
    <polyline points="-8 -1 -12 -5 -8 -9"></polyline>
    <span>Back</span>
    <svg width="13px" height="10px" viewBox="0 0 13 10">
    <path d="M1,5 L11,5"></path>
    </svg>
</a>
</div>
<br>
<table>
    <th><label for="inputSearch">Search:</label>
    <br><input type="text" id="inputSearch" onkeyup="fetchAllInvoice()" autofocus>
    <label for="inputSearch"> (by student BC)</label><br></th>
    <th><label for="sortType">Sort by: </label></th>
    <th><select name="sortType" id="sortType" onchange="fetchAllInvoice()">
        <option value="-" selected>-</option>
        <option value="student_BC">BC</option>
        <option value="invoice_year">Year</option>
        <option value="invoice_status">Status</option>
    </select><br></th>
</table>

</div>
<br>
<label for="chkSelectAll">Select All </label><input type="checkbox" id="chkSelectAll" onchange="selectAllChk('chkSelectInvoice')">
<br><br>
    <div>
        <table id="invoiceTable" class="table1">
            <tr>
                <th>ID</th><th>BC</th><th>Year</th><th>Status</th><th>Attachment</th><th>Select</th>
            </tr>
        </table>
    </div>
    <br><div class="box">
        <h5 >actions (on selected invoices)</h5>
        <table class="table2">
            <th>
        <button onclick="alterInvoices('delete')" class="btn"><i class="fa fa-trash"></i> delete</button>
        </th>
        <th><button onclick="alterInvoices('approved')" class="btn"><i class="fa fa-check"></i> Approved</button>
        </th>
        <th><button onclick="alterInvoices('rejected')" class="btn"><i class="fa fa-ban fa-fw"></i>Rejected</button>
        </th>
        <th><button onclick="alterInvoices('pending')"  class="btn"><i class="fa fa-clock-o fa-fw"></i>Pending</button>
</table>
    </div>
    <br><div class="box">
        <h5 text_align= center > GENERATE YEARLY INVOICE</h5>
        <label for="inputYear">Enter Year: </label>
        <input type="number" min="2022" max="2050" step="1" value="2022" id="inputYear" />
        <button id="btnGenerateInvoices" onclick="generateInvoices()" class="btn">Generate</button>
    </div>
    <br><br>
    <button onclick="createModal()">Test modal</button>
</body>
</html>