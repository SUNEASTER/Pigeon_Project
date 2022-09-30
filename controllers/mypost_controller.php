<?php 
class MyPostController
{
    public function index(){
        $openID = 0;
        $tagID = 0;
        $controller = $_GET['controller'];
        
        if(isset($_SESSION['openID']))
            $openID = $_SESSION['openID'];
        if(isset($_GET['tag']))
            $tagID = $_GET['tag'];
        $user = User::getByOpenID($openID);
        $tagList = Tag::getAll();
        $postList = Post::getByUserOpenId($openID, $tagID);
        require_once("./views/home/index.php");
    }

}