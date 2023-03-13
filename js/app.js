function upvote(image_id) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        var rspns = JSON.parse(this.responseText);
        document.getElementById('up_' + image_id).innerHTML = rspns[0];
        document.getElementById('down_' + image_id).innerHTML = rspns[1];
    }
    xhttp.open("GET", "ajax/update_votes.php?type=1&img=" + image_id);
    xhttp.send();
}

function downvote(image_id) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        var rspns = JSON.parse(this.responseText);
        document.getElementById('up_' + image_id).innerHTML = rspns[0];
        document.getElementById('down_' + image_id).innerHTML = rspns[1];
    }
    xhttp.open("GET", "ajax/update_votes.php?type=0&img=" + image_id);
    xhttp.send();
}