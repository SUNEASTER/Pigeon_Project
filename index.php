<?php
session_start();
require_once("./models/userModel.php");
if(isset($_GET['controller'])&&isset($_GET['action'])){
    $controller = $_GET['controller'];
    $action = $_GET['action'];
}
else{
    $controller = 'login';
    $action = 'loginForm';
}?>

<html>

<?php require_once("./routes.php");?>

</html>