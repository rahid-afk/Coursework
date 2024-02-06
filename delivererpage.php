<?php

//require_once ("Models/DeliveryPointSet.php");

$view = new stdClass();
$view->pageTitle = "Deliverer Page";

//$deliveryPointsSet = new DeliveryPointSet();
//$view->deliveryPointsSet = $deliveryPointsSet->fetchAllDeliveries();

$connect = mysqli_connect("poseidon.salford.ac.uk", "aee805", "Polyjuice23!", "aee805");
$pageLimit = 20;

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$firstPage = ($page - 1) * $pageLimit;
/* Obtaining deliverer information */
$query = "SELECT userid FROM delivery_users WHERE username LIKE '%" . $_SESSION['login'] . "%'";
$userid = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($userid);
if ($row){
    $delivererid = $row['userid'];
}

/* Filtering with whatever the deliverer has inputted in the search */
if (isset($_POST['search'])) {
    $query = "SELECT * FROM delivery_point WHERE id LIKE '%" . $_POST['idSearch'] . "%'
    AND name LIKE '%" . $_POST['nameSearch'] . "%'
    AND address LIKE '%" . $_POST['addressSearch'] . "%'
    AND city LIKE '%" . $_POST['citySearch'] . "%'
    AND postcode LIKE '%" . $_POST['postSearch'] . "%'
    AND latitude LIKE '%" . $_POST['latSearch'] . "%'
    AND longitude LIKE '%" . $_POST['longSearch'] . "%'
    AND deliverer LIKE '%" . $delivererid . "%' 
    LIMIT " . $firstPage . ',' . $pageLimit;

    $search_result = mysqli_query($connect, $query);
    /* Button to clear the search filters and return the table to normal */
} elseif (isset($_POST['clear'])) {
    $query = "SELECT * FROM delivery_point WHERE deliverer LIKE '%" . $delivererid . "%' LIMIT " . $firstPage . ',' . $pageLimit;
    $search_result = mysqli_query($connect, $query);
} else {
    $query = "SELECT * FROM delivery_point WHERE deliverer LIKE '%" . $delivererid . "%' LIMIT " . $firstPage . ',' . $pageLimit;
    $search_result = mysqli_query($connect, $query);
}

//include "Views/delivererpage.phtml";
require_once ("Views/delivererpage.phtml");