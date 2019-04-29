<?php

if(isset($_POST['conserve']) AND ($_POST['UNDONE'])){


// read file
$data = file_get_contents('taches-origin.json');

// decode json to array
$json_arr = json_decode($data, true);

foreach ($json_arr as $key => $value) {
    if ($value['statut'] == true) {
        $json_arr[$key]['statut'] = false;
    }
}

// encode array to json and save to file
file_put_contents('taches.json', json_encode($json_arr));
    }

header('Location: ../../index.php');
?>