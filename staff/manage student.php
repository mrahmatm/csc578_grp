<?php

include "common.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Manage Students</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

        <script>
        window.onload = function(){
            fetchManageChildren();
}
    </script>
    </head>
    <style>
        #addStudentDiv{
            background-color: coral;
        }
        .buttonToggle{
            margin: 10px 10px;
        }
        .hiddenDiv{
            display: none;
        }
    </style>
    <body>
        <div class="container">
            <button id="btnToggleAddStudent" class="buttonToggle" style="background-color: coral;" 
            onclick="toggleDivDisplay('manageStudentDiv', 'addStudentDiv')">Add Student</button>

            <button id="btnToggleManageStudent" class="buttonToggle" style="background-color: rgb(144,238,144);" 
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
                        <td width="25%" align="right">Select Excel File</td>
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
            
            <div class="container hiddenDiv" style="background-color: rgb(144,238,144);" id="manageStudentDiv">
            <h2>part ni tak siap lagi</h2>
                <h3 align="center">Manage Student</h3><br>
                <label for="inputSearch">Search:</label>
                <input type="text" id="inputSearch" onkeyup="fetchManageChildren()" autofocus>
                <label for="inputSearch"> (by student BC)</label><br>
                <label for="sortType">Sort by: </label>
                <select name="sortType" id="sortType" onchange="fetchManageChildren()">
                    <option value="-" selected>-</option>
                    <option value="student_BC">BC</option>
                    <option value="student_name">Name</option>
                </select><br>
                <button onclick="fetchManageChildren()">Refresh</button><br>
                <p>Delete Selected: </p><button onclick="terminateChildren()">Delete</button><br>
                <div>
                    <table id="studentTable" class="table">
                        <tr>
                            <th>BC</th><th>Name</th><th>Parent</th><th>Action</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
    </html>
