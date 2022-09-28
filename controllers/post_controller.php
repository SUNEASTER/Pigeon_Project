<?php 
class PostController
{
    public function index(){
        $openID = "";
        $postId = "";
        $chkReport = 0;
        if(isset($_SESSION['openID']))
            $openID = $_SESSION['openID'];
        if(isset($_GET['post']))
            $postId = $_GET['post'];
        $user = User::getByOpenID($openID);
        $post = Post::getByPostId($postId, $chkReport);
        $commentList = Comment::getByPostId($postId, $chkReport);
        require_once("./views/home/postCommentTest.php");
    }

    public function addPost(){
        $openID = "";
        $content = "";
        $tagID = "";

        if(isset($_SESSION['openID']))
            $openID = $_SESSION['openID'];
        if(isset($_GET['content']))
            $content = $_GET['content'];
        if(isset($_GET['tagID']))
            $tagID = $_GET['tagID'];

        Post::addPost($content, $openID, $tagID);

        header("Location: ?controller=home&action=index");
        die();
    }

    public function addComment(){
        $openID = "";
        $content = "";
        $postID = "";

        if(isset($_SESSION['openID']))
            $openID = $_SESSION['openID'];
        if(isset($_GET['content']))
            $content = $_GET['content'];
        if(isset($_GET['postID']))
            $postID = $_GET['postID'];

        Comment::addComment($content, $openID, $postID);

        header("Location: ?controller=home&action=index");
        die();
    }

    public function updatePost(){
        $postID = "";
        $status = 1;

        if(isset($_GET['postID']))
            $postID = $_GET['postID'];
        if(isset($_GET['status']))
            $status = $_GET['status'];

        Post::updateStatus($postID, $status);

        header("Location: ?controller=post&action=index&post=".$postID);
        die();
    }

    public function updateComment(){
        $postID = "";
        $commentID = "";
        $status = 1;

        if(isset($_GET['postID']))
            $postID = $_GET['postID'];
        if(isset($_GET['commentID']))
            $commentID = $_GET['commentID'];
        if(isset($_GET['status']))
            $status = $_GET['status'];

        Comment::updateStatus($commentID, $status);

        header("Location: ?controller=post&action=index&post=".$postID);
        die();
    }

}