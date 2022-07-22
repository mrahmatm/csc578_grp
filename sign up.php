<?php
        include "common.php";
        include "designSignUp.php";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
<style>
     body{
            background-image:url("lol.png"); 
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: cover;
            
            
        }

    h1 {text-align: center;
            margin-top: 20px;
            font-family: Impact, fantasy;
            font: size 42px;
            
        }
</style>

</head>
<body>
<div class="header">
<h1>DAFTAR BAHARU</h1>
</div>
<br><br>
        <div class="box">
            <h3 align="center">BUTIRAN PERIBADI</h3><br><br>
            <table id="tablePeribadi" class="table1" >
            <tr>
                <td>
                <label for="inputName">Name: </label>
                </td>
                <td>
                <label for="inputEmail">Email: </label>
                </td>
            </tr>
                <td>
                <input type="text" id="inputName"><br>
                </td>
                <td>
                <input type="text" id="inputEmail">
                </td>
            </tr>
            <tr>
                <td>
                <label for="inputIC">IC: </label>
                </td>
                <td>
                <label for="inputPhone">Phone Number: </label>
                </td>
            </tr>
            <tr>
                <td>
                <input type="text" id="inputIC">
                </td>
                <td>
                <input type="text" id="inputPhone"> 
                </td>
            </tr>
            <tr>
                <td>
                <label for="inputPassword">Password: </label>
                </td>
                <td>
                <label for="inputConfirmPassword">Confirm password: </label>
                </td>
    </tr>
    <tr>
                <td>
                <input type="password" id="inputPassword"
                onkeyup="checkConfirmPass('inputPassword', 'inputConfirmPassword', 'feedbackPassword')">
                </td>
                <td>
                <input type="password" id="inputConfirmPassword" 
                onkeyup="checkConfirmPass('inputPassword', 'inputConfirmPassword', 'feedbackPassword')">
                <div id="feedbackPassword"></div>
                </td>
            </tr>
            </table>
        </div>
                
        <div class="box">
            <br>
                    <h4>BUTIRAN ANAK</h4><br>
                    <label for="searchBC">Enter Birth Cert Number: </label>
                    <input type="text" id="searchBC" onkeyup="searchBC(this.value)"><br>
                    <h6>Search result:</h6>
                    <label for="displayName">Nama: </label>
                    <input type="text" disabled id="displayName">
                    <label for="displayBC">BC: </label>
                    <input type="text" disabled id="displayBC"><br>
                    <br>
                    <button id="addChild" onclick="addChild()" disabled class="button">ADD</button>
        </div>
        <div class="box">
            <h4>SENARAI BUTIRAN PERIBADI ANAK</h4><br>
            <table id="childrenTable" class="table">
                <tr>
                    <th>Name</th>
                    <th>BC</th>
                    <th>Delete</th>
                </tr>
            </table>
            <button id="btnSubmit" onclick="submitSignUp()" disabled  class="button1">Submit</button>
        </div>
    </div>    

</body>
</html>