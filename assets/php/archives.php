<?php
if(isset($_POST['retire'])AND($_POST['DONE'])){
        echo 'saucisse';
// read json file
$data = file_get_contents('taches-origin.json');

// decode json to associative array
$json_arr = json_decode($data, true);

// get array index to delete
$arr_index = array();
foreach ($json_arr as $key => $value)
{
    if ($value['statut'] == true)
    {
        $arr_index[] = $key;
    }
}

// delete data
foreach ($arr_index as $i)
{
    unset($json_arr[$i]);
}

// rebase array
$json_arr = array_values($json_arr);

// encode array to json and save to file
file_put_contents('taches.json', json_encode($json_arr));
header('Location: ../../index.php');

    }

?>