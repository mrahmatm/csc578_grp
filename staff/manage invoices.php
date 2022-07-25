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
    <title>PENGURUSAN INVOIS</title>
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
<h1>PENGURUSAN INVOIS</h1>
    <a href="dashboard.php" class="cta">
    <polyline points="-8 -1 -12 -5 -8 -9"></polyline>
    <span>Kembali</span>
    <svg width="13px" height="10px" viewBox="0 0 13 10">
    <path d="M1,5 L11,5"></path>
    </svg>
</a>
</div>
<br>
<table>
    <th><label for="inputSearch">Carian:</label>
    <br><input type="text" id="inputSearch" onkeyup="fetchAllInvoice()" autofocus>
    <label for="inputSearch"> (melalui no sijil kelahiran pelajar:)</label><br></th>
    <th><label for="sortType">susunan melalui: </label></th>
    <th><select name="sortType" id="sortType" onchange="fetchAllInvoice()">
        <option value="-" selected>-</option>
        <option value="student_BC">No sijil kelahiran</option>
        <option value="invoice_year">Tahun</option>
        <option value="invoice_status">Status</option>
    </select><br></th>
</table>

</div>
<br>
<label for="chkSelectAll">Pilih semua: </label><input type="checkbox" id="chkSelectAll" onchange="selectAllChk('chkSelectInvoice')">
<br><br>
    <div>
        <table id="invoiceTable" class="table1">
            <tr>
                <th>ID</th><th>NO SIJIL KELAHIRAN</th><th>TAHUN</th><th>STATUS</th><th>LAMPIRAN</th><th>PILIH</th>
            </tr>
        </table>
    </div>
    <br><div class="box">
        <h5 >TIDAKAN KE ATAS PILIHAN</h5>
        <table class="table2">
            <th>
<<<<<<< Updated upstream
        <button onclick="alterInvoices('delete')" class="btn"><i class="fa fa-trash"></i>Delete Invoice</button>
        </th>
        <th><button onclick="alterInvoices('approved')" class="btn"><i class="fa fa-check"></i>Approved</button>
=======
        <button onclick="alterInvoices('delete')" class="btn"><i class="fa fa-trash"></i> HAPUS</button>
        </th>
        <th><button onclick="alterInvoices('approved')" class="btn"><i class="fa fa-check"></i> PENGESAHAN</button>
>>>>>>> Stashed changes
        </th>
        <th><button onclick="alterInvoices('rejected')" class="btn"><i class="fa fa-ban fa-fw"></i>DI TOLAK</button>
        </th>
<<<<<<< Updated upstream
        <th><button onclick="alterInvoices('pending')"  class="btn"><i class="fa fa-clock-o fa-fw"></i>Pending</button>
        <th><button onclick="alterInvoices('deleteAttach')" class="btn">Delete Attachment</button></th>
=======
        <th><button onclick="alterInvoices('pending')"  class="btn"><i class="fa fa-clock-o fa-fw"></i>MENUNGGU</button>
>>>>>>> Stashed changes
</table>
    </div>
    <br><div class="box">
        <h5 text_align= center > JANA INVOIS TAHUNAN</h5>
        <label for="inputYear">MASUKKAN TAHUN: </label>
        <input type="number" min="2022" max="2050" step="1" value="2022" id="inputYear" />
        <button id="btnGenerateInvoices" onclick="generateInvoices()" class="btn">JANA</button>
    </div>
   
</body>
</html>