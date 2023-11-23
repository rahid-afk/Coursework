<?php
session_start();

if (isset($_SESSION['login'])){
    $view = new stdClass();
    $view->pageTitle = 'Homepage';

//    require_once ('loginControl.php');

    require_once ('Views/index.phtml');
} else {
    header("Location: logincontroller.php");
}
