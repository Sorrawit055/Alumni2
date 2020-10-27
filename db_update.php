<?php
    include("connect.php");
      // print_r($_POST);
      // print_r($_FILES);
      $s_id = $_POST["s_id"];
      $s_title = $_POST["s_title"];
      $s_gender = $_POST["s_gender"];
      $s_fname = $_POST["s_fname"];
      $s_lname = $_POST["s_lname"];
      $s_nickname = $_POST["s_nickname"];
      $s_bday = $_POST["s_bday"];
      $s_phone = $_POST["s_phone"];
      $s_facebook = $_POST["s_facebook"];
      $s_email = $_POST["s_email"];
      $address1 = $_POST["address1"];
      $address2 = $_POST["address2"];
      $address3 = $_POST["address3"];
      $address4 = $_POST["address4"];
      $address5 = $_POST["address5"];
      $s_generation = $_POST["s_generation"];
      $s_address = $_POST["s_address"];
      $s_position = $_POST["s_position"];
      $imgName = $_FILES["fileupload"]["name"];
      $temName = $_FILES["fileupload"]["tmp_name"];


      if($imgName ==  ""){
            try{   
                  // ไม่มีการอัปเดตรูป
                    $insert = $conn->prepare("UPDATE `register` SET `s_fname`=:s_fname,`s_lname`=:s_lname,`s_gender`=:s_gender
                    ,`s_title`=:s_title,`s_nickname`=:s_nickname,`s_bday`=:s_bday,`s_facebook`=:s_facebook,`s_email`=:s_email
                    ,`address1`=:address1,`address2`=:address2,`address3`=:address3,`address4`=:address4,`address5`=:address5
                    ,`s_generation`=:s_generation ,`s_address`=:s_address ,`s_position`=:s_position,`s_phone`=:s_phone
                     WHERE `s_id` = :s_id");
                    $insert->bindparam(":s_id",$s_id);
                    $insert->bindparam(":s_title",$s_title);
                    $insert->bindparam(":s_gender",$s_gender);
                    $insert->bindparam(":s_fname",$s_fname);
                    $insert->bindparam(":s_lname",$s_lname);
                    $insert->bindparam(":s_nickname",$s_nickname);
                    $insert->bindparam(":s_bday",$s_bday);
                    $insert->bindparam(":s_facebook",$s_facebook);
                    $insert->bindparam(":s_phone",$s_phone);
                    $insert->bindparam(":s_email",$s_email);
                    $insert->bindparam(":address1",$address1);
                    $insert->bindparam(":address2",$address2);
                    $insert->bindparam(":address3",$address3);
                    $insert->bindparam(":address4",$address4);
                    $insert->bindparam(":address5",$address5);
                    $insert->bindparam(":s_generation",$s_generation);
                    $insert->bindparam(":s_address",$s_address);
                    $insert->bindparam(":s_position",$s_position);


                    $insert->execute();
              }
              catch(PDOException $error){
                    echo $sql . "<br>" . $error->getMessage();
              }
            // echo "1";
      }
      else{
            try{   
                  if (is_uploaded_file($temName)) {
                        $url = "fileupload/";
                        $destination = $url.$imgName;
                        move_uploaded_file($temName,$destination);
                        $fileupload = $imgName;
                    }
                   else { $fileupload = 'noImage';}  
       // ไม่มีการอัปเดตรูป
      // ไม่มีการอัปเดตรูป
                    $insert = $conn->prepare("UPDATE `register` SET `s_fname`=:s_fname,`s_lname`=:s_lname,`s_gender`=:s_gender
                    ,`s_title`=:s_title,`s_nickname`=:s_nickname,`s_bday`=:s_bday,`s_facebook`=:s_facebook,`s_email`=:s_email
                    ,`address1`=:address1,`address2`=:address2,`address3`=:address3,`address4`=:address4,`address5`=:address5
                    ,`s_generation`=:s_generation ,`s_address`=:s_address ,`s_position`=:s_position,`fileupload`=:fileupload,`s_phone`=:s_phone
                     WHERE `s_id` = :s_id");
                    $insert->bindparam(":s_id",$s_id);
                    $insert->bindparam(":s_title",$s_title);
                    $insert->bindparam(":s_gender",$s_gender);
                    $insert->bindparam(":s_fname",$s_fname);
                    $insert->bindparam(":s_lname",$s_lname);
                    $insert->bindparam(":s_nickname",$s_nickname);
                    $insert->bindparam(":s_phone",$s_phone);
                    $insert->bindparam(":s_bday",$s_bday);
                    $insert->bindparam(":s_facebook",$s_facebook);
                    $insert->bindparam(":s_email",$s_email);
                    $insert->bindparam(":address1",$address1);
                    $insert->bindparam(":address2",$address2);
                    $insert->bindparam(":address3",$address3);
                    $insert->bindparam(":address4",$address4);
                    $insert->bindparam(":address5",$address5);
                    $insert->bindparam(":s_generation",$s_generation);
                    $insert->bindparam(":s_address",$s_address);
                    $insert->bindparam(":s_position",$s_position);
                    $insert->bindparam(":fileupload",$fileupload);


                    $insert->execute();
            }
            catch(PDOException $error){
                  echo $sql . "<br>" . $error->getMessage();
            }      
      }

      // exit();
      

    

      header("Location: edit.php");


?>