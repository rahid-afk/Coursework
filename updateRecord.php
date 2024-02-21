<?php
require_once ('Models/DeliveryPointSet.php');

$view = new stdClass();
$view->pageTitle = 'Update Record';

$deliveryPointSet = new DeliveryPointSet();

$id = $_GET['id'];
if (isset($_POST['updateRecord'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $deliverer = $_POST['deliverer'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $status = $_POST['status'];

    $view->deliveryPointSet = $deliveryPointSet->updateRecord($id, $name, $address, $city, $postcode, $deliverer, $lat, $long, $status);
    header("Location: index.php");
}
if (isset($_GET['id'])){
    $view->deliveryPointSet = $deliveryPointSet->selectWithID($id);
}

require_once ('Views/updateRecord.phtml');