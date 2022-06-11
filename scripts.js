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
