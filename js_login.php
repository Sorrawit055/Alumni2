<?php
    include('connect.php');



      $login_email = $_POST["login_email"];
      $login_password = $_POST["login_password"];

    try{   
        $insert = $conn->prepare("SELECT * FROM `register` WHERE `s_email` = :login_email AND  `s_password` = :login_password");
        $insert->bindparam(":login_email",$login_email);
        $insert->bindparam(":login_password",$login_password);
        $insert->execute();
        $result = $insert->fetchAll();

        foreach ($result as $row) {  
            $_SESSION["s_email"] =  $row['s_email'];
            $_SESSION["s_password"] =  $row['s_password'];
            $_SESSION["s_fname"] =  $row['s_fname'];
            $_SESSION["s_id"] =  $row['s_id'];

            echo $row['s_fname'];
        };

        if(!isset( $_SESSION["s_fname"])){
            echo "error";
        }
    
    }
    catch(PDOException $error){
        // echo $sql . "<br>" . $error->getMessage();
        echo "error";
    }


    ?>