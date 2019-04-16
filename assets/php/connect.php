<?php
/* cette page sert à se connecter au localhost */

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=todolist;charset=utf8', 'massart', 'user');
}
catch(Exception $e)
{
	echo 'Erreur : ' . $e->getMessage();
	$bdd->Rollback();
}

?>

