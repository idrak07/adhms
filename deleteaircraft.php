<?php 
require('dbconfig.php');
$id=$_GET['id'];
$airCraft->deleteById($id);