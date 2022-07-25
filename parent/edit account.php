<?php
        session_start();
        
        //remarks: kena include hok one folder up sbb benda alah ni dalam folder
        $currentUser = $_SESSION["currentUser"];
        echo "
        <script>         
            var globalCurrentUser = '".$currentUser."';  
            //alert('current session: ' + globalCurrentUser);
        </script>";
        include "common.php";
        include "boot.php";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akaun</title>

   

    <script>
        window.onload = fetchChildren('addChk');
        window.onload = fetchCurrentUserInfo();
    </script>

    <style>
        h1 {text-align: center;
            margin-top: 50px;
            font-family: Marker Felt, fantasy;
            font-size: 50px;
    }
    h4 {text-align: center;
            margin-top: 50px;
            font-family: Marker Felt, fantasy;
           
    }
    
        tr{
            border: 2px solid;
            text-align: center;
        }
        th{
            background-color: #04AA6D;
            border: 2px solid;
        }

        .container{
            text-align:center;
        }
        input[type=checkbox] {
            width: 20px;
            height: 20px;
        }
 
        
        
    </style>
</head>
<body><div class="header">
    <h1>Kemaskini Akaun</h1>
    <a href="dashboard.php" class="cta">
    <polyline points="-8 -1 -12 -5 -8 -9"></polyline>
    <span>Kembali</span>
    <svg width="13px" height="10px" viewBox="0 0 13 10">
    <path d="M1,5 L11,5"></path>
    
  </svg>
</a>
    </div>
    <div class="container">
        <br><h4>Maklumat Anda</h4><br>
        <input type="checkbox" id="toggleEdit" class="checkbox-spin" classonchange="toggleEditMode('inputClass', 'toggleEdit')">
        <label for="toggleEdit">Kemaskini Butiran</label><br><br>
        <label for="inputName">Nama: </label>
        <input type="text" id="inputName" disabled class="inputClass">
        <label for="inputIC">No KP: </label>
        <input type="text" id="inputIC" disabled class="inputClass">
        <label for="inputEmail">Email: </label>
        <input type="text" id="inputEmail" disabled class="inputClass">
        <label for="inputPhone">No. Telefon: </label>
        <input type="text" id="inputPhone" disabled class="inputClass">
        <label for="inputPassword">Kata Laluan: </label>
        <input type="password" disabled class="inputClass" id="inputPassword"><br><br>
        <button id="btnUpdateAccount" onclick="updateUserAccount()" disabled class="inputClass" >Simpan</button>
    </div>

    <div>
        <br><h4>Urus Anak</h4><br>
        <table id="childrenTable" class="table">
            <tr>
                <th>Nama</th><th>Sijil Kelahiran</th><th>Pilih</th>
            </tr>
        </table><div class="container">
        <button id="btnDelete" onclick="removeChildren()" >Buang</button>
        </div>
    </div>
    <div>
            <div class="container">
                    <h4>Cari Anak Anda</h4><br>
                    <label for="searchBC">Masukkan No. Sijil Kelahiran Anda </label><br>
                    <input type="text" id="searchBC" onkeyup="searchBC(this.value, 'tak null')"><br><br>
                    <h4>Keputusan Carian</h4>
                    <label for="displayName">Nama: </label>
                    <input type="text" disabled id="displayName">
                    <label for="displayBC">Sijil Kelahiran </label>
                    <input type="text" disabled id="displayBC"><br><br>
                    <button id="addChild" onclick="registerChild()" disabled>Tambah</button>
                    </div>
    </div><br>
</body>
</html>