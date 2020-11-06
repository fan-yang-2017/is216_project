function sendFormData(){
    //sending data to php file
    var formData = new FormData();
    // console.log(formData);
    var bs_code = document.getElementById("bs_code").value;
    // console.log(bs_code);

    var bus_display = document.getElementById("bus_display");

    formData.append("bs_code",bs_code); 
    // for(var pair of formData.entries()) {
    //     console.log(pair[0]+', '+pair[1]);
    //   }

    var url = "../rec/busArrivalAPI.php";
    var request = new XMLHttpRequest();

    request.onload = function(){
        // console.log(JSON.parse(this.responseText));
        var data = JSON.parse(this.responseText).Services;
        // console.log(data);

        //clearing the options when searching for different postal codes
        while (bus_display.lastChild !== null) {;
            bus_display.lastChild.remove();
        }
            
        if (bus_display !== null ) {
            div2.classList.remove("d-none");
        }

        for (var i of data) {
            var option = document.createElement("option");

            option.setAttribute("value", i.ServiceNo);

            var textNode = document.createTextNode(i.ServiceNo);

            option.appendChild(textNode);

            bus_display.appendChild(option);

        }
    }
    
    request.open("POST", url, true);
    request.send(formData);

    // getBusArrival();
}

function getBusArrival(busNo){
    var bus = busNo.options[busNo.selectedIndex].text;
    console.log(bus);
    
    //sending data to php file
    var formData = new FormData();
    // console.log(formData);
    var bs_code = document.getElementById("bs_code").value;
    // console.log(bs_code);

    formData.append("bs_code",bs_code); 
    // for(var pair of formData.entries()) {
    //     console.log(pair[0]+', '+pair[1]);
    //   }

    var url = "../rec/busArrivalAPI.php";
    var request = new XMLHttpRequest();

    request.onload = function(){
        // console.log(JSON.parse(this.responseText));
        var data = JSON.parse(this.responseText).Services;
        console.log(data);
        var d = new Date();
        var n = d.getMinutes();

        // var arrival_time = document.getElementById("bus_arrival");
        var output = "";

        for (i of data) {
            if (i.ServiceNo == bus) {
                var nextbus = i.NextBus.EstimatedArrival.getMinutes() - n;
                var nextbus2 = i.NextBus2.EstimatedArrival.getMinutes() - n;
                output += "<tr>";
                output += "<td>" + i.ServiceNo + "</td>";
                output += "<td>" + nextbus + "</td>";
                output += "<td>" + nextbus2 + "</td>";
                output += "</tr>"

                document.getElementById("arrival_time").innerHTML = output;
            }
        }

    }

    request.open("POST", url, true);
    request.send(formData);
}


// function getBusArrival(){
//     //receiving data 
//     var url = "busArrivalAPI.php";
//     var return_rqt = new XMLHttpRequest();
//     return_rqt.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             var data = JSON.parse(this.responseText);
//             // document.write(this.responseText);
//             console.log(data);
//         }
//     }
//     return_rqt.open("GET", url, true);
//     return_rqt.send();
// }