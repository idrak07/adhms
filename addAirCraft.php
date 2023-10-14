<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['email'])) {
    header('Location:index.php');
} else {
    $username = $_SESSION['email'];
    $type = $_SESSION['type'];
    $userId = $_SESSION['userId'];
}
$dbHost = "localhost";
$dbName = "adhms";
$dbUser = "mehedi";
$dbPass = "synchronise$1000";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$serialNo= $_POST['serialNo'];
$doa= $_POST['doa'];
$ph= $_POST['ph'];
$tso= $_POST['tso'];
$noh= $_POST['noh'];
$tonh= $_POST['tonh'];
$hlnoh= $_POST['hlnoh'];
$hlopsl= $_POST['hlopsl'];
$typeId= $_POST['typeId'];

// Create database connection 
$db = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection 
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$target_dir = "images/aircrafts/";
$originalName = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    $uniquesavename = time() . uniqid(rand());
    $destFile = $target_dir . $uniquesavename . '.' . $fileType;
    $filename = $_FILES["fileToUpload"]["tmp_name"];
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $destFile)) {
        try {
            $stm = $db->prepare("INSERT INTO `aircrafts`(`serial_no`, 
            `aircraft_type_id`, `date_of_acceptance`, `present_hours`, 
            `tso`, `next_oh`, `type_of_next_oh`, `hours_left_next_oh`, 
            `hours_left_ops_life`, `created_by_user_id`, 
            `last_modified_by_user_id`, `image_key`,
             `unique_image_key`, `ext`) VALUES ('$serialNo','$typeId',
             '$doa',$ph,'$tso',$noh,'$tonh',
             $hlnoh, $hlopsl, $userId, $userId,'$originalName','$uniquesavename',
             '$fileType')");

            if ($stm->execute()) {
                echo "<script>alert('Successfully added!');location.replace('aircrafts.php?typeId=$typeId');</script>";
            } else {
                echo "<p class='alert alert-danger'>Something Worng.Try Again</p>";
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
