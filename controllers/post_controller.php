<?php 
class PostController
{
    public function index(){
        $openID = 0;
        $postId = 0;
        $chkReport = 0;
        $controller = "home";
        
        $_SESSION['controller'];
        
        if(isset($_SESSION['openID']))
            $openID = $_SESSION['openID'];
        if(isset($_SESSION['controller']))
            $controller = $_SESSION['controller'];
        if(isset($_GET['post']))
            $postId = $_GET['post'];

        if($controller == "report")
            $chkReport = 1;
        
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
        $controller = "home";

        if(isset($_SESSION['openID']))
            $openID = $_SESSION['openID'];
        if(isset($_SESSION['controller']))
            $controller = $_SESSION['controller'];
        if(isset($_GET['content']))
            $content = $_GET['content'];
        if(isset($_GET['tagID']))
            $tagID = $_GET['tagID'];

        if($content != "")
            Post::addPost($content, $openID, $tagID);

        header("Location: ?controller=".$controller."&action=index");
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

        if($content != "")
            Comment::addComment($content, $openID, $postID);

        header("Location: ?controller=post&action=index&post=".$postID);
        die();
    }

    public function updatePost(){
        $postID = 0;
        $status = -1;;
        $controller = "home";

        if(isset($_GET['postID']))
            $postID = $_GET['postID'];
        if(isset($_SESSION['controller']))
            $controller = $_SESSION['controller'];
        if(isset($_GET['status']))
            $status = $_GET['status'];

        if(substr($postID, -1) == '/')
            $postID = substr($postID, 0, -1);
        if(substr($status, -1) == '/')
            $status = substr($status, 0, -1);

        if($status != -1)
            Post::updateStatus($postID, $status);

        header("Location: ?controller=".$controller."&action=index");
        die();
    }

    public function updateComment(){
        $postID = 0;
        $commentID = 0;
        $status = -1;

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

        if($status != -1)
            Comment::updateStatus($commentID, $status);

        header("Location: ?controller=post&action=index&post=".$postID);
        die();
    }

}