
<?php
$con= mysqli_connect("localhost","root","","top1") or die("Error: " . mysqli_error($con));
 
mysqli_query($con, "SET NAMES 'utf8' ");
 

$fileupload = $_REQUEST['fileupload']; //รับค่าไฟล์จากฟอร์ม		
$s_title = $_REQUEST['s_title']; //รับค่าไฟล์จากฟอร์ม		
$s_gender = $_REQUEST['s_gender']; //รับค่าไฟล์จากฟอร์ม		
$s_fname = $_REQUEST['s_fname']; //รับค่าไฟล์จากฟอร์ม		
$s_lname = $_REQUEST['s_lname']; //รับค่าไฟล์จากฟอร์ม	
$s_nickname = $_REQUEST['s_nickname']; //รับค่าไฟล์จากฟอร์ม		
$s_bday = $_REQUEST['s_bday']; //รับค่าไฟล์จากฟอร์ม		
$s_facebook = $_REQUEST['s_facebook']; //รับค่าไฟล์จากฟอร์ม		
$s_email = $_REQUEST['s_email']; //รับค่าไฟล์จากฟอร์ม		
$s_password = $_REQUEST['s_password']; //รับค่าไฟล์จากฟอร์ม		
$s_repassword = $_REQUEST['s_repassword']; //รับค่าไฟล์จากฟอร์ม		
$address1 = $_REQUEST['address1']; //รับค่าไฟล์จากฟอร์ม		
$address2 = $_REQUEST['address2']; //รับค่าไฟล์จากฟอร์ม		
$address3 = $_REQUEST['address3']; //รับค่าไฟล์จากฟอร์ม		
$address4 = $_REQUEST['address4']; //รับค่าไฟล์จากฟอร์ม		
$address5 = $_REQUEST['address5']; //รับค่าไฟล์จากฟอร์ม		
$s_generation = $_REQUEST['s_generation']; //รับค่าไฟล์จากฟอร์ม		
$s_address = $_REQUEST['s_address']; //รับค่าไฟล์จากฟอร์ม		
$s_position = $_REQUEST['s_position']; //รับค่าไฟล์จากฟอร์ม	
$s_year = $_REQUEST['s_year']; //รับค่าไฟล์จากฟอร์ม		
$s_class = $_REQUEST['s_class']; //รับค่าไฟล์จากฟอร์ม		

$s_phone = $_REQUEST['s_phone']; //รับค่าไฟล์จากฟอร์ม		
$date = date("d-m-Y"); //กำหนดวันที่และเวลา
$upload=$_FILES['fileupload'];
if($upload <> '') {   
$path="fileupload/";  
	$remove_these = array(' ','`','"','\'','\\','/','_');
	$newname = str_replace($remove_these, '', $_FILES['fileupload']['name']);
	$newname = time().'-'.$newname;
$path_copy=$path.$newname;
$path_link="fileupload/".$newname;
move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);  	
	}
		$sql = "INSERT INTO register (fileupload,s_title,s_gender,s_fname,s_lname,s_nickname,s_bday,s_facebook,s_email,s_password,s_repassword
        ,address1,address2,address3,address4,address5,s_generation,s_address,s_position,s_phone,s_year,s_class) 
		VALUES('$newname','$s_title','$s_gender','$s_fname','$s_lname','$s_nickname','$s_bday','$s_facebook','$s_email','$s_password','$s_repassword'
        ,'$address1','$address2','$address3','$address4','$address5','$s_generation','$s_address','$s_position','$s_phone','$s_year','$s_class')";
		$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	mysqli_close($con);	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('ลงทะเบียนเสร็จสิ้น');";
	echo "window.location = 'index.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to upload again');";
	echo "</script>";
}
?>