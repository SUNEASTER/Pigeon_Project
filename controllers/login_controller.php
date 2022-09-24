<?php
class LoginController
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
        $returnURL = "?controller=login&action=loginForm";

        $user = User::getByUserId($id);
        if( is_null($user) ){
            $_SESSION["error"] = 1;
            $_SESSION["id"] = $id;
            header("Location: $returnURL");
            die();
        }
        $user = User::getByUserIdAndPassword($id, $password);
        if( is_null($user) ) {
            $_SESSION["error"] = 2;
            $_SESSION["id"] = $id;
            header("Location: $returnURL");
            die();
        }
        $_SESSION["openID"] = $user->Open_Id;
        header("Location: ?controller=home&action=index");
        die();
    }

    public function signupForm(){
        $id = "";
        $password = "";
        $email = "";
        $error = 1;
        if(isset($_SESSION["id"]))
            $id = $_SESSION["id"];
        if(isset($_SESSION["password"]))
            $password = $_SESSION["password"];
        if(isset($_SESSION["email"]))
            $email = $_SESSION["email"];
        if(isset($_SESSION["error"]))
            $error = $_SESSION["error"];
        session_unset();

        require_once("./views/login/signup.php");
    }

    public function signup(){
        $id = $_GET['username'];
        $password = $_GET['pass'];
        $email = $_GET['email'];
        $error = 1;

        $user = User::getByUserId($id);
        if( !is_null($user) ) {
            echo($user->Open_Id);
            echo('test');
            $error = $error * 2;
        }
        $user = User::getByEmail($email);
        if( !is_null($user) ) {    
            echo($user->Open_Id);
            $error = $error * 3;
        }
        echo($error);
        if($error == 1) {
            User::addUser($id, $password, $email);
            header("Location: ?controller=login&action=loginForm");
            die();
        }
        else {
            $_SESSION["id"] = $id;
            $_SESSION["password"] = $password;
            $_SESSION["email"] = $email;
            $_SESSION["error"] = $error;
            header("Location: ?controller=login&action=signupForm");
            die();
        }
    }

    public function logout(){
        session_unset();
        header("Location: ?controller=login&action=loginForm");
        die();
    }

}
?>