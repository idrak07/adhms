<?php 
require('dbconfig.php');
$id=$_GET['id'];
$activated=$_GET['activated'];
$team->activateUser($id, $activated);