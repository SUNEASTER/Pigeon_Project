<?php 
class PostController
{
    public function index(){
        $openID = "";
        $postId = "";
        if(isset($_SESSION['openID']))
            $openID = $_SESSION['openID'];
        if(isset($_GET['post']))
            $postId = $_GET['post'];
        $user = User::getByOpenID($openID);
        $post = Post::getByPostId($postId);
        $commentList = Comment::getByPostId($postId);
        require_once("./views/home/index.php");
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

    public function deletePost(){
        $postID = "";

        if(isset($_GET['postID']))
            $postID = $_GET['postID'];

        Post::deletePost($postID);

        header("Location: ?controller=post&action=index&post=".$postID);
        die();
    }

    public function deleteComment(){
        $postID = "";
        $commentID = "";

        if(isset($_GET['postID']))
            $postID = $_GET['postID'];
        if(isset($_GET['commentID']))
            $commentID = $_GET['commentID'];

        Comment::deleteComment($commentID);

        header("Location: ?controller=post&action=index&post=".$postID);
        die();
    }

}