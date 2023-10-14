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
$name= $_POST['name'];

// Create database connection 
$db = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection 
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
$target_dir = "images/aircraft_types/";
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
            $stm = $db->prepare("INSERT INTO `aircraft_types`(`name`, `image_key`, `ext`, `unique_image_key`, `created_by_user_id`,  `last_modified_by_user_id`) VALUES ('$name','$originalName','$fileType','$uniquesavename', $userId, $userId)");

            if ($stm->execute()) {
                echo "<script>alert('Successfully added!');location.replace('aircraft-types.php');</script>";
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
