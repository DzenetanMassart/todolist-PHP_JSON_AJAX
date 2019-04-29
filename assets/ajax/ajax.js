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
    for (let ii = 0; ii < bdd.length; ii++) {
        console.log(bdd[ii]['statut']);
        if (bdd[ii]["statut"] == true) {

            undone += '<div class="nodone"><input type="checkbox" id="checkbox' +
                bdd[ii]["id"] +
                '"name="UNDONE[]"value="' +
                bdd[ii]["id"] +
                '" ><label for= "checkbox' +
                bdd[ii]["id"] +
                '" ><i class= "fas fa-arrow-circle-right" ></i> ' +
                bdd[ii]["texte"] +
                ' </label> </div>';
        }
        if (bdd[ii]["statut"] == false) {

            done += '<div class="done"><input type ="checkbox" id ="checkbox' +
                bdd[ii]["id"] +
                '"name="DONE[]"value ="' +
                bdd[ii]["id"] +
                '"><label for="checkbox' +
                bdd[ii]["id"] +
                '"><i class="fas fa-arrow-circle-right"></i> ' +
                bdd[ii]["texte"] +
                '</label></div>';

        }
    };
    document.getElementById("taches").innerHTML = undone;
    document.getElementById("archives").innerHTML = done;
});