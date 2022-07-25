<?php

    //$target = $_POST['inputFile'];
    //echo $target;
    $fileName = $_FILES['inputFile']['name'];
    if($fileName != null){
        echo "file received<br>";
    }
        
    
    //print_r($_FILES);
    echo "file received: ".$_FILES['inputFile']['name'];
    $hiddens = $_POST['hidden'];
    echo"<br>";
    $tempArray = explode("*", $hiddens);
    $targetParent = $tempArray[0];
    $targetYear = $tempArray[1];
   // $fileRec = $tempArray[2];
    
    $location = "uploads/".$fileName;
    echo var_dump($tempArray);

    $newName = $targetParent."_".$targetYear;

    if(move_uploaded_file($_FILES['inputFile']['tmp_name'], $location)){
        echo "uploaded!";
        require "../connect.php";

        $stmt = $pdo->prepare("SELECT * FROM student WHERE parent_icNum=:targetParent");
        $stmt->execute(["targetParent"=>$targetParent]);
        $resultStudent = $stmt->fetchAll();

        foreach($resultStudent as $student){
            $stmt = $pdo->prepare("UPDATE invoice SET invoice_attach =:input WHERE student_BC=:currentTarget AND invoice_year=:targetYear");
            
            if($stmt->execute(["input"=>$fileName = $_FILES['inputFile']['name'], "currentTarget"=>$student["student_BC"], "targetYear"=>$targetYear])){
                echo"\nupdated a row!\n";
            }
        }
        die();
    }else{
        echo "failed!";
    }

?>