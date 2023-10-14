<?php
session_start();
// Load the database configuration file 
// Database configuration 
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

// Filter the excel data 
function filterData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// Excel file name for download 
$fileName = "company-data_" . date('Y-m-d') . ".xls";

// Column names 
$fields = array('No', 'Owner name', 'Business email', 'Company Name', 'Owner Mobile', 'Telephone');

// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n";

// Fetch records from database 
$stm = "SELECT * FROM company ORDER BY companyId ASC";
if ($_SESSION['type'] == 'user') {
    $user = $_SESSION['username'];
    $stm = "SELECT * FROM company WHERE `user`='$user' ORDER BY companyId ASC";
}
$query = $db->query($stm);
if ($query->num_rows > 0) {
    // Output each row of the data 
    $no = 1;
    while ($row = $query->fetch_assoc()) {
        // $status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($no++, $row['ownername'], $row['bemail'], $row['cname'], $row['ownermobile'], $row['telephone']);
        array_walk($lineData, 'filterData');
        $excelData .= implode("\t", array_values($lineData)) . "\n";
    }
} else {
    $excelData .= 'No records found...' . "\n";
}


// Headers for download 
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$fileName\"");

// Render excel data 
echo $excelData;

exit;
