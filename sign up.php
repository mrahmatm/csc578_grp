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
    <title>Sign Up</title>
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
                <label for="inputName">Nama: </label>
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
                <label for="inputIC">No. KP: </label>
                </td>
                <td>
                <label for="inputPhone">No. Telefon: </label>
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
                <label for="inputPassword">Kata Laluan: </label>
                </td>
                <td>
                <label for="inputConfirmPassword">Sahkan Kata Laluan </label>
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
                    <label for="searchBC">Masukkan No. Sijil Kelahiran </label>
                    <input type="text" id="searchBC" onkeyup="searchBC(this.value)"><br>
                    <h6>Hasil Carian</h6>
                    <label for="displayName">Nama: </label>
                    <input type="text" disabled id="displayName">
                    <label for="displayBC">No. Sijil Kelahiran </label>
                    <input type="text" disabled id="displayBC"><br>
                    <br>
                    <button id="addChild" onclick="addChild()" disabled class="button">TAMBAH</button>
        </div>
        <div class="box">
            <h4>SENARAI BUTIRAN PERIBADI ANAK</h4><br>
            <table id="childrenTable" class="table">
                <tr>
                    <th>Nama</th>
                    <th>No. Sijil Kelahiran</th>
                    <th>Buang</th>
                </tr>
            </table>
            <button id="btnSubmit" onclick="submitSignUp()" disabled  class="button1">Hantar</button>
        </div>
    </div>    

</body>
</html>