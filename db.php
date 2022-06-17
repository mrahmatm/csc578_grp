<?php

    $type = $_REQUEST['type'];

    if(strstr($type, "verifyLogin")){
        $username = $_REQUEST['u'];
        $password = $_REQUEST['p'];
        $userType = $_REQUEST['userType'];

        //echo "<script>alert('user type: ".$userType."');</script>";
            require "connect.php";
            $stmt = $pdo->prepare("SELECT count(*) FROM ".$userType." WHERE ".$userType."_email=:username AND ".$userType."_password=:password");
                $stmt->execute(['username'=>$username, 'password'=>$password]);
                $count = $stmt->fetchColumn();
    
                if($count < 1){
                    echo "0".$userType;               
                }else{
                    //pass session dekat next page dia, jgn lupa session_start()
                    session_start();                  
                    $stmt = $pdo->prepare("SELECT * FROM ".$userType." WHERE ".$userType."_email=:username");
                    $stmt->execute(['username'=>$username]);
                    $result = $stmt->fetchObject();
                    $temp = $userType . "_icNum";
                    $_SESSION["currentUser"] = $result->$temp;   
                    echo "1".$userType;                        
                }

    //end of verifyLogin
    }else if(strstr($type, "searchBC")){
        $input = $_REQUEST['bc'];

        require "connect.php";
        $stmt = $pdo->prepare("SELECT student_BC, student_name FROM student WHERE student_BC=:input AND parent_icNum IS NULL");
            $stmt->execute(['input'=>$input]);
            $result = $stmt->fetch();

            if(!$result){
                echo "0";
            }else{
                echo $result["student_name"]."*".$result["student_BC"];
            }

    //end of search BC
    }else if(strstr($type, "insertAduan")){
        $title = $_REQUEST['t'];
        $details = $_REQUEST['d'];
        $currentUser = $_REQUEST['u'];

        require "connect.php";
        $stmt = $pdo->prepare("INSERT INTO complaint(parent_icNum, complaint_title, complaint_detail) VALUES(?, ?, ?)");
        
            if($stmt->execute([$currentUser, $title, $details])){
                echo "1";
            }else{
                echo "0";
            }
    //end of insert aduan
    }else if(strstr($type, "logOut")){
        session_start();  
        session_destroy();
        echo "1";
    //end of logout
    }else if(strstr($type, "fetchAduan")){

        require "connect.php";
        $stmt = $pdo->prepare("SELECT * FROM complaint");     
        $stmt->execute();
        $result = $stmt->fetchAll();
            if($result != null){
                echo "1*".json_encode($result);
                
            }else{
                echo "0";
            }
    //end of fetch aduan
    }else if(strstr($type, "fetchChildren")){
        
        require "connect.php";
        $parentIC = $_REQUEST['p'];
        
        $stmt = $pdo->prepare("SELECT * FROM student WHERE parent_icNum=:parent");     
        $stmt->execute(["parent"=>$parentIC]);
        $result = $stmt->fetchAll();
            if($result != null){
                echo "1*".json_encode($result);           
            }else{
                echo "0";
            }
    //end of fetch children
    }else if(strstr($type, "fetchInvoice")){
        
        require "connect.php";
        $parentIC = $_REQUEST['p'];
        
        $stmt = $pdo->prepare("SELECT * FROM student WHERE parent_icNum=:parent");     
        $stmt->execute(["parent"=>$parentIC]);
        $resultStudent = $stmt->fetchAll();
        $resultInvoice = (array)null;
        
        if($resultStudent != null){      
            //echo json_encode($resultStudent);

            foreach($resultStudent as $student){

                //echo gettype($student);

                $currentBC = $student["student_BC"];

                $stmt = $pdo->prepare("SELECT * FROM invoice WHERE student_BC=:input");     
                $stmt->execute(['input'=>$currentBC]);
                //echo "current bc: ".$currentBC;
                $result = $stmt->fetchAll();
                
                array_push($resultInvoice, $result);
            }     
            echo "1*".json_encode($resultInvoice)."*".json_encode($resultStudent);           
        }else{
            echo "0";
        }
    //end of fetch invoice
    }else if(strstr($type, "fetchAllInvoice")){
        require "connect.php";
        
        $stmt = $pdo->prepare("SELECT * FROM invoice");     
        $stmt->execute();
        $result = $stmt->fetchAll();
        if($result != null){
            echo "1*".json_encode($result);
        }else{
            echo "0";
        }
    //end of fetch all invoice
    }else if(strstr($type, "alterInvoices")){
        $target = $_REQUEST['t'];
        $action = $_REQUEST['a'];

        //echo gettype($target);
        
        $targetArray = explode(",", $target);
        
        //trim($targetArray[0], "'");
        //$lastIndex = sizeof($targetArray) - 1;
        //trim($targetArray[$lastIndex], "'");
        //var_dump($targetArray);
        $n = 0;
        $queryCondition = " WHERE ";
        //build WHERE clause
        while($n < sizeof($targetArray)){
            if($n!=0)
                $queryCondition .= " OR ";

            $queryCondition .= "invoice_id =".strval($targetArray[$n]);
            //echo $queryCondition;
            $n+=1;
        }

        //attach to main query
        if(strstr($action, "delete")){
            $query = "DELETE FROM invoice " . $queryCondition;
        }elseif(strstr($action, "approved")){
            $query = "UPDATE invoice SET invoice_status = 'APPROVED'" . $queryCondition;
        }elseif(strstr($action, "rejected")){
            $query = "UPDATE invoice SET invoice_status = 'REJECTED'" . $queryCondition;
        }elseif(strstr($action, "pending")){
            $query = "UPDATE invoice SET invoice_status = 'PENDING'" . $queryCondition;
        }
            
        require "connect.php";
        $stmt = $pdo->prepare($query);       
        if($stmt->execute()){
            echo "1";
        }else{
            echo "0";
        }
    //end of alter invoices
    }else if(strstr($type, "generateInvoice")){
        require "connect.php";
        $year = $_REQUEST['y'];
    
        $stmt = $pdo->prepare("SELECT * FROM student");     
        $stmt->execute();
        $resultStudent = $stmt->fetchAll();
        $resultInvoice = (array)null;
        
        if($resultStudent != null){      
            //echo json_encode($resultStudent);

            foreach($resultStudent as $student){

                //echo gettype($student);

                $currentBC = $student["student_BC"];

                $stmt = $pdo->prepare("SELECT * FROM invoice WHERE student_BC=:currentBC AND invoice_year=:currentYear");     
                $stmt->execute(["currentBC"=>$currentBC, "currentYear"=>$year]);
                $currentResult = $stmt->fetchAll();

                if($currentResult == null){
                    $stmt = $pdo->prepare("INSERT INTO invoice (student_BC, invoice_status, invoice_year) VALUES (?, 'PENDING', ?)");     
                    $stmt->execute([$currentBC, $year]);
                }                    
            }     
            echo "1";           
        }else{
            echo "0";
        }
    //end of generate invoice
    }else if(strstr($type, "createParentAccount")){
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $phone = $_REQUEST['phone'];
        $password = $_REQUEST['password'];
        $ic = $_REQUEST['ic'];

        $children = json_decode($_REQUEST['children']);
        
        require "connect.php";
        $stmt = $pdo->prepare("INSERT INTO parent(parent_icNum, parent_name, parent_email, parent_phone, parent_password) VALUES(?, ?, ?, ?, ?)");
        
            if($stmt->execute([$ic, $name, $email, $phone, $password])){
                $status = "1";
                foreach($children as $child){

                    $stmt = $pdo->prepare("UPDATE student SET parent_icNum =:parentIC WHERE student_BC=:studentBC");

                    if($stmt->execute(["parentIC"=>$ic, "studentBC"=>$child->student_BC]))
                        $status = "1";
                    else
                        $status = "0";
                }
            }else{
                $status = "0";
            }

            echo $status;
    //end of create parent account
    }else if(strstr($type, "fetchCurrentUserInfo")){
        $user1 = $_REQUEST['u'];
        //echo $user1." ";
        require "connect.php";
        $stmt = $pdo->prepare("SELECT parent_icNum, parent_name, parent_email, parent_phone, parent_password FROM parent WHERE parent_icNum = ?");
        $stmt->execute([$user1]);
        $result = $stmt->fetch();
        
        if($result != null){
            echo "1*".json_encode($result);
            
        }else{
            echo "0";
        }

    //end of fetch current user info
    }else if(strstr($type, "removeChildren")){
        $target = $_REQUEST['t'];

        //echo gettype($target);
        
        $targetArray = explode(",", $target);
        
        $n = 0;
        $queryCondition = " WHERE ";
        //build WHERE clause
        while($n < sizeof($targetArray)){
            if($n!=0)
                $queryCondition .= " OR ";

            $queryCondition .= "student_BC = '".strval($targetArray[$n])."'";
            $n+=1;
        }

        require "connect.php";
        $query = "UPDATE student SET parent_icNum = null" . $queryCondition; 
        //echo $query;      
        $stmt = $pdo->prepare($query);       
        if($stmt->execute()){
            echo "1";
        }else{
            echo "0";
        }
    //end of remove children
    }else if(strstr($type, "registerChild")){
        $target = $_REQUEST['t'];
        $parent = $_REQUEST['p'];
        
        require "connect.php";

        $stmt = $pdo->prepare("UPDATE student SET parent_icNum =:parentIC WHERE student_BC=:studentBC");

        if($stmt->execute(["parentIC"=>$parent, "studentBC"=>$target]))
            $status = "1";
        else
            $status = "0";

        echo $status;
    }
    

?>
