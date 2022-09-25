<?php 
class PostController
{
    public function index(){
        $openID = "";
        $postId = "";
        if(isset($_SESSION['openID']))
            $openID = $_SESSION['openID'];
        if(isset($_SESSION['postId']))
            $openID = $_SESSION['postId'];
        $user = User::getByOpenID($openID);
        $post = Post::getByPostId($postId);
        $commentList = Comment::getByPostId($postId);
        require_once("./views/home/index.php");
    }

    public function error(){
        require_once("./views/home/error.php"); 
    }  

}