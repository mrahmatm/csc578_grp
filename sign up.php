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
    <form action="" id="frmSubmit">
        <div class="container">
            <div class="inputContainer">
            <label for="inputUsername">Username: </label>
            <input type="text" id="inputUsername" class="alignRight inputBoxText">
            <div id="feedbackUsername" style="color:red"></div>
            </div>
            <div class="inputContainer">
            <label for="inputEmail">Email: </label>
            <input type="text" id="inputEmail" class="alignRight inputBoxText">
            <div id="feedbackEmail" style="color:red"></div>
            </div>
            <div class="inputContainer">
                <label for="inputPassword">Password: </label>
                <input type="password" id="inputPassword" class="alignRight inputBoxText" 
                onkeyup="checkConfirmPass(); checkPasswordStr(this.value)"> 
            </div>
            <div class="inputContainer">
                <label for="inputConfirmPassword">Confirm Password: </label>
                <input type="password" id="inputConfirmPassword" class="alignRight inputBoxText"
                onkeyup="checkConfirmPass()">
                <div id="feedbackPassword" style="color:red"></div>
            </div>
            <div class="inputContainer">
                <div id="passStrFeedback"></div>
            </div>  
            <div class="inputContainer">
                <div class="vertical-center">
                    <button id="btnSubmit">Submit</button>  
                </div>
            </div>           
            
        </div>
    </form>    
</body>
</html>