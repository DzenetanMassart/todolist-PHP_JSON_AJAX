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