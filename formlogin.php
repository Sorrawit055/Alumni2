<?php  
 session_start();  
 $host = "localhost";  
 $username = "root";  
 $password = "12345678";  
 $database = "top1";  
 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["s_email"]) || empty($_POST["s_password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM register WHERE s_email = :s_email AND s_password = :s_password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          's_email'     =>     $_POST["s_email"],  
                          's_password'     =>     $_POST["s_password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["s_email"] = $_POST["s_email"];  
                  
                     echo("<script>alert('คุณได้ทำการล็อคอินเเล้วเสร็จเเล้ว!')</script>");
    echo("<script>window.location = 'index.php';</script>");
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | PHP Login Script using PDO</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head> 
       <body bgcolor="pink">
<?php include 'bar.php';?>
           <div class="container" style="width:1000px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
              <div class="event_location" >  <h1 align="">เข้าสู่ระบบ</h1><br />  </div>
                <form method="post">  
                <div class="event_location" ><label>อีเมล</label>  </div>
                     <input type="text" name="s_email" class="form-control" />  
                     <br />  
                     <div class="event_location" > <label>รหัสผ่าน</label>  </div>
                     <input type="password" name="s_password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" class="btn btn-info" value="Login" />  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  
 <br>
 <?php include 'footer.php';?>
