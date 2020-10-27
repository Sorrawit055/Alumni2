<?php
    include("connect.php");
    //   print_r($_POST);
    //   print_r($_FILES);
    $id = $_POST["id"];

    $showPersonal = $conn->prepare("SELECT * FROM `register` WHERE `s_id` = '$id' ");
	$showPersonal->execute();
    $resultPersonal = $showPersonal->fetchAll();

 
      echo '<table id="table_details" class="table table-striped table-bordered" style="width:100%">';
      foreach ($resultPersonal as $rowPersonal) {  
            echo'<thead>
                    <tr>
                        <th colspan="3" style="background-color:skyblue" >ข้อมูลส่วนตัว</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width:130px;">ชื่อ - นามสกุล</td>
                        <td>';echo $rowPersonal['s_fname']; echo' </td>
                        <td rowspan="3"  style="width:130px;" >';
                        if($rowPersonal['fileupload'] != "noImage"){
                           echo '<img style="width:125px;border:1px solid #e7ab3c; border-radius: 4px;" id="image"
                        src="fileupload/'; echo $rowPersonal['fileupload']; echo ' ">';
                        }
                        else{
                            echo '<img style="width:125px;border:1px solid #e7ab3c; border-radius: 4px;" id="image"
                            src="img/user.png">';
                        }
                         echo' </td>
                    </tr>
                    <tr>
                        <td>เพศ</td>
                        <td>';echo $rowPersonal['s_gender']; echo' </td>
                    </tr>
                    <tr>
                        <td>วันเดือนปีเกิด</td>
                        <td>';echo $rowPersonal['s_bday']; echo' </td>
                    </tr>
                    <tr>
                        <td>ที่อยู่</td>
                        <td colspan="2">';echo $rowPersonal['address1'];  echo ' '; echo $rowPersonal['address2']; echo ' ';echo $rowPersonal['address3']; echo ' ';echo $rowPersonal['address4'];echo ' ';echo $rowPersonal['address5'];  echo' </td>
                    </tr>
                    <tr>
                        <td>เบอร์โทรศัพท์</td>
                        <td colspan="2">';echo $rowPersonal['s_phone']; echo' </td>

                    </tr>
                    <tr>
                        <td>Facebook</td>
                        <td colspan="2">';echo $rowPersonal['s_facebook']; echo' </td>

                    </tr>
                    <tr>
                        <td>Email</td>
                        <td colspan="2">';echo $rowPersonal['s_email']; echo' </td>
                    </tr>

                </tbody>';
           
                };

            echo'</table>';
       


?>