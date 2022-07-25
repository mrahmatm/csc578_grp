<?php

include "common.php";
include "designStudent.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <title>PENGURUSAN PELAJAR</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script>
        window.onload = function(){
            fetchManageChildren();
}
    </script>
    </head>
    <style>
        body{
            background-image:url("dark.png"); 
            background-size: cover;
           
            
        }

        h1 {text-align: center;
            margin-top: 20px;
            font-family: Impact, fantasy;
            font: size 42px;
            
        }

        #addStudentDiv{
            background-color: grey;
        }
        .buttonToggle{
            margin: 10px 10px;
        }
        .hiddenDiv{
            display: none;
        }

        
    </style>
    <body>
    <div class="header">
    <h1>PENGURUSAN PANGKALAN DATA PELAJAR</h1>
    <a href="dashboard.php" class="cta">
    <polyline points="-8 -1 -12 -5 -8 -9"></polyline>
    <span>Kembali</span>
    <svg width="13px" height="10px" viewBox="0 0 13 10">
    <path d="M1,5 L11,5"></path>
    
  </svg>
</a>
    </div>

        <div class="container">

            <button id="btnToggleAddStudent" class="buttonToggle" style="background-color: grey;" 
            onclick="toggleDivDisplay('manageStudentDiv', 'addStudentDiv')">Tambah Pelajar</button>

            <button id="btnToggleManageStudent" class="buttonToggle" style="background-color:#8b4513 ;" 
            onclick="toggleDivDisplay('addStudentDiv', 'manageStudentDiv')">Urus Pelajar</button>

            <div class="container" id="addStudentDiv">
                <br />
                <h3 align="center">Memuatnaik data pelajar dari excel</h3>
                <br />
                <p>Sila memuat turun templat <a href="TEMPLATE STUDENT DATA.xlsx" download>disini</a> dan gunakannya !</p>
                <br />
                <div class="table-responsive">
                <span id="message"></span>
                    <table class="table">
                        <tr>
                        <td width="25%" text_align="right">Pilih Fail Excel </td>
                        <td width="50%"><input type="file" name="select_excel" id="inputFile"/></td>
                        <td width="25%"><button onclick="loadExcelStudent()"  name="load" class="btn btn-primary">Hantar</button></td>
                        </tr>
                    </table>

                <br/>
                    <h6>Paparan:</h6><br>
                    <div id="excel_output">

                    </div>
                </div>
                <div>
                    <button class="button" onclick="insertStudent()">Tambah Pelajar</button>
                </div>
            </div>
            
            <div class="container hiddenDiv" style="background-color:beige" id="manageStudentDiv">
                <h3 align="center">SENARAI PELAJAR</h3><br>
        <table>
            <th>
                <label for="inputSearch">Carian:</label>
                <input type="text" id="inputSearch" onkeyup="fetchManageChildren()" autofocus>
                <label for="inputSearch"> (melalui no. sijil kelahiran pelajar)</label><br>
            </th>
            <th>
                <label for="sortType">Melalui Susunan: </label>
                <select name="sortType" id="sortType" onchange="fetchManageChildren()">
                    <option value="-" selected>-</option>
                    <option value="student_BC">No. Sijil Kelahiran</option>
                    <option value="student_name">Nama</option>
                </select><br>
            </th>
        </table>
        <table>
                <th><button onclick="fetchManageChildren()">Refresh</button><br></th>
                <th><p>HAPUSKAN TERPILIH :</p></th>
                <th><button onclick="terminateChildren()">Hapus</button><br></th>
        </table>
                <div>
                    <table id="studentTable" class="table1">
                        <tr>
                            <th>NO SIJIL KELAHIRAN</th><th>NAMA</th><th>IBUBAPA</th><th>TINDAKAN</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
    </html>
