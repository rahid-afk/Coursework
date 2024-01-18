<?php

require_once ("Models/DeliveryPointSet.php");

$view = new stdClass();
$view->pageTitle = "Deliverer Page";

$deliveryPointsSet = new DeliveryPointSet();
$view->deliveryPointsSet = $deliveryPointsSet->fetchAllDeliveries();

require_once ("Views/delivererpage.phtml");