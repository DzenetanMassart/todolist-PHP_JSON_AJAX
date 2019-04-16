<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'assets/php/connect.php';
	// require 'assets/php/affichage.php';
?>

<!Doctype html>
<head>
<title>ToDoList SQL</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/todolist.min.css">

</head>
<body>

<header>
		<h1><i class="fas fa-clipboard-list"></i>ToDoList SQL</h1>
	</header>

	<section>

		<div class="liste">
			<h2>Tâches à réaliser</h2>
			<form action="assets/php/list.php" method="POST">
				
				<?php 
				
				$resultat = $bdd->query('SELECT * FROM taches WHERE statut=0');
				while ($donnees = $resultat->fetch()){

					echo 
					         '<div class="nodone">
					         <input type="checkbox" id="checkbox'.$donnees['id'].'" name="UNDONE" value="'.$donnees['id'].'">
					         <label for="checkbox'.$donnees['id'].'" >
					         '.$donnees['id'].' <i class="fas fa-arrow-circle-right"></i> '.$donnees['texte'].'
					         </label>
					         </div>';
				}
				
				?>
<div class="separe">
				<input type="submit" value="Archiver" name="conserve">
				<input type="submit" value="Archiver TOUT" name="conserve_tout">
			</div>
			</form>
		</div>


		<div class="termined">
			<h2>Tâches réalisées</h2>

			<form action="assets/php/update.php" method="POST">
				
			<?php 
				
				$conserver = $bdd->query('SELECT * FROM taches WHERE statut=1');
				while ($termined = $conserver->fetch()){

					echo 
					         '<div class="done">
					         <input type="checkbox" id="checkbox'.$termined['id'].'" name="DONE" value="'.$termined['texte'].'">
					         <label for="checkbox'.$termined['id'].'" >
					         '.$termined['id'].' <i class="fas fa-arrow-circle-right"></i> '.$termined['texte'].'
					         </label>
					         </div>';
				}
				
				?>
<div class="separe">

				<input type="submit" value="Supprimer" name="retire">
				<input type="submit" value="Supprimer TOUT" name="retire_tout">
			</div>
			</form>
		</div>

		<form action="assets/php/update.php" method="POST">	
		<div class="separe">
		
            <input type="text" placeholder="Ajouter une tache" name="plusTache" class="tache" rows="1" cols="33">
			<input  type="submit" value="Enregistrer" class="submit" name="enregistrer">
			</div>
		</form>

	</section>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
