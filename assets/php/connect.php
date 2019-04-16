<?php
//Ici, on initialise le JSON !
try
{
$data = file_get_contents( __DIR__."/taches.json"); 
$bdd = json_decode($data); 

}
catch(Exception $e)
{
	echo 'Erreur : ' . $e->getMessage();
	$bdd->Rollback();
}

?>

