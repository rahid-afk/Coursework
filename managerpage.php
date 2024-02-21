<?php
require_once ('Models/DeliveryPointSet.php');
require_once ('Models/DeliveryUserSet.php');
$view = new stdClass();
$view->pageTitle = "Manager Page";

$deliveryPointSet = new DeliveryPointSet();
$deliveryUserSet = new DeliveryUserSet();

if (isset($_POST['createRecord'])){
$view->deliveryPointSet = $deliveryPointSet->createNewRecord();
} elseif (isset($_POST['createUser'])){
    $view->deliveryUserSet = $deliveryUserSet->createUser();
} elseif (isset($_POST['viewRecordsBtn'])){
    $view->deliveryPointSet = $deliveryPointSet->getAllDeliveries();
} elseif (isset($_POST['viewUsersBtn'])){
    $view->deliveryUserSet = $deliveryUserSet->getAllUsers();
} elseif (isset($_POST['updateRecord'])){
//    var_dump($_POST['name']);
}

require_once ('Views/managerpage.phtml');