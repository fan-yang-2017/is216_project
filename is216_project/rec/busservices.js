

function getBusServices() {
    url ="busservicesAPI.php";

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var json_obj = JSON.parse(this.responseText);
            var records = json_obj.value;

            // E.g extracting the bus service no. from the json obj. 
            // console.log(records[0].ServiceNo);
            
        }
    }
    request.open("GET", url, true);
    request.send();
}