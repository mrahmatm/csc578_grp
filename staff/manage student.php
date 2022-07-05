<!DOCTYPE html>
<html>
    <head>
        <title>Load Excel Sheet (student data)</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <?php

            include "common.php";

        ?>
    </head>
    <body>
        <div class="container">
        <br />
        <h3 align="center">Load Student Data from Excel Sheet</h3>
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
        </div>
    </body>
    </html>
