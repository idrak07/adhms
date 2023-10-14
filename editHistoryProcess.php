<?php
require('dbconfig.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $date_of_entry = $_POST['date_of_entry'];
    $engine_no = $_POST['engine_no'];
    $description = $_POST['description'];
    $rectification_work = $_POST['rectification_work'];
    $remarks = $_POST['remarks'];
    $userId = $_SESSION['userId'];
    $date_of_clearance = $_POST['date_of_clearance'];
    $rectification_by = $_POST['rectification_by'];

    $defect->update($id, $date_of_entry, $engine_no, $description, $rectification_work, $remarks, $userId, $date_of_clearance, $rectification_by);
} else {
    // Handle the request method not being POST if necessary
    echo "Invalid request";
}
