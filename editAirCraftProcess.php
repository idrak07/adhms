<?php
require('dbconfig.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $doa = $_POST['doa'];
    $ph = $_POST['ph'];
    $tso = $_POST['tso'];
    $noh = $_POST['noh'];
    $tonh = $_POST['tonh'];
    $hlnoh = $_POST['hlnoh'];
    $hlopsl = $_POST['hlopsl'];
    $style = $_POST['style'];

    $airCraft->update($id, $doa, $ph, $tso, $noh, $tonh, $hlnoh, $hlopsl, $style);
} else {
    // Handle the request method not being POST if necessary
    echo "Invalid request";
}
