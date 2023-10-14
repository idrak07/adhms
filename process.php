<?php

/**
 * Created by PhpStorm.
 * User: Rudro
 * Date: 04-Apr-17
 * Time: 9:02 PM
 */
require('dbconfig.php');

//for login 
if (@$_POST['login']) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (empty($username) || empty($password)) {
		echo "<p class='alert alert-danger'>Username or password can not be empty</p>";
		exit();
	}
	$auth->login($username, $password);
}

if (@$_POST['signup']) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$bdno = $_POST['bdno'];
	$flt = $_POST['flt'];
	if (empty($username) || empty($password)) {
		echo "<p class='alert alert-danger'>Username or password can not be empty</p>";
		exit();
	}
	$auth->signup($username, $password, $fname, $lname, $bdno, $flt);
}
//for company
if (@$_POST['company']) {
	$cname = $_POST['cname'];
	$btype = $_POST['btype'];
	$route = $_POST['route'];
	$telephone = $_POST['telephone'];
	$ownername = $_POST['ownername'];
	$ownermobile = $_POST['ownermobile'];
	$dob = $_POST['dob'];
	$bemail = $_POST['bemail'];
	$baddress = $_POST['baddress'];
	$haddress = $_POST['haddress'];
	$regno = $_POST['regno'];
	$ban = $_POST['ban'];
	$lln = $_POST['lln'];
	$llt = $_POST['llt'];
	$ecs = $_POST['ecs'];
	$mpan = $_POST['mpan'];
	$msne = $_POST['msne'];
	$eacq = $_POST['eacq'];
	$eced = $_POST['eced'];
	$gcs = $_POST['gcs'];
	$mprn = $_POST['mprn'];
	$msng = $_POST['msng'];
	$gacq = $_POST['gacq'];
	$gced = $_POST['gced'];
	$cced = $_POST['cced'];
	$comments = $_POST['comments'];
	$rating = $_POST['rating'];
	$user = $_POST['user'];
	$company->addCompany($cname, $btype, $route, $telephone, $ownername, $ownermobile, $dob, $bemail, $baddress, $haddress, $regno, $ban, $lln, $llt, $ecs, $mpan, $msne, $eacq, $eced, $gcs, $mprn, $msng, $gacq, $gced, $cced, $comments, $user, $rating);
}
//update company 

if (@$_POST['updatecompany']) {
	$id = $_POST['id'];
	$cname = $_POST['cname'];
	$btype = $_POST['btype'];
	$route = $_POST['route'];
	$telephone = $_POST['telephone'];
	$ownername = $_POST['ownername'];
	$ownermobile = $_POST['ownermobile'];
	$dob = $_POST['dob'];
	$bemail = $_POST['bemail'];
	$baddress = $_POST['baddress'];
	$haddress = $_POST['haddress'];
	$regno = $_POST['regno'];
	$ban = $_POST['ban'];
	$lln = $_POST['lln'];
	$llt = $_POST['llt'];
	$ecs = $_POST['ecs'];
	$mpan = $_POST['mpan'];
	$msne = $_POST['msne'];
	$eacq = $_POST['eacq'];
	$eced = $_POST['eced'];
	$gcs = $_POST['gcs'];
	$mprn = $_POST['mprn'];
	$msng = $_POST['msng'];
	$gacq = $_POST['gacq'];
	$gced = $_POST['gced'];
	$cced = $_POST['cced'];
	$comments = $_POST['comments'];
	$rating = $_POST['rating'];
	$company->updateCompany($cname, $btype, $route, $telephone, $ownername, $ownermobile, $dob, $bemail, $baddress, $haddress, $regno, $ban, $lln, $llt, $ecs, $mpan, $msne, $eacq, $eced, $gcs, $mprn, $msng, $gacq, $gced, $cced, $id, $comments, $rating);
}

//for employee
if (@$_POST['employee']) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phone = $_POST['phoneno'];
	$type = $_POST['type'];
	if (empty($username) || empty($fname) || empty($lname) || empty($email)) {
		echo "<p class='alert alert-danger'>Required Field Can not be empty</p>";
		exit();
	}
	if ($team->emailExists($email)) {
		echo "<p class='alert alert-danger'>User already exists with this email</p>";
		exit();
	}

	if ($team->usernameExists($username)) {
		echo "<p class='alert alert-danger'>User already exists with this email</p>";
		exit();
	}
	$team->addEmployee($fname, $lname, $username, $email, $type, $phone);
}

