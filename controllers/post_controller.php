<?php 
class PostController
{
    public function index(){
        $openID = 0;
        $postId = 0;
        $chkReport = 0;
        if(isset($_SESSION['openID']))
            $openID = $_SESSION['openID'];
        if(isset($_GET['post']))
            $postId = $_GET['post'];
        $user = User::getByOpenID($openID);
        $post = Post::getByPostId($postId, $chkReport);
        $tagList = Tag::getAll();
        $commentList = Comment::getByPostId($postId, $chkReport);
        require_once("./views/home/comment.php");
    }

    public function addPost(){
        $openID = 0;
        $content = "";
        $tagID = 0;

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
        $openID = 0;
        $content = "";
        $postID = 0;

        if(isset($_SESSION['openID']))
            $openID = $_SESSION['openID'];
        if(isset($_GET['content']))
            $content = $_GET['content'];
        if(isset($_GET['postID']))
            $postID = $_GET['postID'];

        if(substr($postID, -1) == '/')
            $postID = substr($postID, 0, -1);

        Comment::addComment($content, $openID, $postID);

        header("Location: ?controller=post&action=index&post=".$postID);
        die();
    }

    public function updatePost(){
        $postID = 0;
        $status = 1;

        if(isset($_GET['postID']))
            $postID = $_GET['postID'];
        if(isset($_GET['status']))
            $status = $_GET['status'];

        if(substr($postID, -1) == '/')
            $postID = substr($postID, 0, -1);
        if(substr($status, -1) == '/')
            $status = substr($status, 0, -1);

        Post::updateStatus($postID, $status);

        header("Location: ?controller=home&action=index");
        die();
    }

    public function updateComment(){
        $postID = 0;
        $commentID = 0;
        $status = 1;

        if(isset($_GET['postID']))
            $postID = $_GET['postID'];
        if(isset($_GET['commentID']))
            $commentID = $_GET['commentID'];
        if(isset($_GET['status']))
            $status = $_GET['status'];

        if(substr($postID, -1) == '/')
            $postID = substr($postID, 0, -1);
        if(substr($commentID, -1) == '/')
            $commentID = substr($commentID, 0, -1);
        if(substr($status, -1) == '/')
            $status = substr($status, 0, -1);


        Comment::updateStatus($commentID, $status);

        header("Location: ?controller=post&action=index&post=".$postID);
        die();
    }

}