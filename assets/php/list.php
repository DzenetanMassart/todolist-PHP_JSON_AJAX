<?php
//montre les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* cette page sert à gérer la liste des tâches en cours */
include 'connect.php';

if(isset($_POST['conserve'])){
if(isset($_POST['UNDONE']))

{$pas_fait=$_POST['UNDONE'];

    foreach($pas_fait as $inc){
    $bdd[$inc->id]->statut=0;
   };
};
};

 

    if(isset($_POST['conserve_tout']))
{

    $bdd->statut=1;
}

header('Location: ../../index.php');

?>