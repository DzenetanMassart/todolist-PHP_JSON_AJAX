<?php
require 'connect.php';
$traitement=$bdd['taches'];

if(isset($_POST['enregistrer'])){
    if(isset($_POST['plusTache'])){

$plusTache=$_POST['plusTache'];

$bdd[] = array('taches'=>['pasfaits'=>['id'=>4, 'texte'=>$plusTache]]);
file_put_contents('taches.json', json_encode($bdd));
    }
}
header('Location: ../../index.php');
?>