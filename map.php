<?php
$apiKey = 'AIzaSyDRl0pqfN4cjQcNnws7wtC3ZhYFoAo71i8';

$view = new stdClass();
$view->pageTitle = "Map Page";

$connect = mysqli_connect("poseidon.salford.ac.uk", "aee805", "Polyjuice23!", "aee805");
$sql = "SELECT * FROM delivery_point";
$result = mysqli_query($connect, $sql);

$delivery_points = array();
if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        $delivery_points[] = $row;
    }
}

$connect->close();

//Convert array to JSON for JS use
$delivery_points_json = json_encode($delivery_points);

include 'Views/map.phtml';