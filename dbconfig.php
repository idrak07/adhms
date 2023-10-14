<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$dbHost = "localhost";
$dbName = "adhms";
$dbUser = "mehedi";
$dbPass = "synchronise$1000";
try {
    $con = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}

require_once('autoload.php');
$airCraftType=new AirCraftType($con);
$airCraft=new AirCraft($con);
$trade=new Trade($con);
$subject=new Subject($con);
$defect = new Defect($con);


$auth=new Auth($con);
$team=new Team($con);
$company=new Company($con);
$transaction=new Transaction($con);
$m=new Mileage($con);
?>