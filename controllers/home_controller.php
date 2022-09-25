<?php 
class HomeController
{
    public function index(){
        $openID = "";
        if(isset($_SESSION['openID']))
            $openID = $_SESSION['openID'];
        $user = User::getByOpenID($openID);
        $tagList = Tag::getAll();
        $postList = Post::getAll();
        require_once("./views/home/index.php");
    }

    public function error(){
        require_once("./views/home/error.php"); 
    }  

}