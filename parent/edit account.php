<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
    ?>

    <script>
        window.onload = fetchChildren('addChk');
        window.onload = fetchCurrentUserInfo();
    </script>
</head>
<body>
    <h5>update account page</h5>
    <div>
        <br><h6>edit kau</h6><br>
        <input type="checkbox" id="toggleEdit" onchange="toggleEditMode('inputClass', 'toggleEdit')">
        <label for="toggleEdit">Edit Credentials</label><br>
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
        <button id="btnUpdateAccount" onclick="updateUserAccount()" disabled class="inputClass"">Save Changes</button>
    </div>

    <div>
        <br><h6>edit anak</h6><br>
        <table id="childrenTable" class="table">
            <tr>
                <th>Name</th><th>BC</th><th>Select</th>
            </tr>
        </table><br>
        <button id="btnDelete" onclick="removeChildren()">Delete</button>
    </div>
    <div><br>
                    <h4>search anak kau</h4><br>
                    <label for="searchBC">Enter Birth Cert Number: </label>
                    <input type="text" id="searchBC" onkeyup="searchBC(this.value, 'tak null')"><br>
                    <h6>Search result:</h6>
                    <label for="displayName">Nama: </label>
                    <input type="text" disabled id="displayName">
                    <label for="displayBC">BC: </label>
                    <input type="text" disabled id="displayBC"><br>
                    <button id="addChild" onclick="registerChild()" disabled>Add</button>
    </div><br>
</body>
</html>