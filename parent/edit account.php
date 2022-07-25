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
    <h1>Update Account</h1>
    <a href="dashboard.php" class="cta">
    <polyline points="-8 -1 -12 -5 -8 -9"></polyline>
    <span>Back</span>
    <svg width="13px" height="10px" viewBox="0 0 13 10">
    <path d="M1,5 L11,5"></path>
    
  </svg>
</a>
    </div>
    <div class="container">
        <br><h4>Your Details</h4><br>
        <input type="checkbox" id="toggleEdit" class="checkbox-spin" classonchange="toggleEditMode('inputClass', 'toggleEdit')">
        <label for="toggleEdit">Edit Credentials</label><br><br>
        <label for="inputName">Name: </label>
        <input type="text" id="inputName" disabled class="inputClass">
        <label for="inputIC">IC: </label>
        <input type="text" id="inputIC" disabled class="inputClass">
        <label for="inputEmail">Email: </label>
        <input type="text" id="inputEmail" disabled class="inputClass">
        <label for="inputPhone">Phone Number: </label>
        <input type="text" id="inputPhone" disabled class="inputClass">
        <label for="inputPassword">Password: </label>
        <input type="password" disabled class="inputClass" id="inputPassword"><br><br>
        <button id="btnUpdateAccount" onclick="updateUserAccount()" disabled class="inputClass" >Save Changes</button>
    </div>

    <div>
        <br><h4>Manage your Children</h4><br>
        <table id="childrenTable" class="table">
            <tr>
                <th>Name</th><th>BC</th><th>Select</th>
            </tr>
        </table><div class="container">
        <button id="btnDelete" onclick="removeChildren()" >Delete</button>
        </div>
    </div>
    <div>
            <div class="container">
                    <h4>Search your Children</h4><br>
                    <label for="searchBC">Enter Birth Cert Number: </label><br>
                    <input type="text" id="searchBC" onkeyup="searchBC(this.value, 'tak null')"><br><br>
                    <h4>Search result:</h4>
                    <label for="displayName">Nama: </label>
                    <input type="text" disabled id="displayName">
                    <label for="displayBC">BC: </label>
                    <input type="text" disabled id="displayBC"><br><br>
                    <button id="addChild" onclick="registerChild()" disabled>Add</button>
                    </div>
    </div><br>
</body>
</html>