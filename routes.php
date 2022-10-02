<?php

$controllers = array(   'login'=>['loginForm','login','logout','signupForm','signup'],
                        'home'=>['index','error'],
                        'post'=>['index','addPost','addComment','updatePost','updateComment'],
                        'mypost'=>['index'],
                        'report'=>['index'],
                        );
function call($controller, $action){
    require_once("controllers/".$controller."_controller.php");
    switch($controller)
    {
        case "login":           require_once("./models/userModel.php");
                                $controller = new LoginController();
                                break;

        case "home":            if(!isset($_SESSION["openID"])){
                                    header("Location: ?controller=login&action=loginForm");
                                    die();
                                }
                                require_once("./models/userModel.php");
                                require_once("./models/postModel.php");
                                require_once("./models/tagModel.php");
                                $_SESSION["controller"] = "home";
                                $controller = new HomeController;
                                break;

        case "mypost":          if(!isset($_SESSION["openID"])){
                                    header("Location: ?controller=login&action=loginForm");
                                    die();
                                }
                                require_once("./models/userModel.php");
                                require_once("./models/postModel.php");
                                require_once("./models/tagModel.php");
                                $_SESSION["controller"] = "mypost";
                                $controller = new MyPostController;
                                break;

         case "post":        if(!isset($_SESSION["openID"])){
                                    header("Location: ?controller=login&action=loginForm");
                                    die();
                                }
                                require_once("./models/userModel.php");
                                require_once("./models/postModel.php");
                                require_once("./models/tagModel.php");
                                require_once("./models/commentModel.php");
                                $controller = new PostController();
                                break;

        case "report":          if( !isset($_SESSION["openID"]) ){
                                    header("Location: ?controller=login&action=loginForm");
                                    die();   
                                }
                                if( $_SESSION["role"] != 2 ){
                                    header("Location: ?controller=login&action=loginForm");
                                    die();
                                }
                                
                                require_once("./models/userModel.php");
                                require_once("./models/postModel.php");
                                require_once("./models/tagModel.php");
                                $_SESSION["controller"] = "report";
                                $controller = new ReportController;
                                break;
                                
    }

    $controller->{$action}();
}

if(array_key_exists($controller, $controllers)) {    
    if(in_array($action, $controllers [$controller])){
        call($controller, $action);
    }
    else {
        call('home', 'error');
    }

}
else
{    call('home', 'error'); } 
?>