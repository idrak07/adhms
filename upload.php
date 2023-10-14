<?php
$dbHost     = "localhost"; 
$dbUsername = "eneruqgh_demo"; 
$dbPassword = "synchronise$1000"; 
$dbName     = "eneruqgh_demo"; 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
}
$target_dir = "uploads/";
$companyId = $_POST['companyId'];
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$originalName = basename( $_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }

// // Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $uniquesavename=time().uniqid(rand());
    $destFile = $target_dir . $uniquesavename . '.' . $fileType;
    $filename = $_FILES["fileToUpload"]["tmp_name"];
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $destFile)) {
    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    try {
        $stm = $db->prepare("INSERT INTO `files`(`unique_name`, `original_name`, `ext`, `company_id`) VALUES ('$uniquesavename','$originalName','$fileType', $companyId)");

        if ($stm->execute()) {
            echo "<p class='alert alert-success'>File successfully uploaded</p>
            <script>setTimeout(function() { location.replace('companydata.php?id=$companyId')},1500);</script>";
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
