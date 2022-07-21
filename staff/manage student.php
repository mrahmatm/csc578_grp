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
    <h1>PENGURUSAN PANGKALAN DATA PELAJAR </h1><br>
    </div>

        <div class="container">
            <a href="dashboard.php"><i class="fa fa-arrow-left fa-2xl" ></i></a>

            <button id="btnToggleAddStudent" class="buttonToggle" style="background-color: grey;" 
            onclick="toggleDivDisplay('manageStudentDiv', 'addStudentDiv')">Add Student</button>

            <button id="btnToggleManageStudent" class="buttonToggle" style="background-color:#8b4513 ;" 
            onclick="toggleDivDisplay('addStudentDiv', 'manageStudentDiv')">Manage Student</button>

            <div class="container" id="addStudentDiv">
                <br />
                <h3 align="center">Load Student Data from Excel Sheet</h3>
                <br />
                <p>Please download the template <a href="TEMPLATE STUDENT DATA.xlsx" download>here</a> and use it!</p>
                <br />
                <div class="table-responsive">
                <span id="message"></span>
                    <table class="table">
                        <tr>
                        <td width="25%" text_align="right">Select Excel File</td>
                        <td width="50%"><input type="file" name="select_excel" id="inputFile"/></td>
                        <td width="25%"><button onclick="loadExcelStudent()"  name="load" class="btn btn-primary">Submit</button></td>
                        </tr>
                    </table>

                <br/>
                    <h6>Preview:</h6><br>
                    <div id="excel_output">

                    </div>
                </div>
                <div>
                    <button class="button" onclick="insertStudent()">Add Students</button>
                </div>
            </div>
            
            <div class="container hiddenDiv" style="background-color:#8b4513" id="manageStudentDiv">
                <h3 align="center">SENARAI PELAJAR</h3><br>
        <table>
            <th>
                <label for="inputSearch">Search:</label>
                <input type="text" id="inputSearch" onkeyup="fetchManageChildren()" autofocus>
                <label for="inputSearch"> (by student BC)</label><br>
            </th>
            <th>
                <label for="sortType">Sort by: </label>
                <select name="sortType" id="sortType" onchange="fetchManageChildren()">
                    <option value="-" selected>-</option>
                    <option value="student_BC">BC</option>
                    <option value="student_name">Name</option>
                </select><br>
            </th>
        </table>
        <table>
                <th><button onclick="fetchManageChildren()">Refresh</button><br></th>
                <th><p>Delete Selected: </p></th>
                <th><button onclick="terminateChildren()">Delete</button><br></th>
        </table>
                <div>
                    <table id="studentTable" class="table1">
                        <tr>
                            <th>BC</th><th>Name</th><th>Parent</th><th>Action</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
    </html>
