<?php 
class HomeController
{
    public function index(){
        $openID = "";
        $tagID = 0;
        $chkReport = 0;
        if(isset($_SESSION['openID']))
            $openID = $_SESSION['openID'];
        if(isset($_GET['tag']))
            $tagID = $_GET['tag'];
        $user = User::getByOpenID($openID);
        $tagList = Tag::getAll();
        $postList = Post::getPost($tagID);
        require_once("./views/home/index.php");
    }

    public function error(){
        require_once("./views/home/error.php"); 
    }  

}