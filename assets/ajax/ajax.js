let datas = 'assets/php/taches.json';
let bdd = new XMLHttpRequest();
bdd.open('GET', datas);
bdd.onload = function() {
    alert("L'AJAX est disponible !");
};
bdd.send();