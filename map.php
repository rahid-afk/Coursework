<?php
session_start();
$apiKey = 'AIzaSyDRl0pqfN4cjQcNnws7wtC3ZhYFoAo71i8';

require_once('Models/Database.php');
require_once('Models/DeliveryUserSet.php');
require_once('Models/DeliveryPointSet.php');

$view = new stdClass();
$view->pageTitle = "Map Page";

/* Check if user is logged in */
/*if (!isset($_SESSION['login'])) {

    header("Location: logincontroller.php");
    exit();
}
*/

$deliveryPointSet = new DeliveryPointSet();
$deliveryUserSet = new DeliveryUserSet();

/* Get logged in user's id */
$username = $_SESSION['login'];
$delivererID = $deliveryUserSet->getDelivererID($username);




if ($delivererID === null) {
    echo "ERROR: Deliverer not found.";
    exit();
}
else {
    echo $delivererID;
}

/* Delivery points with only deliverer */
$deliveryPoints = $deliveryPointSet->getDeliveryPointsForDeliverer($delivererID);

$delivery_points_array = array_map(function($point) {
    return [
        'id' => $point->getID(),
        'name' => $point->getName(),
        'address' => $point->getAddress(),
        'city' => $point->getCity(),
        'postcode' => $point->getPostcode(),
        'latitude' => $point->getLat(),
        'longitude' => $point->getLong(),
        'status' => $point->getStatus()
    ];
}, $deliveryPoints);

/* Converting to JSON */
$deliveryPoints_json = json_encode($delivery_points_array);

//$username = $_SESSION['login'];
//
//$connect = mysqli_connect("poseidon.salford.ac.uk", "aee805", "Polyjuice23!", "aee805");
////$sql = "SELECT * FROM delivery_point";
//$query = "SELECT userid FROM delivery_users WHERE username LIKE '%" . $username . "%' AND usertype = 2";
//$result = mysqli_query($connect, $query);
//$userid = $result->fetch_assoc();
//$query = "SELECT * FROM delivery_point WHERE deliverer LIKE '%" . $userid . "%'";
//$result = mysqli_query($connect, $query);
//
//$delivery_points = array();
//if ($result->num_rows > 0){
//    while ($row = $result->fetch_assoc()){
//        $delivery_points[] = $row;
//    }
//}
//
//$connect->close();
//
////Convert array to JSON for JS use
//$deliveryPoints_json = json_encode($delivery_points);

include 'Views/map.phtml';