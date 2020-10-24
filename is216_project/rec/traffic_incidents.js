function getTrafficIncidents() {
    var url ="trafficIncidentsAPI.php";

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            // document.write(this.responseText);
            console.log(data)
        }
    }
    request.open("GET", url, true);
    request.send();
}