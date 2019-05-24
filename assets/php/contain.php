<header>
<h1><i class="fas fa-clipboard-list"></i>ToDoList PHP,JSON & AJAX</h1>

</header><section>
<div class="liste">
		<h2>Tâches à réaliser</h2>

		<form action="index.php" method="post">

			<div class="scroller" id="taches"></div>
			<div class="separe">
<input type="submit" value="Archiver" name="conserve">

			</div>

		</form>
	</div>


<?php


if(isset($_POST['conserve']) AND ($_POST['UNDONE'])){


// read file
$data = file_get_contents('assets/php/taches.json');

// decode json to array
$json_arr = json_decode($data, true);

foreach ($json_arr as $key => $value) {
if ($value['statut'] == true) {
$json_arr[$key]['statut'] = false;
}
}

// encode array to json and save to file
file_put_contents('assets/php/taches.json', json_encode($json_arr));


}
if(isset($_POST['conserve'])AND empty($_POST['UNDONE'])){
    echo 'Clique sur une tâche avant de cliquer sur le bouton "Archiver"';
}
?>



<div class="termined">
		<h2>Tâches réalisées</h2>

		<form action="index.php" method="post" >

			<div class="scroller" id="archives"></div>
			<div class="separe">
<input type="submit" value="Supprimer" name="retire">

			</div>

		</form>
	</div>


<?php
if(isset($_POST['retire'])AND($_POST['DONE'])){
// read json file
$data = file_get_contents('assets/php/taches.json');

// decode json to associative array
$json_arr = json_decode($data, true);

// get array index to delete
$arr_index = array();
foreach ($json_arr as $key => $value)
{
if ($value['statut'] == false)
{
$arr_index[] = $key;
}
}

// delete data
foreach ($arr_index as $i)
{
unset($json_arr[$i]);
}

// rebase array
$json_arr = array_values($json_arr);

// encode array to json and save to file
file_put_contents('assets/php/taches.json', json_encode($json_arr));
}

if(isset($_POST['retire'])AND empty($_POST['DONE'])){
    echo 'Clique sur une tâche avant de cliquer sur le bouton "Supprimer"';
}

?>


<form action="index.php" method="post">

<div class="separe">
    <input type="text" placeholder="Ajouter une tache" name="plusTache" id="plusTache" class="tache" rows="1" cols="33">
    <input  type="submit" value="Enregistrer" class="submit" name="enregistrer">
</div>

</form>

<?php

if(isset($_POST['enregistrer']) AND ($_POST['plusTache'])){



$plusTache = $_POST['plusTache'];
$plusTache=trim($plusTache," \< \> \/");

$data = file_get_contents('assets/php/taches.json');
$json_arr=json_decode($data,true);
$json_arr[]= array('texte' => $plusTache, 'statut' => true);
file_put_contents('assets/php/taches.json', json_encode($json_arr));

	}?>
</section>
