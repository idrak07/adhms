<?php
require('dbconfig.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $aircraftId = $_POST['aircraftId'];
    $userId = $_SESSION['userId'];

    $trade->insert($name, $aircraftId, $userId );
} else {
    // Handle the request method not being POST if necessary
    echo "Invalid request";
}
