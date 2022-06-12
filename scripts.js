//alert("script loaded!");
function checkConfirmPass(){
    var target=document.getElementById("inputPassword").value;
    var target1=document.getElementById("inputConfirmPassword").value;

    if(target1 === target){
        //alert("is equal now!");
        //document.getElementById("checkStr").disabled = false;
        document.getElementById("feedbackPassword").innerHTML = "";
    }else{
        document.getElementById("feedbackPassword").innerHTML = "x sama anat";
        //document.getElementById("checkStr").disabled = true;
    }
}

function checkPasswordStr(input){
        var strength = 0;
        var feedback = document.getElementById("passStrFeedback");
        const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

        feedback.innerHTML = "Password Strength: ";
        //alert("Strength: "+strength);

        if(specialChars.test(input)){
            strength++;
            //alert("Strength: "+strength);
        }
            
        if(/[a-z]/i.test(input)){
            strength++;
            //alert("Strength: "+strength);
        }            

        if(/\d/.test(input)){
            strength++;
            //alert("Strength: "+strength);
        }            

        if(input.length > 5){
            strength++;
            //alert("Strength: "+strength);
        }            

        if(input.length > 7){
            strength++;
            //alert("Strength: "+strength);
        }           

        if(strength == 5)
            feedback.innerHTML += "Very Strong!";
        else if(strength == 4)
                feedback.innerHTML += "Strong!";
        else if(strength == 3)
            feedback.innerHTML += "Medium!";
        else if(strength == 2)
            feedback.innerHTML += "Weak!";
        else if(strength < 2)
            feedback.innerHTML += "Very Weak!";
}

function verifyLogIn(){

    var inputUsername = document.getElementById("inputUsername").value;
    var inputPassword = document.getElementById("inputPassword").value;

    if(inputUsername.length == 0 || inputPassword.length == 0){
        //letak if input area null
        alert("this cannot be null!");
        return;

    }else if(inputUsername.includes("@") && inputUsername.includes(".")){
        //alert("input isnt null!");
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //alert("code: " + code);
                
                if(this.responseText === "1parent"){
                    alert("account found!");
                    window.location.href = "parent/dashboard.php";
                }else if(this.responseText === "1staff"){
                    alert("account found!");
                    window.location.href = "staff/dashboard.php";
                }else
                    alert("ha?");
                
            }
                
        //document.write("meow");
    };

            var radUser = document.getElementsByName('userType');
            var userType;
            for(i = 0; i < radUser.length; i++) {
                if(radUser[i].checked)
                    userType = radUser[i].value;
            }

    //alert("sampai dekat sini!");

        xmlhttp.open("GET", "db.php?u=" + inputUsername + "&p=" + inputPassword + "&type=verifyLogin"
        + "&userType=" + userType, true);

        //alert("paramter sent: " + input);
        xmlhttp.send();

    }else{
        //kalau email format salah
        /*
        var target = document.getElementById("feedbackDiv1");
                    target.innerHTML = "Not a valid email adrress!";
                    target.className = "errorText"; */
                    alert("tulis email elok2 la");
    }
    
}
