<?php
session_start();

if (isset($_SESSION['login'])){
    $view = new stdClass();
    $view->pageTitle = 'Homepage';

//    require_once ('loginControl.php');

//    require_once ('Views/index.phtml');

    require_once ("delivererpage.php");

//    if ($_SESSION['usertype'] == 1){
//        require_once("Views/delivererpage.phtml");
//    } else if ($_SESSION['usertype'] == 2){
//        require_once ("Views/managerpage.phtml");
//    }
} else {
    header("Location: logincontroller.php");
}
