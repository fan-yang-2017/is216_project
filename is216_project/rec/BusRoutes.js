

function getBusRoutes() {
    
    url ="BusRoutes.php";

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // var data = JSON.parse(this.responseText);
            // document.write(this.responseText);
            var json_obj = JSON.parse(this.responseText);
            var records = json_obj.value;
            console.log(json_obj.value[0].ServiceNo);
            
        }
    }
    request.open("GET", url, true);
    request.send();
}
