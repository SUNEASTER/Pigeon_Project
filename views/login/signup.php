<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Open Sans','Prompt', sans-serif ;
    }

    .main{
        display: flex;
        flex-direction : row;
        margin-left: 0px;
        height: 800px;
        width: 100%;
    }

    input[type=text], input[type=password] {
        width: 80%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type=text]:hover, input[type=password]:hover {
        border: 1px solid #058dc1;
    }

    button[type=submit] {
        width: 80%;
        background-color: #0394c9;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type=submit]:hover {
        background-color: #0386ba;
    }

    .content {
        width: 80%;
        border-radius: 5px;
        background-color: white;
    }
    .content .regis{
        background-color: white;  
        color: #004366; 
        border: 1px solid #058dc1;
    }
    
    .content .regis:hover{
        color: white;
        background-color: #0386ba;
    }
    .footer {
        left: 0;
        bottom: 0;
        margin-top: -60px;
        width: 100%;
        color: #75777c;
        text-align: center;
        font-size: 11px;
    }

    nav {
        padding: 14px 16px;
        text-decoration: none;
    }

    a{
        color: #75777c;
        text-align: center;
        padding: 14px 11px;
    }

    b{
        font-size: 4px;
        color: blue;
    }

</style>
<body>
    <form action="" method="GET">
        <div class="main">
            <div style=" width: 60%;">
                <img style="height: 92%; width: 100%; margin-left: 0px;" src="./resources/11.png">
            </div>
            <div style=" width: 40%; padding-left: 50px; padding-top: 10px;">
                <div>
                    <img style="height: 20%; width: 20%; margin-left: 0px;" src="./resources/12.jpg">
                </div>
                <div style="padding-top: 30px; padding-bottom: 10px;">
                    <h1>สมัครสมาชิก Pigeon</h1>
                </div>
                <div class="content">
                    <input type="text" id="email" name="email" placeholder="อีเมล">
                    <p style="color: red; font-size: 6px;" id="warning">แจ้งเตือน!</p>
                    <input type="text" id="username" name="username" placeholder="ชื่อผู้ใช้">
                    <p style="color: red; font-size: 6px;" id="warning">แจ้งเตือน!</p>
                    <input type="password" id="pass" name="pass" placeholder="รหัสผ่าน">
                    <p style="color: red; font-size: 6px;" id="warning">แจ้งเตือน!</p>
                    <input type="password" id="pass" name="pass" placeholder="ยืนยันรหัสผ่าน">
                    <p style="color: red; font-size: 6px;" id="warning">แจ้งเตือน!</p>
                    <br>
                    <b style="color: black;">การสมัครนี้จะถือว่าคุณยอมรับ </b> <b>ข้อตกลงการใช้งาน</b> <b style="color: black;">และ</b> 
                    <b>นโยบายความเป็นส่วนตัว</b> 
                    <br>
                    <b style="color: black;">รวมถึง</b> <b>การใช้คุกกี้</b>
                    <br>
                    <button type="submit" name="action" value="signupForm" onclick="validate(this.value)">สมัครสมาชิก</button>
                </div>
                <div class="content" style="padding-top: 20px;">
                    <button class="regis" type="submit" name="action" value="login" onclick="validate(this.value)">เข้าสู่ระบบ</button>
                </div>
            </div>
        </div>
    </form>
    <div class="footer">
        <nav>
            <a href="#">เกี่ยวกับ</a>
            <a href="#">ศูนย์ความช่วยเหลือ</a>
            <a href="#">ข้อตกลงการให้บริการ</a>
            <a href="#">นโยบายความเป็นส่วนตัว</a>
            <a href="#">นโยบายคุกกี้</a>
            <a href="#">การเข้าถึง</a>
            <a href="#">ข้อมูลโฆษณา</a>
            <a href="#">บล็อก</a>
            <a href="#">สถานะ</a>
            <a href="#">อาชีพ</a>
            <a href="#">ทรัพยากรด้านแบรนด์</a>
            <a href="#">โฆษณา</a>
            <a href="#">การตลาด</a>
            <a href="#">ทวิตเตอร์สำหรับธุรกิจ</a>
            <a href="#">นักพัฒนา</a>
            <a href="#">ไดเรกทอรี</a>
            <a href="#">การตั้งค่า</a>
        </nav>
        
        <p>© 2022 Pigeon, Inc.</p>
    </div>
    <script>
        function validate(action) {
            var id = document.getElementById("id");
            id.value = id.value.trim();
            id.setCustomValidity('');
            var pass = document.getElementById("pass");
            pass.value = pass.value.trim();
            pass.setCustomValidity('');
            
            if(action == "login"){
                if(id.value == ""){
                    id.setCustomValidity('กรุณาใส่ไอดี');
                }
                else if(pass.value == ""){
                    pass.setCustomValidity('กรุณาใส่รหัสผ่าน');
                }
            }
        }
    </script>
</body>
</html>