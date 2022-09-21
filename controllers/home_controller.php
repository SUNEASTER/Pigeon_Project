<?php 
class HomeController
{
    public function index(){
        $openID = "";
        if(isset($_SESSION['openID']))
            $openID = $_SESSION['openID'];
        $user = User::getByOpenID($openID);

        require_once("./views/nabbar.php");
        require_once("./views/home/index.php");
    }

    public function error(){
        require_once("./views/home/error.php"); 
    }  

}