<?php


class Auth
{
    private $db;
    //get the db connection value from db config;
    function __construct($con)
    {
        $this->db = $con;
    }
    public function login($username, $password)
    {
        $username = $this->stringValidation($username);
        $password = $this->stringValidation($password);
        $password = base64_encode($password);
        $stm = $this->db->prepare("SELECT * FROM users WHERE email=:username AND password=:password");
        $stm->execute(array(':username' => $username, ':password' => $password));
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        $rowCount = $stm->rowCount();
        if ($rowCount > 0) {
            if ($result['activated'] == true) {
                $type = $result['type'];
                $id = $result['id'];
                $username = $result['email'];
                $_SESSION['email'] = $username;
                $_SESSION['type'] = $type;
                $_SESSION['userId'] = $id;
                echo '<script>window.location= "dashboard.php"</script>';
            } else {
                echo "<p class='alert alert-danger'>You are not verified yet. Please wait until Admin verifies you account!</p>";
            }
            
        } else {
            echo "<p class='alert alert-danger'>Username password or verification failed</p>";
        }
    }

    public function signup($username, $password, $fname, $lname, $bdno, $flt)
    {
        $password = $this->stringValidation($password);
        $password = base64_encode($password);
        if ($this->emailExists($username)) {
            echo "<div id='alert' class='alert alert-danger' role='alert'>Email already exists</div>";
        } else {
            $stm = $this->db->prepare("INSERT INTO `users`(`email`, `first_name`, `last_name`, `password`, `bd_no`, `flt`, `activated`, `type`) VALUES ('$username','$fname','$lname','$password','$bdno','$flt', 0,'user')");
            if ($stm->execute()) {
                $id = $this->db->lastInsertId();
                // $this->sendUserCreationMail($username, $email, $password);
                echo "<p class='alert alert-success'>Successfully registered! Please wait until Admin verify you.</p>";
            } else {
                echo "<div id='alert' class='alert alert-danger' role='alert'>Something wrong.Try Again</div>";
            }
        }
    }

    public function emailExists($email)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM `users` WHERE UPPER(`email`)= UPPER('$email')");
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            return (bool)$result;
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
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

    public function forgetPass($email)
    {
        try {
            if (empty($email)) {
                echo "<p class='alert alert-danger'>Field can not be empty</p>";
            }
            $email = $this->emailValidation($email);
            $stm = $this->db->prepare("SELECT * FROM empolyee WHERE email='$email'");
            $result = $stm->execute();
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            $password = base64_decode($row['password']);
            $rowCount = $stm->rowCount();
            if ($rowCount == 0) {
                echo "<p class='alert alert-danger'>Email address is not exist</p>";
            } else {

                $to = $email;
                $subject = "Password Reset";
                $from = 'Sender <noreply@sender.com>';
                $body = "Your email id: " . $email . "<br> password: " . $password;
                $headers = "From: " . ($from) . "\r\n";
                $headers .= "Reply-To: " . ($from) . "\r\n";
                $headers .= "Return-Path: " . ($from) . "\r\n";;
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $headers .= "X-Priority: 3\r\n";
                $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";
                mail($to, $subject, $body, $headers);
                echo "<p class='alert alert-success'>Your password been sent to your email</p>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
