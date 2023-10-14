<?php 
require('dbconfig.php');
$id=$_GET['id'];
$defect->deleteById($id);