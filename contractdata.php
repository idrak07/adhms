<?php 
require('dbconfig.php');
$cname=$_REQUEST['value'];
$company->getcompanydatabyname($cname);