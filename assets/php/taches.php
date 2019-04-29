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