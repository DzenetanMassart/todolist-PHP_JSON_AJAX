<?php
//Ici, on initialise le JSON !
try
{
$datas = file_get_contents( __DIR__."/taches.json"); 
$bdd = json_decode($datas); 

echo "Le tableau corresspond à: ".$datas." et l'id à ".$bdd[0]->id;
}
catch(Exception $e)
{
	echo 'Erreur : ' . $e->getMessage();
	$bdd->Rollback();
}

?>

