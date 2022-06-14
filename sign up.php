<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
        include "common.php";
    ?>
</head>
<body>
    
    <div>
        <div>
            <label for="inputName">Name: </label>
            <input type="text" id="inputName">
            <label for="inputEmail">Email: </label>
            <input type="text" id="inputEmail">
            <label for="inputPhone">Phone Number: </label>
            <input type="text" id="inputPhone">
            <label for="inputPassword">Password: </label>
            <input type="password" id="inputPassword"
            onkeyup="checkConfirmPass('inputPassword', 'inputConfirmPassword', 'feedbackPassword')">
            <label for="inputConfirmPassword">Confirm password: </label>
            <input type="password" id="inputConfirmPassword" 
            onkeyup="checkConfirmPass('inputPassword', 'inputConfirmPassword', 'feedbackPassword')">
            <div id="feedbackPassword"></div>
            <div><br>
                <h4>search anak kau</h4><br>
                <label for="searchBC">Enter Birth Cert Number: </label>
                <input type="text" id="searchBC" onkeyup="searchBC(this.value)"><br>
                <h6>Search result:</h6>
                <label for="displayName">Nama: </label>
                <input type="text" disabled id="displayName">
                <label for="displayBC">BC: </label>
                <input type="text" disabled id="displayBC"><br>
                <button id="addChild" onclick="addChild()" disabled>Add</button>
            </div><br>
            <div>
                <h4>list anak kau</h4><br>
                <table id="childrenTable">
                    <tr>
                        <th>Name</th><th>BC</th><th>Delete</th>
                    </tr>
                </table>
            </div><br><br>
            <button id="btnSubmit" onclick="submitSignUp()">Submit</button>
        </div>
    </div>    

</body>
</html>