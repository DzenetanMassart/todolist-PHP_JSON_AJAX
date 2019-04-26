<?php
require 'connect.php';
$traitement=$bdd['taches'];

if(isset($_POST['retire'])){
    if(isset($_POST['DONE'])){
$arr_index = array();
foreach ($traitement as $key => $value)
{
    if ($value['pasfaits'] == 'id')
    {
        $arr_index[] = $key;
    }
}

foreach ($arr_index as $i)
{
    unset($bdd[$i]);
}

$bdd = array_values($traitement);

file_put_contents('taches.json', json_encode($bdd));
    }
}
header('Location: ../../index.php');
?>