<?php
session_start();

require_once ('Models/DeliveryUserSet.php');

$view = new stdClass();
$view->pageTitle = 'Log In';

$deliveryUserSet = new DeliveryUserSet();

/* */

if (isset($_POST['loginbutton'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $deliveryUserSet->fetchUsername($username);
    $pass = $deliveryUserSet->fetchPassword($username);

    if ($user === $username && $pass === $password) {
        $_SESSION['login'] = $username;
    }

//    if ($username == 'lee' && $password == '123456'){
//        $_SESSION['login'] = $username;
//    } elseif ($username == 'rahid' && $password == 'polyjuice23'){
//        $_SESSION['login'] = $username;
//    } elseif ($username == 'admin' && $password == '123456'){
//        $_SESSION['login'] = $username;
//    }
//    else {
//        echo "Error in username and/or password";
//    }

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

require_once ('Views/loginview.phtml');