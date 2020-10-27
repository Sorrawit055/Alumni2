<?php include("head.php") ?>
<style>
.edit {
    background-color: #e7ab3c;
    color: #fff;
}
</style>

<!-- -->
<div class="container">
    <br>
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="contact-widget">
                <div class="cw-item">
                    <div class="ci-text">
                        <h3>แก้ไขประวัติส่วนตัว</h3>
                    </div>
                </div>
            </div>
            <form action="db_update.php" method="post" enctype="multipart/form-data" id="form1">
                <?php
                $id =  $_SESSION["s_id"];
                $showPersonal = $conn->prepare("SELECT * FROM `register` WHERE `s_id` = '$id' ");
	            $showPersonal->execute();
                $resultPersonal = $showPersonal->fetchAll();

                ?>
                <br>
                <h3><span class="badge" style="background-color:skyblue">ข้อมูลส่วนตัว</span></h3>
                <hr>

                <?php foreach ($resultPersonal as $rowPersonal) { ?>
                <div class="form-row">
                    <div class="form-group col-md-3">
                    <?php 
                    $imgPersonal = $rowPersonal['fileupload'];
                    if($imgPersonal != "noImage"){
                        echo '<img style="width:125px;border:1px solid #e7ab3c; border-radius: 4px;" id="image" src="fileupload/'.$imgPersonal.'">';
                    }
                    else{ echo '<img style="width:125px;border:1px solid #e7ab3c; border-radius: 4px;" id="image"
                        src="img/user.png">';}
                    ?>
                    </div>
                    <div class="form-group col-md-9">
                        <input type="file" id="fileupload" class="form-control" onchange="readURL(this);"
                            accept="image/*" name="fileupload"   >
                        <br>
                        <input type="text" class="form-control" value="<?php echo $rowPersonal['s_id']; ?>" readonly  hidden >
                        <input type="text" value="<?php echo $rowPersonal['s_id']; ?>" name="s_id" hidden>
                    </div>
                    <div class="form-group col-md-6">
                        <label>เพศ</label>
                        <select class="form-control" name="s_title">
                            <option value='-'>-</option>
                            <?php if($rowPersonal['s_title'] == "นาย"){
                                echo "<option value='นาย' selected>นาย</option>";
                            }
                            else { 
                                echo "<option value='นาย' >นาย</option>";
                            } ?>
                            <?php if($rowPersonal['s_title'] == "นางสาว"){
                                echo "<option value='นางสาว' selected>นางสาว</option>";
                            }
                            else { 
                                echo "<option value='นางสาว' >นางสาว</option>";
                            } ?>
                            <?php if($rowPersonal['s_title'] == "นาง"){
                                echo "<option value='นาง' selected>นาง</option>";
                            }
                            else { 
                                echo "<option value='นาง' >นาง</option>";
                            } ?>
                            
                        </select>
                    </div>    <div class="form-group col-md-6">
                        <label>เพศ</label>
                        <select class="form-control" name="s_gender">
                            <option value='-'>-</option>
                            <?php if($rowPersonal['s_gender'] == "ชาย"){
                                echo "<option value='ชาย' selected>ชาย</option>";
                            }
                            else { 
                                echo "<option value='ชาย' >ชาย</option>";
                            } ?>
                            <?php if($rowPersonal['s_gender'] == "หญิง"){
                                echo "<option value='หญิง' selected>หญิง</option>";
                            }
                            else { 
                                echo "<option value='หญิง' >หญิง</option>";
                            } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>ชื่อ </label>
                        <input type="text" class="form-control" value="<?php echo $rowPersonal['s_fname']; ?>" name="s_fname">
                    </div>
                    <div class="form-group col-md-6">
                        <label> นามสกุล </label>
                        <input type="text" class="form-control" value="<?php echo $rowPersonal['s_lname']; ?>" name="s_lname">
                    </div>
                     <div class="form-group col-md-6">
                <label> ชื่อเล่น </label>
                        <input type="text" class="form-control" value="<?php echo $rowPersonal['s_nickname']; ?>" name="s_nickname">
                    </div>
                    <div class="form-group col-md-6">
                        <label>วันเดือนปีเกิด </label>
                        <input type="date" class="form-control" value="<?php echo $rowPersonal['s_bday']; ?>" name="s_bday">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" value="<?php echo $rowPersonal['s_phone']; ?>" name="s_phone">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Facebook</label>
                        <input type="text" class="form-control" value="<?php echo $rowPersonal['s_facebook']; ?>" name="s_facebook">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Email</label>
                        <input type="text" class="form-control" value="<?php echo $rowPersonal['s_email']; ?>" name="s_email">
                    </div>
                    <div class="form-group col-md-12">
                    </div>
                    <h3><span class="badge" style="background-color:skyblue">ข้อมูลที่อยู่</span></h3>

                    <div class="form-group col-md-12">
                    <br>
                        <label> บ้านเลขที่ </label>
                        <input type="text" class="form-control" value="<?php echo $rowPersonal['address1']; ?>" name="address1">
                    </div> <div class="form-group col-md-6">
                        <label> ตำบล </label>
                        <input type="text" class="form-control" value="<?php echo $rowPersonal['address2']; ?>" name="address2">
                    </div> <div class="form-group col-md-6">
                        <label> อำเภอ </label>
                        <input type="text" class="form-control" value="<?php echo $rowPersonal['address3']; ?>" name="address3">
                    </div> <div class="form-group col-md-6">
                        <label> จังหวัด </label>
                        <input type="text" class="form-control" value="<?php echo $rowPersonal['address4']; ?>" name="address4">
                    </div>
                    <br>
                    <div class="form-group col-md-6">
                        <label> รหัสไปรษณีย์ </label>
                        <input type="text" class="form-control" value="<?php echo $rowPersonal['address5']; ?>" name="address5">
                    </div> 
                    <h3><span class="badge" style="background-color:skyblue">ข้อมูลที่ทำงาน</span></h3>

<div class="form-group col-md-12">
<br>
    <label> รุ่นที่ </label>
    <input type="text" class="form-control" value="<?php echo $rowPersonal['s_generation']; ?>" name="s_generation">
</div> <div class="form-group col-md-6">
    <label> ที่อยู่ </label>
    <input type="text" class="form-control" value="<?php echo $rowPersonal['s_address']; ?>" name="s_address">
</div> <div class="form-group col-md-6">
    <label> ตำเเหน่ง </label>
    <input type="textarea" class="form-control" value="<?php echo $rowPersonal['s_position']; ?>" name="s_position">
</div> 
                </div>
                <?php }; ?>
                <!--  -->
               
                <div>
                    <button type="submit"  class="btn btn-secondary">บันทึกข้อมูล</button>
                    <a href="index.php"><button type="button" class="btn btn-secondary style="background-color:skyblue">ยกเลิก</button> </a>
                </div>




            </form>

        </div>
    </div>
    <br>
    <br>
</div>


<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
};
</script>




<?php include("footer.php") ?>