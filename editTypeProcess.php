<?php
require('dbconfig.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tname = $_POST['name'];
    $id = $_POST['id'];
    $toac = $_POST['toac'];
    $tac = $_POST['tac'];
    $nais = $_POST['nais'];
    $nafo = $_POST['nafo'];
    $nav = $_POST['nav'];
    $noas = $_POST['noas'];
    $noau = $_POST['noau'];
    $noaub = $_POST['noaub'];
    $mtr = $_POST['mtr'];
    $bbd = $_POST['bbd'];
    $fis = $_POST['fis'];
    $cxb = $_POST['cxb'];
	
	$airCraftType->update($id, $tname, $toac, $tac, $nais, $nafo, $nav, $noas, $noau, $noaub, $mtr, $bbd, $fis, $cxb);
} else {
    // Handle the request method not being POST if necessary
    echo "Invalid request";
}
