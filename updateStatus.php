<?php
require_once ('Models/DeliveryPointSet.php');
if (isset($_POST['id'])){
    $deliveryPointSet = new DeliveryPointSet();
    $deliveryPointSet->updateStatus($_POST['id'], 5);

    //Redirect to deliverer page
    header("Location: index.php");
    exit();
}