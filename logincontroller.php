<?php
session_start();
require_once ('Views/loginview.phtml');

$view = new stdClass();
$view->pageTitle = 'Log In';

if (isset($_POST['loginbutton'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = new Login();


    if ($login->authenticate($username, $password)) {
        echo "You are logged in";
        //redirect to main page
    } else {
        echo "Invalid password, please try again.";
    }
}
echo "Please enter your username and password";

function checkUsertype(){

}