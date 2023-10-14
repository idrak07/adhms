<?php 
require('dbconfig.php');
// Define file name and path 
$id=$_GET['id'];
$data = $company->getFileDetailsById($id);
$fileName = $data['unique_name']. '.' . $data['ext']; 
$filePath = 'uploads/'.$fileName; 
$originalName = $data['original_name'];
if(file_exists($filePath)){
	$delete  = unlink($filePath);
	if($delete){
        $company->deleteFileById($id);
		echo "delete success";
	}else{
	echo "delete not success";
	}
}