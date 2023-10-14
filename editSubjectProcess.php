<?php
require('dbconfig.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $userId = $_SESSION['userId'];

    $subject->update($name, $id, $userId);
} else {
    // Handle the request method not being POST if necessary
    echo "Invalid request";
}
