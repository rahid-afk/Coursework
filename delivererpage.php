<?php

require_once ("Models/DeliveryPointSet.php");
require_once ("Models/DeliveryUserSet.php");

$view = new stdClass();
$view->pageTitle = "Deliverer Page";

$deliveryPointSet = new DeliveryPointSet();
$deliveryUserSet = new DeliveryUserSet();

$pageLimit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

//Get deliverer id
$delivererId = $deliveryUserSet->getDelivererID($_SESSION['login']);
if ($delivererId === null){
    header("Location: login.php");
    exit();
}

//Get total records and calculate total pages
$totalRecords = $deliveryPointSet->getTotalRecords($delivererId);
$totalPages = ceil($totalRecords / $pageLimit);

//Get delivery points for current page
$view->deliveryPoints = $deliveryPointSet->getDeliveryPoints($delivererId, $page, $pageLimit);

//Pagination data
$view->currentPage = $page;
$view->totalPages = $totalPages;

require_once ("Views/delivererpage.phtml");