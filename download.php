<?php 
require('dbconfig.php');
// Define file name and path 
$id=$_GET['id'];
$data = $company->getFileDetailsById($id);
$fileName = $data['unique_name']. '.' . $data['ext']; 
$filePath = 'uploads/'.$fileName; 
 $originalName = $data['original_name'];
if(!empty($fileName) && file_exists($filePath)){ 
    // Define headers 
    header("Cache-Control: public"); 
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$originalName"); 
    header("Content-Type: application/zip"); 
    header("Content-Transfer-Encoding: binary"); 
     
    // Read the file 
    readfile($filePath); 
    exit; 
}else{ 
    echo 'The file does not exist.'; 
}