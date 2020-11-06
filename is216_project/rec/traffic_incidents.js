//Populate the webpage when the user is directed to incident.html
function getTrafficIncidents() {

    var url ="../rec/traffic_incidentsAPI.php";

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            var counter = 1;
            var html_str = `
                <table class="table table-striped table-bordered text-center" id="incidents">
                    <thead> 
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Type</th>
                            <th scope="col">Message</th>
                            <th scope="col">Location</th>
                        </tr>
                    </thead>
                    <tbody>`;

            for (var traffic_obj of data.value) {
                html_str += `
                    <tr>
                        <th scope="row">${counter}</th>
                        <td>${traffic_obj.Type}</td>
                        <td>${traffic_obj.Message}</td>
                        <td><input class="form-check-input" onclick="changeLocation(${traffic_obj.Latitude}, ${traffic_obj.Longitude})" type="radio" name="exampleRadios"></td>
                    </tr>`
                counter++;
            } 

            html_str += `
                    </tbody>
                </table>`;

            var table_elem = document.getElementById("incident_table");
            table_elem.innerHTML = html_str;
            $("#incidents").DataTable({
                "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]]
            });
        }
    }
    request.open("GET", url, true);
    request.send();
}

//To change the display of the map
function changeLocation(latitude, longitude) {
    removeMarker();
    addMarker({lat: latitude, lng: longitude});
}

var map;
var markers = [];
function initMap() {
    // this code creates the map in the div
    // based on a certain prefixed settings
    map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 1.296568, lng: 103.852119 },
        zoom: 16
    });
    // random generate marker when the page first loads
    addMarker({lat: 1.296568, lng: 103.852119});
}

// Adds a marker to the map and push to the array.
// Pan to the location once a new marker is added.
function addMarker(location) {
    let marker = new google.maps.Marker({
      position: location,
      map: map,
    });
    markers.push(marker);
    map.panTo(location);
}

// Removes all the markers from the array and map
function removeMarker() {
    for (let i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }
}