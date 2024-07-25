<?php
// Database connection
$connect = mysqli_connect("poseidon.salford.ac.uk", "aee805", "Polyjuice23!", "aee805");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the q parameter from URL
$q = $_GET["q"];

// Query to search for matching records
$hint = "";
if (strlen($q) > 0) {
    $sql = "SELECT id, name, address, city, postcode FROM delivery_point 
            WHERE name LIKE '%$q%' OR 
                  address LIKE '%$q%' OR 
                  city LIKE '%$q%' OR 
                  postcode LIKE '%$q%'
            LIMIT 10"; // Limiting to 5 results for brevity

    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if ($hint == "") {
                // Setting hint to the response from sql query
                $hint = "<a href='#' onclick='selectDeliveryPoint(" . $row['id'] . ")'>" .
                    $row['name'] . ", " . $row['address'] . ", " . $row['city'] . ", " . $row['postcode'] . "</a>";
            } else {
                $hint .= "<br><a href='#' onclick='selectDeliveryPoint(" . $row['id'] . ")'>" .
                    $row['name'] . ", " . $row['address'] . ", " . $row['city'] . ", " . $row['postcode'] . "</a>";
            }
        }
    }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint == "") {
    $response = "No matching records found";
} else {
        $response = $hint;
}

// Output the response
echo $response;

mysqli_close($connect);