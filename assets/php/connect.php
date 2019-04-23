<?php
//Ici, on initialise le JSON !
try
{
$datas = file_get_contents( __DIR__."/taches.json",true); 
$bdd = (array)json_decode($datas); 
}
catch(Exception $e)
{
	echo 'Erreur : ' . $e->getMessage();
	$bdd->Rollback();
}

?>