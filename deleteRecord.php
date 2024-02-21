<?php
require_once ('Models/DeliveryPointSet.php');

$view = new stdClass();
$view->pageTitle = 'Delete Records';

$deliveryPointSet = new DeliveryPointSet();
$id = $_GET['id'];
$view->deliveryPointSet = $deliveryPointSet->deleteRecord($id);

require_once ('Views/deleteRecord.phtml');