<?php
session_start();

$view = new stdClass();
$view->pageTitle = 'Homepage';

$connect = mysqli_connect("poseidon.salford.ac.uk", "aee805", "Polyjuice23!", "aee805");
$query = "SELECT usertype FROM delivery_users WHERE username LIKE '%" . $_SESSION['login'] . "%'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
/* Fetching user's usertype */
if ($row){
    $usertype = $row['usertype'];
}
/* Establishing which page to require based on the usertype */
if (isset($_SESSION['login'])){
    if ($usertype == 1){ /* Admin */
        require_once('managerpage.php');
    } else {
        require_once ("delivererpage.php");
        header("Location: index.php?page=1");
        exit;
    }
//    require_once ('loginControl.php');

//    require_once ('Views/index.phtml');


//    if ($_SESSION['usertype'] == 1){
//        require_once("Views/delivererpage.phtml");
//    } else if ($_SESSION['usertype'] == 2){
//        require_once ("Views/managerpage.phtml");
//    }
} else {
    header("Location: logincontroller.php");
}
