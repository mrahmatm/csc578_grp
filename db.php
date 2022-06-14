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
    }
    

?>
