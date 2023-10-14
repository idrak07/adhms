<?php
require('dbconfig.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $tradeId = $_POST['tradeId'];
    $userId = $_SESSION['userId'];

    $subject->insert($name, $tradeId, $userId);
} else {
    // Handle the request method not being POST if necessary
    echo "Invalid request";
}
