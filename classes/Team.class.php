<?php

class Team
{
	private $db;

	public function __construct($con)
	{
		$this->db = $con;
	}

	function randomPassword()
	{
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 10; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}

	public function addEmployee($fname, $lname, $username, $email, $type, $phone)
	{
		try {
			$fname = $this->stringValidation($fname);
			$lname = $this->stringValidation($lname);
			$email = $this->emailValidation($email);
			$username = $this->stringValidation($username);
			$password = $this->randomPassword();
			$encryptedPass = base64_encode($password);
			$type = $this->stringValidation($type);

			$stm = $this->db->prepare("INSERT INTO empolyee(fname,lname,username,phonenumber,email,password,type)VALUES('$fname','$lname','$username','$phone','$email','$encryptedPass','$type')");
			if ($stm->execute()) {
				$id = $this->db->lastInsertId();
				$this->sendUserCreationMail($username, $email, $password);
				echo "<p class='alert alert-success'>New User successfully created</p>
                <script>setTimeout(function() { location.replace('editteam.php?id=$id')},1500);</script>";
			} else {
				echo "<p class='alert alert-danger'>Something wrong.Try Again</p>";
			}
		} catch (PDOEXCEPTION $e) {
			echo $e->getMessage();
		}
	}
	public function sendUserCreationMail($username, $to, $password)
	{
		$subject = 'Welcome to Energy Solution UK';
		$fromName = 'Energy Solution UK';
		$message = '<html>
		<head>
		  <meta charset="UTF-8">
		  <title>Welcome to Energy Solution UK</title>
		</head>
		<body>
		  <h1>Welcome to Energy Solution UK</h1>
		  
		  <p>Dear User,</p>
		  
		  <p>Your account has been successfully created. Here are your login details:</p>
		  
		  <p>Username: <strong>' . $username . '</strong></p>
		  <p>Password: <strong>' . $password . '</strong></p>
		  
		  <p>We highly recommend that you change your password to ensure the security of your account. You can do this by following these steps:</p>
		  
		  <ol>
			<li>Log in to your account using the provided username and password.</li>
			<li>Navigate to the account settings or profile page.</li>
			<li>Look for the option to change your password and click on it.</li>
			<li>Enter a new, strong password of your choice.</li>
			<li>Save the changes.</li>
		  </ol>
		  
		  <p>If you have any questions or need assistance, please do not hesitate to contact our support team.</p>
		  
		  <p>Thank you and welcome aboard!</p>
		</body>
		</html>';
		$from = 'no.reply@energysolutionuk.com';
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: ' . $fromName . '<' . $from . '>' . "\r\n";

		mail($to, $subject, $message, $headers);
	}

	public function emailExists($email)
	{
		try {
			$stm = $this->db->prepare("SELECT * FROM `empolyee` WHERE UPPER(`email`)= UPPER('$email')");
			$stm->execute();
			$result = $stm->fetch(PDO::FETCH_ASSOC);
			return (bool)$result;
		} catch (PDOEXCEPTION $e) {
			echo $e->getMessage();
		}
	}

	public function usernameExists($username)
	{
		try {
			$stm = $this->db->prepare("SELECT * FROM `empolyee` WHERE UPPER(`username`)= UPPER('$username')");
			$stm->execute();
			$result = $stm->fetch(PDO::FETCH_ASSOC);
			return (bool)$result;
		} catch (PDOEXCEPTION $e) {
			echo $e->getMessage();
		}
	}

