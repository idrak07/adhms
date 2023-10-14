<?php 
require('dbconfig.php');
$id=$_GET['id'];
$trade->deleteById($id);