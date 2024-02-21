<?php
require_once ('Models/DeliveryUserSet.php');

$view = new stdClass();
$view->pageTitle = 'Delete User';

$deliveryUserSet = new DeliveryUserSet();
$id = $_GET['id'];
$view->deliveryUserSet = $deliveryUserSet->deleteUser($id);

require_once ('Views/deleteRecord.phtml');