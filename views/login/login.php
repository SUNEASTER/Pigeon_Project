<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Kanit%7CPrompt');
    @import url('https://fonts.googleapis.com/css?family=Chonburi');
    *{
        margin: 0px; 
        padding: 0px; 
        box-sizing: border-box;
        font-family: 'Open Sans','Prompt', sans-serif ;

    }

    .flex-container {
        display: flex;
        flex-direction : row;
        margin-left: 0px;
        height: 100%;
        width: 100%;
        
    }

    .flex-container .pic {
        width: 60%;
        background-color:#ac2421;
    }

    .flex-container .from{
        width: 40%;
    }

    .flex-container .from .from-detail{
       margin: 120px 100px ;
    }

    button{
        background-color: #ffff;
        height: 50%;
        width: 24%;
        /* margin-left: auto;
        margin-right: auto; */
    }

    button.button1{
        
    }

    #warning{
        font-size:20px;
        text-align: start;
        margin-left: 15px;
        color:red;
    }

    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .button_class{
        flex-direction: row-reverse; 
        justify-content: space-evenly; 
        display: flex; 
        height: 14%;
        width: 100%;
    }

    .button_class .button1{
        border-radius: 10px;
        background-color: #be2623;
        color: white;
    }

    .button_class .button1:hover {
        background-color: red;
    }

    .button_class .button2{
        border-radius: 10px;
        background-color: #be2623;
        color: white;
    }

    .button_class .button2:hover {
        background-color: red;
    }

</style>

<body >
   <div class="flex-container" >

       <div class= "pic"> 
            <img style="height: 100%; width: 100%; margin-left: 0px;" src="./resources/logologin.jpg" alt="cat">
       </div>
       
       <div class ="from">
            <div class= "from-detail">
                <form action="" method="GET">

                    <div class="form-group" >
                        <h1 style="text-align: center; font-size: 150px; "><b style= "font-family:'Chonburi';">Login</b></h1>
                    </div>
                    <br>
                    <br>
                    <div class="form-group"  >
                        <input style="border-color:black; border-width: 3px;" type="text" id="id" name="id" placeholder="ID" class="form-control form-control-lg" value="<?php echo $id; ?>" title="Eight or more characters" />
                    </div>
                    <br>
                    <br>
                    <div class="form-group" >
                        <input style="border-color:black; border-width: 3px; " type="password" id="pass" name="pass" placeholder="PASSWORD" class="form-control form-control-lg"/>
                    </div>
                    <br>
                    <input type="hidden" name="controller" value="login"/>
                    
                    <div class="form-group" >
                        <p id="warning" <?php if($warning == null || $warning == "") echo "style= visibility:hidden"; ?>><b ><?php echo $warning," !";?> </b></p>
                    </div>

                    <div class="button_class" >
                        <button class="button1" type="submit" name="action" value="login" onclick="validate(this.value)">เข้าสู่ระบบ</button>
                        <button class="button2" type="submit" name="action" value="back" onclick="validate(this.value)">หน้าหลัก</button>
                    </div>

                </form>
                

               

            </div>    
        </div>

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