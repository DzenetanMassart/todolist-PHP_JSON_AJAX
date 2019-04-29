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

ajax_get('assets/php/taches.json', (bdd) => {
    for (let i = 0; i < bdd.length; i++) {
        console.log(bdd[i]['statut']);
        if (bdd[i]["statut"] == true) {

            undone += '<div class="nodone"><input type="checkbox" id="checkbox' +
                bdd[i]["id"] +
                '"name="UNDONE[]"value="' +
                bdd[i]["id"] +
                '" ><label for= "checkbox' +
                bdd[i]["id"] +
                '" ><i class= "fas fa-arrow-circle-right" ></i> ' +
                bdd[i]["texte"] +
                ' </label> </div>';
        } else if (bdd[i]["statut"] == false) {

            undone += '<div class="done"><input type ="checkbox" id ="checkbox' +
                bdd[i]["id"] +
                '"name="DONE[]"value ="' +
                bdd[i]["id"] +
                '"><label for="checkbox' +
                bdd[i]["id"] +
                '"><i class="fas fa-arrow-circle-right"></i> ' +
                bdd[i]["texte"] +
                '</label></div>';

        } else {

        }
        document.getElementById("taches").innerHTML = undone;
        document.getElementById("archives").innerHTML = done;
    };
});