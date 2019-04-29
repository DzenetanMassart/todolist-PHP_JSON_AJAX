<?php

if(isset($_POST['enregistrer'])){
$i+=1;
$taches=array();

$taches['id']= $i;
$taches['texte']=$_POST['texte'];
$taches['statut']=true;

$json=file_get_contents('taches.json');
$json=json_decode($js,true);
$json[]=$taches;

$js=json_encode($js);
file_put_contents('taches.json',$json);


// $plusTache=$_POST['plusTache'];
// echo $plusTache;
// // read json file
// $data = file_get_contents('taches.json');

// // decode json
// $json_arr = json_decode($data, true);

// // add data
// $json_arr[] = array('id'=>'6', 'texte'=>$plusTache, 'statut'=>true);

// // encode json and save to file
// file_put_contents('taches.json', json_encode($json_arr));
header('Location: ../../index.php');


    }

?>