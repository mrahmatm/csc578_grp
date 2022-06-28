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
        response.innerHTML = "Password does not match!";
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

function searchBC(input, location){
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
        if(location != null){
            xmlhttp.open("GET", "../db.php?bc=" + input + "&type=searchBC", true);
        }else
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
    var name = document.getElementById("inputName").value;
    var email = document.getElementById("inputEmail").value;
    var phone = document.getElementById("inputPhone").value;
    var password = document.getElementById("inputPassword").value;
    var IC = document.getElementById("inputIC").value;

    if(!email.includes("@") && !email.includes(".")){
        alert("invalid email address!");
        return;
    }

    if(phone.length < 9){
        alert("invalid phone number lenght!");
        return;
    }

    var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //alert("code: " + code);
                if(this.responseText == 1){
                    alert("Account Created! Please proceed to log in.")
                }
            }                         
        }
                
        //document.write("meow");
    
    //alert("sampai dekat sini!");
        //alert(globalCurrentUser);
        xmlhttp.open("GET", "db.php?name=" + name + "&email=" + email + "&phone=" + phone
        + "&password=" + password + "&children=" + JSON.stringify(globalChildren) + "&ic=" + IC
        + "&type=createParentAccount", true);
        //alert(JSON.parse(globalChildren));
        //alert("paramter sent: " + input);
        xmlhttp.send();
}

function submitAduan(){
    var title = document.getElementById("inputTitle");
    var details = document.getElementById("inputDetails");

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
        alert(globalCurrentUser);
        xmlhttp.open("GET", "../db.php?t=" + title.value + "&d=" + details.value + "&u=" + globalCurrentUser + "&type=insertAduan", true);

        //alert("paramter sent: " + input);
        xmlhttp.send();

}

function logOut(){
    var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //alert("code: " + code);
                if(this.responseText == 1){
                    alert("Logged Out!")
                    window.location.href = "../log in.php";
                }
            }                         
        }
                
        //document.write("meow");
    
    //alert("sampai dekat sini!");

        xmlhttp.open("GET", "../db.php?type=logOut", true);

        //alert("paramter sent: " + input);
        xmlhttp.send();
}

function fetchAduan(){

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            //alert("code: " + code);
            var tempArray = this.responseText.split("*");    
            var status = tempArray[0];
            //note: dia jadi array
            if(status === "1"){
                
                var results = tempArray[1]; 
                var convertResult = JSON.parse(results);

                //alert("Data fetched!");
                var table = document.getElementById("tableAduan");
                clearTable("tableAduan");
                var targetRow = table.rows.length;
                
                var n = 0;
                while(n < convertResult.length){

                    var newRow = table.insertRow(targetRow);
                    var colID = newRow.insertCell(0);
                    var colTitle = newRow.insertCell(1);
                    var colIC = newRow.insertCell(2);
                    var colDetails = newRow.insertCell(3);

                    colID.innerHTML = convertResult[n].complaint_id;
                    colIC.innerHTML = convertResult[n].parent_icNum;
                    colTitle.innerHTML = convertResult[n].complaint_title;
                    colDetails.innerHTML = convertResult[n].complaint_detail;

                    n++; targetRow++;
                }        
            }
        }                         
    }
            
    var currentDisplay = document.getElementById("displayLimiter").value;
    xmlhttp.open("GET", "../db.php?type=fetchAduan&d="+currentDisplay, true);

    //alert("paramter sent: " + input);
    xmlhttp.send();
}

function clearTable(target){
    var table = document.getElementById(target);
    var n = table.rows.length - 1;	
    while(n >= 1){
        table.deleteRow(n);
        n--;
    }
}

var globalSelectedChildren = Array();

