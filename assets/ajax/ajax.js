let ajax_get = (url, callback) => {
    let xmlhttp = new XMLHttpRequest();
    let data;
    xmlhttp.onreadystatechange = () => {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            console.log('response:' + xmlhttp.responseText);
            try {
                data = JSON.parse(xmlhttp.responseText);
            } catch (err) {
                console.log(err.message + xmlhttp.responseText);
                return;
            }
            callback(data);
        }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}

let undone;
let done;

ajax_get('assets/php/taches.json', (data) => {
    for (let i = 0; i < data["taches"]["pasfaits"].length; i++) {

        undone += '<div class="nodone"><input type="checkbox" id="checkbox' +
            data["taches"]["pasfaits"][i]["id"] +
            '"name="UNDONE[]"value="' + data["taches"]["pasfaits"][i]["id"] +
            '" ><label for= "checkbox' + data["taches"]["pasfaits"][i]["id"] +
            '" ><i class= "fas fa-arrow-circle-right" ></i> ' +
            data["taches"]["pasfaits"][i]["texte"] +
            ' </label> </div>';



    }
    for (let i = 0; i < data["taches"]["faits"].length; i++) {

        done += '<div class="done"><input type ="checkbox" id ="checkbox' +
            data["taches"]["faits"][i]["id"] +
            '"name="DONE[]"value ="' + data["taches"]["faits"][i]["id"] +
            '"><label for="checkbox' + data["taches"]["faits"][i]["id"] +
            '"><i class="fas fa-arrow-circle-right"></i> ' +
            data["taches"]["faits"][i]["texte"] +
            '</label></div>';



    }
    document.getElementById("taches").innerHTML = undone;
    document.getElementById("archives").innerHTML = done;

});