//for update employee
if (@$_POST['updateemployee']) {
	$id = $_POST['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phone = $_POST['phonenumber'];
	$type = $_POST['type'];
	if (empty($username) || empty($fname) || empty($lname) || empty($email)) {
		echo "<p class='alert alert-danger'>Required Field Can not be empty</p>";
		exit();
	}
	$team->updateemployee($fname, $lname, $username, $email, $type, $phone, $id);
}

//for update password
if (@$_POST['updatepassword']) {
	$oldpassword = $_POST['oldpassword'];
	$newpassword = $_POST['newpassword'];
	$rpassword = $_POST['rpassword'];
	$email = $_SESSION['email'];
	if ($newpassword != $rpassword) {
		echo "<p class='alert alert-danger'>New password & Retype password does not matched.</p>";
		exit();
	}
	$team->updatepass($oldpassword, $newpassword, $email);
}

//for income
if (@$_POST['income']) {
	$date = $_POST['date'];
	$incomeType = $_POST['incomeType'];
	$incomeAmount = $_POST['incomeAmount'];
	$note = $_POST['note'];
	$expenseAmount = "";
	$expenseType = "";
	$transaction->income($date, $incomeType, $incomeAmount, $note, $expenseAmount, $expenseAmount);
}
//for expense
if (@$_POST['expense']) {
	$date = $_POST['date'];
	$expenseType = $_POST['expenseType'];
	$expenseAmount = $_POST['expenseAmount'];
	$note = $_POST['note'];
	$incomeAmount = "";
	$incomeType = "";
	$transaction->expense($date, $expenseType, $expenseAmount, $note, $incomeAmount, $incomeType);
}

//mile add
if (@$_POST['mileadd']) {
	$date = $_POST['date'];
	$placefrom = $_POST['placefrom'];
	$placeto = $_POST['placeto'];
	$mile = $_POST['mile'];
	$reason = $_POST['reason'];
	$user = $_POST['user'];
	$m->addMile($date, $placefrom, $placeto, $mile, $reason, $user);
	//$mile->addMile($date,$placefrom,$placeto,$mile,$reason,$user);
}
//mile report 

if (@$_POST['milereport']) {
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	$m->mileReport($startdate, $enddate);
}

//for transaction report
if (@$_POST['transaction']) {
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	$transaction->report($startdate, $enddate);
}
//for contract
if (@$_POST['contract']) {
	$cname = $_POST['cname'];
	$telephone = $_POST['telephone'];
	$contactname = $_POST['contactname'];
	$address = $_POST['address'];
	$contactemail = $_POST['contactemail'];
	$bankname = $_POST['bankname'];
	$accountname = $_POST['accountname'];
	$regno = $_POST['regno'];
	$dob = $_POST['dob'];
	$dlc = $_FILES['dlc'];
	$sortcode = $_POST['sortcode'];
	$lln = $_POST['lln'];
	$llt = $_POST['llt'];
	$haddress = $_POST['haddress'];
	$esd = $_POST['esd'];
	$eed = $_POST['eed'];
	$mr = $_POST['mr'];
	$mi = $_FILES['mi'];
	$gsd = $_POST['gsd'];
	$ged = $_POST['ged'];
	$gmr = $_POST['gmr'];
	$gmi = $_FILES['gmi'];
	$csd = $_POST['csd'];
	$comments = $_POST['comments'];
	$user = $_POST['user'];
	$company->contract($cname, $telephone, $contactname, $address, $contactemail, $bankname, $accountname, $regno, $dob, $dlc, $sortcode, $lln, $llt, $haddress, $esd, $eed, $mr, $mi, $gsd, $ged, $gmr, $gmi, $csd, $comments, $user);
}
if (@$_POST['contractedit']) {
	$cname = $_POST['cname'];
	$telephone = $_POST['telephone'];
	$contactname = $_POST['contactname'];
	$address = $_POST['address'];
	$contactemail = $_POST['contactemail'];
	$bankname = $_POST['bankname'];
	$accountname = $_POST['accountname'];
	$regno = $_POST['regno'];
	$dob = $_POST['dob'];
	$dlc = $_FILES['dlc'];
	$sortcode = $_POST['sortcode'];
	$lln = $_POST['lln'];
	$llt = $_POST['llt'];
	$haddress = $_POST['haddress'];
	$esd = $_POST['esd'];
	$eed = $_POST['eed'];
	$mr = $_POST['mr'];
	$mi = $_FILES['mi'];
	$gsd = $_POST['gsd'];
	$ged = $_POST['ged'];
	$gmr = $_POST['gmr'];
	$gmi = $_FILES['gmi'];
	$csd = $_POST['csd'];
	$comments = $_POST['comments'];
	$user = $_POST['user'];
	$company->contractedit($cname, $telephone, $contactname, $address, $contactemail, $bankname, $accountname, $regno, $dob, $dlc, $sortcode, $lln, $llt, $haddress, $esd, $eed, $mr, $mi, $gsd, $ged, $gmr, $gmi, $csd, $comments, $user);
}

if (@$_POST['adduser']) {
	echo 'I am here';
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$phoneno = $_POST['phoneno'];
	$email = $_POST['email'];
	$type = $_POST['type'];
	$password = randomPassword();
	$userClass->addUser($fname, $lname, $username, $email, $password, $type, $phone);
}

if (@$_POST['forgetPass']) {
	$email = $_POST['forget_pass'];
	$auth->forgetPass($email);
}
