<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบสมาชิกศิษย์เก่า</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">

    <link href="source/dataTables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <div class="g"><img src="img/01.png" class="img-fluid"  width="" height=""alt="Responsive image">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp; ระบบลงทะเบียนสมาชิกศิษย์เก่ามหาวิทยาลัยราชภัฎนครปฐม
  </div>  <style>
  h5{
  font-size: 13px;
}
   .g {
  background-color: gray;
  font-size: 30px;
}
.dropbtn {
  background-color: green;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: green;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
<?php  include("connect.php");  ?>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">
           
                    <div class="col-lg-2 text-right col-md-2">
                    <!-- XXXX -->
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <nav class="nav-menu mobile-menu">
                    <ul>
                    
                        <li class="index"><a href="index.php">หน้าแรก</a></li>
                        <li class="find"><a href="find.php">ตรวจค้นหารายชื่อ</a></li>

                        <?php if(!isset($_SESSION["s_email"])){ ?>
                        <li><a href="#"  data-toggle="modal" data-target="#login">เข้าสู่ระบบ</a></li>
                        <li class="register"><a href="register.php">ลงทะเบียน</a></li>
                        <?php   }; ?>
                    

              
                        <?php if(isset($_SESSION["s_email"])){ ?>

                        <li class="edit"><a href="edit.php">ประวัติส่วนตัว</a></li>

                        <li><a href="#" ><?php if(isset($_SESSION["s_email"])){
                                echo '<h5 style="color:red">ผู้ใช้งาน : '.$_SESSION["s_email"].'</h5>';
                            };
                                ?></a></li>

                        <li><a href="#"  data-toggle="modal" data-target="#logout">ออกจากระบบ</a></li>
                        
                        
                        <?php   }; ?>

                    </ul>
                    &nbsp;&nbsp;&nbsp;&nbsp;
               
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
        <div class="nav-item" style="background-color: #fff;">
        </div>
    
    </header>
    <!-- Header End -->