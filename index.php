<?php
session_start();

$view = new stdClass();
$view->pageTitle = 'Homepage';

$connect = mysqli_connect("poseidon.salford.ac.uk", "aee805", "Polyjuice23!", "aee805");
$query = "SELECT usertype FROM delivery_users WHERE username LIKE '%" . $_SESSION['login'] . "%'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
if ($row){
    $usertype = $row['usertype'];
}
if (isset($_SESSION['login'])){
    if ($usertype == 1){

    }
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
