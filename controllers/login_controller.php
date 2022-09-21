<?php
class LoginController //'registerForm','register','loginForm','login'
{
    public function loginForm(){
        $id = "";
        $warning = "";
        if(isset($_SESSION["id"]))
            $id = $_SESSION["id"];
        
        if(isset($_SESSION["error"])){
            $error = $_SESSION["error"];
            switch($error){
                case 1: $warning = "ไม่มีผู้ใช้นี้ในระบบ";
                        break;
                case 2: $warning = "ใส่รหัสผ่านไม่ถูกต้อง";
                        break; 
            }
        }
        session_unset();

        require_once("./views/login/login.php");
    }

    public function login(){
        $id = $_GET['id'];
        $password = $_GET['pass'];
        
        $user = User::getByOpenID($id);
        echo("<br/>");
        echo($user->Open_Id);
        echo("<br/>");
        echo "test";
        // $returnURL = "?controller=login&action=loginForm";
        // if( is_null($user) ){
        //     $_SESSION["error"] = 1;
        //     $_SESSION["id"] = $id;
        //     header("Location: $returnURL");
        //     die();
        // }
        // else if($user->Password != $password) {
        //     $_SESSION["error"] = 2;
        //     $_SESSION["id"] = $id;
        //     header("Location: $returnURL");
        //     die();
        // }
        // $_SESSION["openID"] = $user->Open_Id;
        // header("Location: ?controller=home&action=index");
        // die();
    }

    public function logout(){
        session_unset();
        header("Location: ?controller=login&action=loginForm");
        die();
    }

    public function back(){
        header("Location: ?");
        die();
    }
   
}
?>