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
                    echo "1".$userType;
                }

    //end of verifyLogin
    }
    

?>
