<?php
require 'connect.php';

if(isset($_POST['conserve'])){
    if(isset($_POST['UNDONE'])){

        foreach ($json_arr as $key => $value) {
            if ($value['taches'] == 'pasfaits') {
                $json_arr[$key]['taches'] = "faits";
            }
        }

$bdd = array_values($bdd);

file_put_contents('taches.json', json_encode($bdd));
    }
}
header('Location: ../../index.php');
?>