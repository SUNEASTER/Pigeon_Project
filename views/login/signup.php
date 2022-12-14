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
    <div class="main">
        <div style=" width: 60%;">
            <img style="height: 92%; width: 100%; margin-left: 0px;" src="./resources/11.png">
        </div>
        <div style=" width: 40%; padding-left: 50px; padding-top: 10px;">
            <div>
                <img style="height: 20%; width: 20%; margin-left: 0px;" src="./resources/12.jpg">
            </div>
            <div style="padding-top: 30px; padding-bottom: 10px;">
                <h1>????????????????????????????????? Pigeon</h1>
            </div>
            <div class="content">
                <form action="" method="GET">
                    <input type="text" id="email" name="email" placeholder="???????????????">
                    <p style="color: red; font-size: 6px; <?php if($error % 3 != 0) echo " visibility:hidden";?>" id="warning">email ?????????????????????????????????????????????!</p>
                    <input type="text" id="username" name="username" placeholder="??????????????????????????????">
                    <p style="color: red; font-size: 6px; <?php if($error % 2 != 0) echo " visibility:hidden";?>" id="warning">username ?????????????????????????????????????????????!</p>
                    <input type="password" id="pass" name="pass" placeholder="????????????????????????">
                    <p style="color: red; font-size: 6px; visibility:hidden;" id="warning">???????????????????????????!</p>
                    <input type="password" id="comfirmPass" name="comfirmPass" placeholder="??????????????????????????????????????????">
                    <br>
                    <b style="color: black;">???????????????????????????????????????????????????????????????????????????????????? </b> <b>????????????????????????????????????????????????</b> <b style="color: black;">?????????</b> 
                    <b>???????????????????????????????????????????????????????????????</b> 
                    <br>
                    <b style="color: black;">??????????????????</b> <b>????????????????????????????????????</b>
                    <br>
                    <input type="hidden" name="controller" value="login"/>
                    <button type="submit" name="action" value="signup" onclick="validate(this.value)">?????????????????????????????????</button>
                </form>
            </div>
            <div class="content" style="padding-top: 20px;">
                <form action="" method="GET">
                    <input type="hidden" name="controller" value="login"/>
                    <button class="regis" type="submit" name="action" value="loginForm">?????????????????????????????????</button>
                </form> 
            </div>
        </div>
    </div>
    <div class="footer">
        <nav>
            <a href="#">???????????????????????????</a>
            <a href="#">??????????????????????????????????????????????????????</a>
            <a href="#">?????????????????????????????????????????????????????????</a>
            <a href="#">???????????????????????????????????????????????????????????????</a>
            <a href="#">????????????????????????????????????</a>
            <a href="#">??????????????????????????????</a>
            <a href="#">?????????????????????????????????</a>
            <a href="#">???????????????</a>
            <a href="#">???????????????</a>
            <a href="#">???????????????</a>
            <a href="#">??????????????????????????????????????????????????????</a>
            <a href="#">???????????????</a>
            <a href="#">?????????????????????</a>
            <a href="#">???????????????????????????????????????????????????????????????</a>
            <a href="#">????????????????????????</a>
            <a href="#">???????????????????????????</a>
            <a href="#">??????????????????????????????</a>
        </nav>
        
        <p>?? 2022 Pigeon, Inc.</p>
    </div>
    <script>
        function validate(action) {
            var email = document.getElementById("email");
            email.value = email.value.trim();
            email.setCustomValidity('');
            var username = document.getElementById("username");
            username.value = username.value.trim();
            username.setCustomValidity('');
            var pass = document.getElementById("pass");
            pass.value = pass.value.trim();
            pass.setCustomValidity('');
            var comfirmPass = document.getElementById("comfirmPass");
            comfirmPass.value = comfirmPass.value.trim();
            comfirmPass.setCustomValidity('');
            if(action == "signup"){
                if(email.value == ""){
                    email.setCustomValidity('???????????????????????????????????????');
                }
                else if(email.value.indexOf("@") == -1){
                    email.setCustomValidity('?????????????????????????????????????????????????????????????????????');
                }
                else if(username.value == ""){
                    username.setCustomValidity('??????????????????????????????????????????????????????');
                }
                else if(pass.value == ""){
                    pass.setCustomValidity('????????????????????????????????????????????????');
                }
                else if(comfirmPass.value == ""){
                    comfirmPass.setCustomValidity('?????????????????????????????????????????????????????????');
                }
                else if(pass.value != comfirmPass.value){
                    comfirmPass.setCustomValidity('?????????????????????????????????????????????????????????????????????????????????????????????');
                }
            }
        }
    </script>
</body>
</html>