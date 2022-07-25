<?php

session_start();
include "common.php";
include "boot.php";
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
    <title>Semakan Yuran</title>


    <script>
        window.onload = fetchChildren('none');
        window.onload = fetchInvoice();
        window.onload = fetchUnpaidInvoice();
    </script>

    <style>
    
    h1 {text-align: center;
            margin-top: 50px;
            font-family: Marker Felt, fantasy;
            font-size: 50px;
    }
        table,  {
            border: 1px solid;
            
            text-align: center;
        }
        th{
            border: 3px solid;
            text-align: center;
            ;            
            
        }
        td{
            border: 1px solid;
            text-align: center;
            
        }
        button{
            height:50px;    
        }
        h5{
            padding:10px;
        }
        p{
            margin-left:10px;
        } 

    </style>
</head>
<body><div class="header">
    <h1>Semakan Yuran</h1><br>
    <a href="dashboard.php" class="cta">
    <polyline points="-8 -1 -12 -5 -8 -9"></polyline>
    <span>Kembali</span>
    <svg width="13px" height="10px" viewBox="0 0 13 10">
    <path d="M1,5 L11,5"></path>
    
  </svg>
</a>
</div><br>
    <div>
        <h5>Anak Anda</h5><br>
        <div>
            <table id="childrenTable" class="table"     >
                <tr>
                    <th>Nama</th><th>Sijil Kelahiran</th>
                </tr>
            </table><br>
            <p>Bukan anak anda? Kemaskini sekarang! <button class="button" ><a href="edit account.php"><span>Kemaskini</span></a></p></button>
        </div>
        <div>
            <h5>Invois Anak Anda</h5>
            <table id="billTable" class="table">
                <tr>
                    <th >ID</th><th>Tahun</th><th>Sijil Kelahiran</th><th>Nama</th><th>Status</th>
                </tr>
            </table><br>
        </div>
        <div>
            <h5>Senarai Menunggu</h5>
            <!--<form action="uploadFile.php" enctype="multipart/form-data" method="POST" id="postFile"> -->
                <table id="billYearTable" class="table">
                    <tr>
                        <th>Tahun</th><th>Tindakan</th>
                    </tr>
                </table>
            <!--</form> -->     
            <button class="button">Hantar</button>
        </div>
    </div>
</body>
</html>