<?php
require_once ('Models/DeliveryPointSet.php');

$view = new stdClass();
$view->pageTitle = 'Update Record';

$deliveryPointSet = new DeliveryPointSet();

$id = $_GET['id'];
if (isset($_POST['updateRecord'])){
    $id = $_POST['id'];
    $view->deliveryPointSet = $deliveryPointSet->updateRecord($id);
    header("Location: index.php");
}
if (isset($_GET['id'])){
    $view->deliveryPointSet = $deliveryPointSet->selectWithID($id);
}

require_once ('Views/updateRecord.phtml');