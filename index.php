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
<?php include 'assets/php/contain.php'?>

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
    for (let ii = 0; ii < bdd.length; ii++) {
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