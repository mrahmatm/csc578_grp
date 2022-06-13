//alert("script loaded!");
function checkConfirmPass(input1, input2, targetDiv){
    var target=document.getElementById(input1).value;
    var target1=document.getElementById(input2).value;
    var response = document.getElementById(targetDiv);

    if(target1 === target){
        //alert("is equal now!");
        //document.getElementById("checkStr").disabled = false;
        response.innerHTML = "";
        document.getElementById("btnSubmit").removeAttribute("disabled");
    }else{
        response.innerHTML = "x sama anat";
        document.getElementById("btnSubmit").disabled = true;
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

var globalName, globalBC;
var globalChildren = Array();

function searchBC(input){
    if(input.length == 0){
        //letak if input area null
        //alert("this cannot be null!");
        return;

    }else{
        //alert("input isnt null!");
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //alert("code: " + code);
                var displayName = document.getElementById("displayName");
                var displayBC = document.getElementById("displayBC");
                var addChild = document.getElementById("addChild");
                //alert("found: " + this.responseText);
                if(this.responseText !== "0"){         
                    var tempArray = this.responseText.split("*");    
                    displayName.value = tempArray[0];
                    displayBC.value = tempArray[1];

                    globalName = tempArray[0];
                    globalBC = tempArray[1];
                    addChild.removeAttribute("disabled");
                }else{
                    addChild.disabled="true;"
                    displayName.value = "";
                    displayBC.value = "";
                }                         
            }
                
        //document.write("meow");
    };
    //alert("sampai dekat sini!");

        xmlhttp.open("GET", "db.php?bc=" + input + "&type=searchBC", true);

        //alert("paramter sent: " + input);
        xmlhttp.send();

    }
}

function addChild(){

    //check kalau dia add same student
    if(globalChildren.findIndex(object=>{ return object.student_BC === globalBC;}) != -1){
        alert("kan dah add tu kau nak apa lagi?");
        return;
    }

    var name = document.getElementById("displayName").value;
    var bc = document.getElementById("displayBC").value;

    var table = document.getElementById("childrenTable");
	var targetRow = table.rows.length;

    var newRow = table.insertRow(targetRow);
	var colName = newRow.insertCell(0);
	var colBC = newRow.insertCell(1);
    var colDelete = newRow.insertCell(2);
    colDelete.value = globalBC;

    //buat unique delete button
    var btn = document.createElement('button');
    btn.innerHTML = "Delete";    
    var setID = 'btn'+globalBC;
    var createBtn = document.createElement('button');
    createBtn.innerHTML = "Delete";
    createBtn.setAttribute('id', setID);
    createBtn.value = globalBC;
    createBtn.addEventListener("click", function(){
        //alert("masuk sini");
        deleteChild(this.value);
    });
    colDelete.appendChild(createBtn);
    
    //letak dalam global array
    var newChild = {
        student_BC : globalBC,
        student_name : globalName
    };
    //alert("new child: " + newChild.student_BC);
    globalChildren.push(newChild);

    //display value dalam table
    colName.innerHTML = globalName;
    colBC.innerHTML = globalBC;

}

function deleteChild(input){
    //sampai sini
    //alert("sabar anat x siap lg");
    var table = document.getElementById("childrenTable");
	var length = table.rows.length;
    var currentRow, currentVal;
    //alert("length: "+length);
    var n = 1;
    while(n < length){
        currentRow = table.rows[n];
        currentVal = currentRow.cells[2].value;
        if(currentVal === input){
            table.deleteRow(n);
            break;
        }
        n++;
    }

    //cari index of targetted children (row tu)
    var targetIndex = globalChildren.findIndex(object=>{
        return object.student_BC === input;
    });
    //alert("index found: " + targetIndex);
    //delete 1 element dekat index tu
    globalChildren.splice(targetIndex, 1);

    //alert("current array content: " + JSON.stringify(globalChildren, null));
}

function submitSignUp(){
    alert("sabar ni x siap lg (otp)");
    //submit array of children
    //submit each field of input
}

function submitAduan(input){
    var title = document.getElementById("inputTitle");
    var details = document.getElementById("inputDetails");
    var user = input;

    if(title.value.length == 0 || details.value.length == 0){
        alert("isi elok2 la");
        return;
    }
        //alert("input isnt null!");
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //alert("code: " + code);
                if(this.responseText == 1){
                    alert("Aduan Inserted!")
                }
            }                         
        }
                
        //document.write("meow");
    
    //alert("sampai dekat sini!");

        xmlhttp.open("GET", "../db.php?t=" + title.value + "&d=" + details.value + "&u=" + user + "&type=insertAduan", true);

        //alert("paramter sent: " + input);
        xmlhttp.send();

}
