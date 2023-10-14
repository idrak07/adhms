<?php
require('dbconfig.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
	$password = $_POST['password'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$bdno = $_POST['bdno'];
	$flt = $_POST['flt'];
	if (empty($username) || empty($password)) {
		echo "<div id='alert' class='alert alert-danger' role='alert'>
        Username and Password cannot be empty
      </div>";
		exit();
	}
	$auth->signup($username, $password, $fname, $lname, $bdno, $flt);
} else {
    // Handle the request method not being POST if necessary
    echo "Invalid request";
}
