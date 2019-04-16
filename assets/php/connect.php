<?php
//Ici, on initialise le JSON !
try
{
$datas = file_get_contents( __DIR__."/taches.json"); 
$bdd = json_decode($datas); 
echo json_encode($bdd);
}
catch(Exception $e)
{
	echo 'Erreur : ' . $e->getMessage();
	$bdd->Rollback();
}

?>