function fetchChildren(actions){
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){
            //alert("code: " + code);
            var tempArray = this.responseText.split("*");    
            var status = tempArray[0];
            //note: dia jadi array
            if(status === "1"){
                
                var results = tempArray[1]; 
                var convertResult = JSON.parse(results);

                //alert("Data fetched!");
                var table = document.getElementById("childrenTable");
                //clearTable("childrenTable");
                var targetRow = table.rows.length;
                
                var n = 0;
                while(n < convertResult.length){

                    var newRow = table.insertRow(targetRow);
                    var colName = newRow.insertCell(0);
                    var colBC = newRow.insertCell(1);

                    colName.innerHTML = convertResult[n].student_name;
                    colBC.innerHTML = convertResult[n].student_BC;

                    if(actions === "addChk"){
                        var colChk = newRow.insertCell(2);

                        var newCheckBox = document.createElement('input');
                        newCheckBox.type = 'checkbox';
                        newCheckBox.id = 'chk' + convertResult[n].student_BC;
                        newCheckBox.value = convertResult[n].student_BC;

                        newCheckBox.addEventListener("change", function(){
                            
                            var currentBC = this.value;
                            if(this.checked){
                                globalSelectedChildren.push(currentBC);
                            }else{
                                //cari index of targetted children (row tu)
                                var targetIndex = globalSelectedChildren.findIndex(object=>{
                                    return this.value;
                                });
                                //delete 1 element dekat index tu
                                globalSelectedChildren.splice(targetIndex, 1);

                            }

                            //alert(globalSelectedChildren.toString());
                    });

                    colChk.appendChild(newCheckBox);

                    }
                    
                    n++; targetRow++;
                }

                
            }
        }                         
    }
            
    xmlhttp.open("GET", "../db.php?type=fetchChildren" + "&p=" + globalCurrentUser, true);

    //alert("paramter sent: " + input);
    xmlhttp.send();
}

function fetchInvoice(){
    var xmlhttp = new XMLHttpRequest();
    globalSelectedInvoice = [];
    xmlhttp.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){
            //alert("code: " + code);
            var tempArray = this.responseText.split("*"); 
            //alert(tempArray); 
            var status = tempArray[0];
            //note: dia jadi array
            //alert();
            if(status === "1"){
                var results = tempArray[1];
                var convertResult = JSON.parse(results);
                //alert(convertResult);
                
                var results1 = tempArray[2];
                var studentResult = JSON.parse(results1);
                //alert(studentResult);
                //alert (convertResult.invoice_id);
                //alert("Data fetched!"+convertResult);
                var table = document.getElementById("billTable");
                //clearTable("childrenTable");
                var targetRow = table.rows.length;
                
                var n = 0;
                while(n < convertResult.length){

                    var newRow = table.insertRow(targetRow);
                    var colID = newRow.insertCell(0);
                    var colYear = newRow.insertCell(1);
                    var colBC = newRow.insertCell(2);
                    var colName = newRow.insertCell(3);
                    var colStatus = newRow.insertCell(4);
                    var colAction = newRow.insertCell(5);

                    colID.innerHTML = convertResult[n].invoice_id;
                    colYear.innerHTML = convertResult[n].invoice_year;
                    colBC.innerHTML = convertResult[n].student_BC;
                    colName.innerHTML = studentResult[n].student_name;
                    colStatus.innerHTML = convertResult[n].invoice_status;

                    n++; targetRow++;
                }
            }
        }                         
    }
            
    xmlhttp.open("GET", "../db.php?type=fetchInvoice" + "&p=" + globalCurrentUser, true);

    //alert("paramter sent: " + input);
    xmlhttp.send();
}

var globalSelectedInvoice = Array();

