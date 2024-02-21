<?php
require_once ('Models/DeliveryUserSet.php');

$view = new stdClass();
$view->pageTitle = 'Update User';

$deliveryUserSet = new DeliveryUserSet();

$id = $_GET['id'];
if (isset($_POST['updateUser'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $usertype = $_POST['usertype'];
    $view->deliveryUserSet = $deliveryUserSet->updateUser($id, $name, $pass, $usertype);
    header("Location: index.php");
}
if (isset($_GET['id'])){
    $view->deliveryUserSet = $deliveryUserSet->selectWithID($id);
}

require_once ('Views/updateUser.phtml');