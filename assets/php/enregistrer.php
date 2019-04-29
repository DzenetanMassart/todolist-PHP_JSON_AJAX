<form action="index.php" method="post">

<div class="separe">
    <input type="text" placeholder="Ajouter une tache" name="plusTache" id="plusTache" class="tache" rows="1" cols="33">
    <input  type="submit" value="Enregistrer" class="submit" name="enregistrer">
</div>

</form>

<?php

if(isset($_POST['enregistrer']) AND ($_POST['plusTache'])){



$plusTache = $_POST['plusTache'];
$data = file_get_contents('assets/php/taches.json');
$json_arr=json_decode($data,true);
$json_arr[]= array('texte' => $plusTache, 'statut' => true);
file_put_contents('assets/php/taches.json', json_encode($json_arr));

    }
?>