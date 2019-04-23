<?php
//montre les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* Cette page sert à mettre à jour le tableau */
include 'connect.php';
$tache=$_POST['plusTache'];


if($_POST['enregistrer'])
{
    $bdd[id]->texte=$tache;
$fait=$_POST['DONE'];

    foreach($fait as $inc)
    {
        $bdd[$inc->id]->id=$inc;
   };
}




if(isset($_POST['retire_tout']))
{
            $bdd->statut=2;

};

header('Location: ../../index.php');

?>