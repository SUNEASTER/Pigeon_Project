<?php

$controllers = array(   'login'=>['loginForm','login','logout','signupForm','signup'],
                        'home'=>['index','error'],
                        // 'page'=>['error'],
                        // 'checkRG'=>['index','detail','confirmApprove','confirmDisapprove','approve','disapprove'],
                        // 'registration'=>['index','register','reapply'],
                        // 'checkStatus'=>['index','detail'],
                        );
function call($controller, $action){
    require_once("controllers/".$controller."_controller.php");
    switch($controller)
    {
        case "login":           require_once("./models/userModel.php");
                                $controller = new LoginController();
                                break;

        case "home":            require_once("./models/userModel.php");
                                $controller = new HomeController;
                                break;

        // case "checkRG":         if(!isset($_SESSION["role"]) || $_SESSION["role"] != "Teacher"){
        //                             header("Location: ?controller=login&action=loginForm");
        //                             die();
        //                         }
        //                         require_once("./models/requestFormModel.php");
        //                         require_once("./models/userModel.php");
        //                         $controller = new CheckRGController();
        //                         break;

        // case "registration":    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "Student"){
        //                             header("Location: ?controller=login&action=loginForm");
        //                             die();
        //                         }
        //                         require_once("./models/userModel.php");
        //                         require_once("./models/requestFormModel.php");
        //                         require_once("./models/companyModel.php");
        //                         require_once("./models/districtModel.php");
        //                         require_once("./models/amphureModel.php");
        //                         require_once("./models/provinceModel.php");
        //                         $controller = new RegistrationController();
        //                         break;

        // case "checkStatus":     if(!isset($_SESSION["role"]) || $_SESSION["role"] != "Student"){
        //                             header("Location: ?controller=login&action=loginForm");
        //                             die();
        //                         }
        //                         require_once("./models/userModel.php");
        //                         require_once("./models/requestFormModel.php");
        //                         $controller = new CheckStatusController();
        //                         break; 

        // case "checkStudent":    if(!isset($_SESSION["role"]) || $_SESSION["role"] == "Student"){
        //                             header("Location: ?controller=login&action=loginForm");
        //                             die();
        //                         }
        //                         require_once("./models/requestFormModel.php");
        //                         require_once("./models/userModel.php");
        //                         $controller = new CheckStudentController();
        //                         break;
                                
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