function fetchAllInvoice(){
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){
            clearTable('invoiceTable');
            //alert("code: " + code);
            var tempArray = this.responseText.split("*"); 
            //alert(tempArray); 
            var status = tempArray[0];
            //note: dia jadi array
            //alert();

            if(status === "1"){
                var results = JSON.parse(tempArray[1]);
                //alert (convertResult.invoice_id);
                //alert("Data fetched!"+convertResult);             
                var table = document.getElementById("invoiceTable");
                var targetRow = table.rows.length;
                //alert(table.rows.length);
                var n = 0;
                while(n < results.length){

                    var newRow = table.insertRow(targetRow);
                    var colID = newRow.insertCell(0);
                    var colBC = newRow.insertCell(1);
                    var colYear = newRow.insertCell(2);
                    var colStatus = newRow.insertCell(3);
                    var colAttachment = newRow.insertCell(4);
                    var colAction = newRow.insertCell(5)

                    colID.innerHTML = results[n].invoice_id;
                    colBC.innerHTML = results[n].student_BC;
                    colYear.innerHTML = results[n].invoice_year;
                    colStatus.innerHTML = results[n].invoice_status;
                    colAttachment.innerHTML = results[n].invoice_attach;
                    
                    //colAction.innerHTML = "meow";

                    var newCheckBox = document.createElement('input');
                    newCheckBox.type = 'checkbox';
                    newCheckBox.id = 'chk' + results[n].invoice_id;
                    newCheckBox.value = results[n].invoice_id;

                    newCheckBox.addEventListener("change", function(){
                        var currentInvoiceId = this.value;
                        if(this.checked){
                            globalSelectedInvoice.push(currentInvoiceId);
                            //alert("pushed into array: " + currentInvoiceId);
                            //alert("array content: " + globalSelectedInvoice);
                        }else{
                             //cari index of targetted children (row tu)
                            var targetIndex = globalSelectedInvoice.findIndex(object=>{
                                return this.value;
                            });
                            //alert("targetted delete: " + targetIndex);
                            //alert("index found: " + targetIndex);
                            //delete 1 element dekat index tu
                            globalSelectedInvoice.splice(targetIndex, 1);
                            //alert("removed from array: "+this.value);
                            //alert("array content: " + globalSelectedInvoice);
                        }
                    });

                    colAction.appendChild(newCheckBox);
                    n++; targetRow++;
                }
            }
        }                         
    }
            

        xmlhttp.open("GET", "../db.php?type=fetchAllInvoice&t="+document.getElementById("inputSearch").value+
        "&s="+document.getElementById("sortType").value, true);

    //alert("paramter sent: " + input);
    xmlhttp.send();
}

function alterInvoices(action){

    if(globalSelectedInvoice.length > 0){
        //alert("input isnt null!");
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //alert("code: " + code);
                if(this.responseText == 1){
                    //alert("Aduan Inserted!")
                    clearTable("invoiceTable");
                    globalSelectedInvoice.splice(0, globalSelectedInvoice.length);
                    fetchAllInvoice();
                }else{

                }
            }                         
        }   
        //document.write("meow");
    //alert("sampai dekat sini!");
        //alert(globalCurrentUser);
        xmlhttp.open("GET", "../db.php?a=" + action + "&type=alterInvoices" + "&t=" + globalSelectedInvoice.toString() +"", true);
        //alert(globalSelectedInvoice);
        //alert("paramter sent: " + input);
        xmlhttp.send();
    }else{
        alert("Select invoice(s) first!");
    }
        
}

function generateInvoices(){
    var targetYear = document.getElementById("inputYear").value;

    if(targetYear.length > 0){
        //alert("input isnt null!");
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //alert("code: " + code);
                if(this.responseText == 1){
                    //alert("Aduan Inserted!")
                    clearTable("invoiceTable");
                    fetchAllInvoice();
                }else{

                }
            }                         
        }   
        //document.write("meow");
    //alert("sampai dekat sini!");
        //alert(globalCurrentUser);
        xmlhttp.open("GET", "../db.php?type=generateInvoice" + "&y=" + targetYear, true);
        //alert(globalSelectedInvoice);
        //alert("paramter sent: " + input);
        xmlhttp.send();
    }else{
        alert("Year cannot be empty!");
    }
}

function toggleEditMode(targetClass, inputChk){
    //make sure bagi nama class of input fields dengan id toggle checkbox

    var classElements = document.getElementsByClassName(targetClass);
    var checkbox = document.getElementById(inputChk);

    var n = 0;
    while(n < classElements.length){

        if(checkbox.checked){
            classElements[n].removeAttribute("disabled");
        }        
        else{
            classElements[n].disabled = true;
            document.getElementById("inputName").value = globalHoldCurrentUserInfo["parent_name"];
            document.getElementById("inputIC").value = globalHoldCurrentUserInfo["parent_icNum"];
            document.getElementById("inputEmail").value = globalHoldCurrentUserInfo["parent_email"];
            document.getElementById("inputPhone").value = globalHoldCurrentUserInfo["parent_phone"];
            document.getElementById("inputPassword").value = globalHoldCurrentUserInfo["parent_password"];
        }
        
        
        n++;
    }
}

