<!Doctype html>
<head>
	<title>ToDoList PHP JSON et AJAX</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/todolist.css">
</head>
<body>
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
$data = file_get_contents('assets/php/taches.json');
$json_arr=json_decode($data,true);
$json_arr[]= array('texte' => $plusTache, 'statut' => true);
file_put_contents('assets/php/taches.json', json_encode($json_arr));

    }
?>
</section>

<!-- Patrtie Ajax -->

<script>
let ajax_get = (url, callback) => {
    let xmlhttp = new XMLHttpRequest();
    let bdd;
    xmlhttp.onreadystatechange = () => {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            console.log('response:' + xmlhttp.responseText);
            try {
                bdd = JSON.parse(xmlhttp.responseText);
            } catch (err) {
                console.log(err.message + xmlhttp.responseText);
                return;
            }
            callback(bdd);
        }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

let undone;
let done;
let id = 0;

ajax_get('assets/php/taches.json', (bdd) => {
    console.log(bdd);
    for (let ii = 1; ii < bdd.length; ii++) {
        id++;

        console.log(bdd[ii]['statut']);
        if (bdd[ii]["statut"] == true) {
            undone += '<div class="nodone"><input type="checkbox" id="checkbox' +
                id +
                '"name="UNDONE[]"value="' +
                id +
                '" ><label for= "checkbox' +
                id +
                '" ><i class= "fas fa-arrow-circle-right" ></i> ' +
                bdd[ii]["texte"] +
                ' </label> </div>';
        }
        if (bdd[ii]["statut"] == false) {
            done += '<div class="done"><input type ="checkbox" id ="checkbox' +
                id +
                '"name="DONE[]"value ="' +
                id +
                '"><label for="checkbox' +
                id +
                '"><i class="fas fa-arrow-circle-right"></i> ' +
                bdd[ii]["texte"] +
                '</label></div>';

        }
    };
    document.getElementById("taches").innerHTML = undone;
    document.getElementById("archives").innerHTML = done;
});

</script>
</body>