<?php
require 'connect.php';

if(isset($_POST['retire'])){
    if(isset($_POST['DONE'])){
$arr_index = array();
foreach ($bdd as $key => $value)
{
    if ($value['Code'] == "2")
    {
        $arr_index[] = $key;
    }
}

foreach ($arr_index as $i)
{
    unset($bdd[$i]);
}

$bdd = array_values($bdd);

file_put_contents('taches.json', json_encode($bdd));
    }
}
header('Location: ../../index.php');
?>