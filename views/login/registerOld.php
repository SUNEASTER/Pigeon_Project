<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Kanit%7CPrompt');
    *{
        font-family: 'Open Sans','Prompt', sans-serif;
    }
    button{
        background-color: #ffff;
        display: block;
        margin: auto;
        width: 100%;
        height: 5%;
    }

    p {
        color:#ffff;
    }

    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    #warning{
        font-size:20px;
        text-align: start;
        margin-left: 15px;
        color:red;
    }
  

</style>
<body>

    <div style="background-color: #093e68; width: 1450px; height: 1425px; border-radius: 50px; margin-top: 25px; margin-bottom: 25px;" class="mx-auto align-self-center">    
    <div class="container">
    <img src="../resources/LOGO MHI.png" alt="MHI" width="30%"  >
        <!-- <h3 style="color:#ffff;text-align: center; padding-top : 25;"class="mt-4">สมัครสมาชิก</h3> -->
        <hr>
        <form action="" method="GET">

                        <div class="form-group" >
                            <label style="color:#ffff;" class="form-control-lg" >หมายเลขบัตรประชาชน</label><br>
                            <input type="text" name="idcard" id="idcard" placeholder="กรอกเลขบัตรประชาชน 13 หลัก" class="form-control form-control-lg" value="<?php echo $idcard; ?>"/>
                        </div>
                        <br>
                        <div class="form-group" >
                            <label style="color:#ffff;" class="form-control-lg" >ชื่อ</label><br>
                            <input type="text" name="fn" id="fn" placeholder="กรอกชื่อจริง" class="form-control form-control-lg" value="<?php echo $fn; ?>"/>
                        </div>
                        <br>
                        <div class="form-group" >
                            <label style="color:#ffff;" class="form-control-lg" >นามสกุล</label><br>
                            <input type="text" name="ln" id="ln" placeholder="กรอกนามสกุล" class="form-control form-control-lg" value="<?php echo $ln; ?>"/>
                        </div>
                        <br>

                        <div class="form-group" id="show" >
                            <label style="color:#ffff;" class="form-control-lg">เพศ</label><br>
                            <input type="radio" id="male" name="gender" value="ชาย" <?php if($gender == "ชาย") {echo " checked";}?>>
                            <label style="color:#ffff;"for="Male">ชาย</label>
                            <input type="radio" id="female" name="gender" value="หญิง" <?php if($gender == "หญิง") {echo " checked";}?>>
                            <label style="color:#ffff;" for="Female">หญิง</label><br>
                        </div>
                        <br>

                        <div class="form-group" >
                            <label style="color:#ffff;" class="form-control-lg" >วัน/เดือน/ปีเกิด</label><br>
                            <input type="date" name="dob" id="dob" class="form-control form-control-lg" value="<?php echo $dob; ?>"/>
                        </div>
                        <br>

                        <div class="form-group" >
                            <label style="color:#ffff;" class="form-control-lg" >เบอร์โทรติดต่อ</label><br>
                            <input type="text" name="pn" id="pn" placeholder="กรอกเบอร์โทรติดต่อ"  class="form-control form-control-lg" value="<?php echo $pn; ?>"/>
                        </div>
                        <br>

                        <div class="form-group" >
                            <label style="color:#ffff;" class="form-control-lg" >รหัสผ่าน</label><br>
                            <input type="password" name="p1" id="p1" placeholder="กรอกรหัสผ่าน"class="form-control form-control-lg" />
                        </div>
                        <br>

                        <div class="form-group" >
                            <label style="color:#ffff;" class="form-control-lg" >ยืนยันรหัสผ่าน</label><br>
                            <input type="password" name="p2" id="p2" placeholder="ยืนยันรหัสผ่าน" class="form-control form-control-lg" />
                        </div>
                        <br>

                        <input type="hidden" name="controller" value="login"/>

                        <div class="form-group" >
                            <b <?php if(!isset($_GET['error'])) echo " style= visibility:hidden";?>><p id="warning" ><?php echo $warning;?> !</p></b>
                        </div>

                        <div class="form-group">
                            <button class="button button1" type="submit" name="action" value="register" onclick="validate()">สมัครสมาชิก</button>
                        </div>

        </form>
        <hr>
        <p>มีสมาชิกเเล้วใช่ไหม คลิ๊กที่นี่เพื่อ <a href="?controller=login&action=loginForm">เข้าสู่ระบบ</a></p>
    </div>
    </div>

    <script>
    function validate() {
        var idcard = document.getElementById("idcard");
        idcard.value = idcard.value.trim();
        idcard.setCustomValidity('');
        var fn = document.getElementById("fn");
        fn.value = fn.value.trim();
        fn.setCustomValidity('');
        var ln = document.getElementById("ln");
        ln.value = ln.value.trim();
        ln.setCustomValidity('');
        var male = document.getElementById("male");
        male.setCustomValidity('');
        var female = document.getElementById("female");
        female.setCustomValidity('');
        var dob = document.getElementById("dob");
        dob.setCustomValidity('');
        var pn = document.getElementById("pn");
        pn.value = pn.value.trim();
        pn.setCustomValidity('');
        var p1 = document.getElementById("p1");
        p1.value = p1.value.trim();
        p1.setCustomValidity('');
        var p2 = document.getElementById("p2");
        p2.value = p2.value.trim();
        p2.setCustomValidity('');
        
        if(idcard.value == "") {
            idcard.setCustomValidity('กรุณาใส่เลขบัตรประชาชน');
        }
        else if(idcard.value.length != 13 || !Number.isInteger(Number(idcard.value))) {
            idcard.setCustomValidity('เลขบัตรประชาชนต้องเป็นตัวเลข 13 หลัก');
        }
        else if(fn.value == "") {
            fn.setCustomValidity('กรุณาใส่ชื่อจริง');
        }
        else if(ln.value == "") {
            ln.setCustomValidity('กรุณาใส่นามสกุล');
        }
        else if(!(male.checked || female.checked) ){
            male.setCustomValidity('กรุณาเลือกเพศ');
        }
        else if(dob.value == ""){
            dob.setCustomValidity('กรุณาเลือกวัน/เดือน/ปีเกิด');
        }
        else if(pn.value == ""){
            pn.setCustomValidity('กรุณาใส่เบอร์โทรติดต่อ');
        }
        else if(pn.value.length != 10 || !Number.isInteger(Number(pn.value))){
            pn.setCustomValidity('เบอร์โทรติดต่อต้องเป็นตัวเลข 10 หลัก');
        }
        else if(p1.value == ""){
            p1.setCustomValidity('กรุณาใส่รหัสผ่าน');
        }
        else if(p1.value.length < 8 || p1.value.length > 15){
            p1.setCustomValidity('รหัสผ่านต้องมีความยาวตั้งแต่ 8-15');
        }
        else if(p1.value != p2.value){
            p2.setCustomValidity('การยืนยันรหัสผ่านไม่เหมือนกันกับรหัสผ่าน');
        }
    }
    </script>
    
</body>
</html>