var globalHoldCurrentUserInfo;

function fetchCurrentUserInfo(){
    var xmlhttp = new XMLHttpRequest();
    globalSelectedInvoice = [];
    xmlhttp.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){
            //alert("code: " + code);
            var tempArray = this.responseText.split("*"); 
            //alert(tempArray); 
            var status = tempArray[0];
            //note: dia jadi array
            //alert();
            if(status === "1"){
                var results = tempArray[1];
                var convertResult = JSON.parse(results);
                globalHoldCurrentUserInfo = convertResult;
                //alert(convertResult);
                document.getElementById("inputName").value = convertResult["parent_name"];
                document.getElementById("inputIC").value = convertResult["parent_icNum"];
                document.getElementById("inputEmail").value = convertResult["parent_email"];
                document.getElementById("inputPhone").value = convertResult["parent_phone"];
                document.getElementById("inputPassword").value = convertResult["parent_password"];
                
            }
        }                         
    }
    //alert("'"+ globalCurrentUser + "'"); 
    xmlhttp.open("GET", "../db.php?type=fetchCurrentUserInfo" + "&u=" + globalCurrentUser, true);

    //alert("paramter sent: " + input);
    xmlhttp.send();
}

function removeChildren(){
    var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //alert("code: " + code);
                if(this.responseText == 1){
                    clearTable("childrenTable");
                    fetchChildren('addChk');
                }else{

                }
            }                         
        }   

        xmlhttp.open("GET", "../db.php?type=removeChildren" + "&t=" + globalSelectedChildren.toString(), true);
        xmlhttp.send();
}

function registerChild(){
    
    var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //alert("code: " + code);
                if(this.responseText == 1){
                    clearTable("childrenTable");
                    fetchChildren('addChk');
                }else{

                }
            }                         
        }   

        xmlhttp.open("GET", "../db.php?type=registerChild" + "&t=" + document.getElementById("displayBC").value+ "&p=" + globalCurrentUser, true);
        xmlhttp.send();
}

function updateUserAccount(){
    var updateAccount = {
        parent_icNum : document.getElementById("inputIC").value,
        parent_name : document.getElementById("inputName").value,
        parent_email : document.getElementById("inputEmail").value,
        parent_phone : document.getElementById("inputPhone").value,
        parent_password : document.getElementById("inputPassword").value,
    };

    var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                //alert("code: " + code);
                if(this.responseText == 1){
                    var userNew = updateAccount.parent_icNum;
                    '<%Session["UserName"] = "' + userNew + '"; %>';
                    globalCurrentUser = updateAccount.parent_icNum;
                    fetchCurrentUserInfo();
                    document.getElementById("toggleEdit").click();
                }else{

                }
            }                         
        }   
        //alert(JSON.stringify(updateAccount));
        xmlhttp.open("GET", "../db.php?type=updateUserAccount" + "&t=" +globalCurrentUser + "&c=" + JSON.stringify(updateAccount), true);
        xmlhttp.send();
}

function fetchInvoiceByYear(){
    var xmlhttp = new XMLHttpRequest();
    globalSelectedInvoice = [];
    xmlhttp.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){
            //alert("code: " + code);
            var tempArray = this.responseText.split("*"); 
            //alert(tempArray); 
            var status = tempArray[0];
            //note: dia jadi array
            //alert();
            if(status === "1"){
                var results = tempArray[1];
                var convertResult = JSON.parse(results);
                //alert(convertResult);
                
                var results1 = tempArray[2];

                var table = document.getElementById("billYearTable");
                //clearTable("childrenTable");
                var targetRow = table.rows.length;
                
                var n = 0;
                while(n < convertResult.length){

                    var newRow = table.insertRow(targetRow);
                    var colID = newRow.insertCell(0);
                    
                    colID.innerHTML = convertResult[n].invoice_id;
                    
                    n++; targetRow++;
                }
            }
        }                         
    }
            
    xmlhttp.open("GET", "../db.php?type=fetchInvoiceByYear" + "&p=" + globalCurrentUser, true);

    //alert("paramter sent: " + input);
    xmlhttp.send();
}