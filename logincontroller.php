<?php
session_start();
require_once ('Views/loginview.phtml');

$view = new stdClass();
$view->pageTitle = 'Log In';

if (isset($_POST['loginbutton'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'a' && $password == 'b'){
//        header("Location: index.php");
//        header_remove("Location: logincontroller.php");
//        echo "You are logged in";
        $_SESSION['login'] = $username;
    } else {
        echo "Error in username and/or password";
    }

//    $login = new Login();
//    if ($login->authenticate($username, $password)) {
//        echo "You are logged in";
//        //redirect to main page
//    } else {
//        echo "Invalid password, please try again.";
//    }
}
//echo "Please enter your username and password";

if (isset($_POST['logoutbutton'])){
    echo "logout user";
    unset($_SESSION['login']);
    session_destroy();
}