	public function getAllMembers()
	{
		try {
			$stm = $this->db->prepare("SELECT * FROM users");
			$stm->execute();
			while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
				// $login = $result['username'];
				$id = $result['id'];
				$bdNo = $result['bd_no'];
				$flt = $result['flt'];
				$fName = $result['first_name'];
				$lName = $result['last_name'];
				$email = $result['email'];
				$activated = $result['activated'];
				$type = ucfirst($result['type']);
				$str = "<tr><td>$bdNo</td><td>$flt</td><td>$fName $lName</td><td>$type</td><td>$email</td>";
				if ($_SESSION['type'] == "admin") {
					if ($activated) {
						echo $str . "<td><a onClick=\"javascript: return confirm('Are you sure you want to deactivate the user?');\" class='btn btn-sm btn-outline-danger mx-1  mb-1' href='activateuser.php?id=$id&activated=0'>Deactivate</a></td>";
					} else {
						echo $str . "<td><a onClick=\"javascript: return confirm('Are you sure you want to activate the user?');\" class='btn btn-sm btn-outline-success mx-1  mb-1' href='activateuser.php?id=$id&activated=1'>Activate</a></td>";
					}
				} else {
					echo $str;
				}
			}
		} catch (PDOEXCEPTION $e) {
			echo $e->getMessage();
		}
	}

	public function activateUser($id, $activated) {
		try {
            $stm = $this->db->prepare("UPDATE users set activated=$activated WHERE id='$id'");
            $stm->execute();
            header('Location:teammember.php');
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
	}

	public function updatepass($oldpassword, $newpassword, $email)
	{
		try {
			$oldpassword = $this->stringValidation($oldpassword);
			$oldpassword = base64_encode($oldpassword);
			$newpassword = $this->stringValidation($newpassword);
			$newpassword = base64_encode($newpassword);
			$stm = $this->db->prepare("SELECT * FROM users WHERE email='$email' AND password='$oldpassword'");
			$stm->execute();
			$rowCount = $stm->rowCount();
			if ($rowCount > 0) {
				$stm = $this->db->prepare("UPDATE users SET password='$newpassword' WHERE email='$email'");
				$stm->execute();
				echo "<p class='alert alert-success'>Password Successfully Updated</p>
                <script>setTimeout(function() { location.replace('dashboard.php')},1500);</script>";
			} else {
				echo "<p class='alert alert-danger'>Password does not matched</p>";
				exit();
			}
		} catch (PDOEXCEPTION $e) {
			echo $e->getMessage();
		}
	}

	public function teamdelete($id)
	{
		try {
			$stm = $this->db->prepare("DELETE FROM empolyee WHERE employeeId='$id'");
			$stm->execute();
			header('Location:teammember.php');
		} catch (PDOEXCEPTION $e) {
			echo $e->getMessage();
		}
	}
	public function teamedit($id)
	{
		try {
			$stm = $this->db->prepare("SELECT * FROM empolyee WHERE employeeId='$id'");
			$stm->execute();
			$result = $stm->fetch(PDO::FETCH_ASSOC);
			return $result;
		} catch (PDOEXCEPTION $e) {
			echo $e->getMessage();
		}
	}

	public function updateemployee($fname, $lname, $username, $email, $type, $phone, $id)
	{

		$stm = $this->db->prepare("UPDATE empolyee SET fname='$fname',lname='$lname',phonenumber='$phone',username='$username',email='$email', type='$type' WHERE employeeId='$id'");
		if ($stm->execute()) {
			echo "<p class='alert alert-success'>Data updated successfully</p>
			<script>setTimeout(function() { location.replace('editteam.php?id=$id')},1500);</script>";
		} else {
			echo "<p class='alert alert-danger'>Something worng.Try again</p>";
		}
	}
	public function stringValidation($string)
	{
		$string = trim(htmlspecialchars(filter_var($string, FILTER_SANITIZE_STRING)));
		$string = strip_tags($string);
		return $string;
	}
	public function emailValidation($email)
	{
		$email = trim(htmlspecialchars(filter_var($email, FILTER_SANITIZE_EMAIL)));
		$email = strip_tags($email);
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return $email;
		} else {
			return false;
		}
	}
	public function validateInt($int)
	{
		$int = trim(htmlspecialchars(filter_var($int, FILTER_SANITIZE_NUMBER_INT)));
		$int = strip_tags($int);
		return $int;
	}
	public function validateDate($date, $format = 'm-d-Y H:i:s')
	{
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}
	public function redirect($url)
	{
		header('Location:' . $url . '');
	}

	public function getUsers()
	{
		try {
			$stm = $this->db->prepare("SELECT * FROM users");
			$stm->execute();
			$users = [];
			while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
				$users[] = $result;
			}
			return $users;
		} catch (PDOEXCEPTION $e) {
			echo $e->getMessage();
		}
	}
}
