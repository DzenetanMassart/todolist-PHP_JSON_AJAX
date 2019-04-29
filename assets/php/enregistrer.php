<form action="assets/php/enregistrer.php" method="post">

<div class="separe">
    <input type="text" placeholder="Ajouter une tache" name="plusTache" id="plusTache" class="tache" rows="1" cols="33">
    <input  type="submit" value="Enregistrer" class="submit" name="enregistrer">
</div>

</form>

<?php

if(isset($_POST['enregistrer'])){
$i+=1;
$taches=array();

$taches['id']= $i;
$taches['texte']=$_POST['plusTache'];
$taches['statut']=true;

$json=file_get_contents('taches.json');
$json=json_decode($js,true);
$json[]=$taches;

$js=json_encode($js);
file_put_contents('taches.json',$json);
header('Location: ../../index.php');
    }
?>