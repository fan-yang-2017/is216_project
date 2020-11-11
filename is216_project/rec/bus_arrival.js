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

        var op = document.createElement("option");
        op.setAttribute("value", "all");
        var text = document.createTextNode("All buses");
        op.appendChild(text);
        bus_display.appendChild(op);

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
}

function getBusArrival(busNo){
    // multi select push to list
    var opts = [], opt;
    
    for (var i=0, len=busNo.options.length; i<len; i++) {
        opt = busNo.options[i];
        // check if selected
        if ( opt.selected ) {
            // add to array of option elements to return from this function
            opts.push(opt.value);
        }
    }
    
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
        var data = JSON.parse(this.responseText).Services;

        if (bus !== null ) {
            arrival_table.classList.remove("d-none");
        }

        // current time
        var d = new Date();

        var output = "";

        for (i of data) {
            for (var k=0, len=opts.length; k<len; k++) {
                if (i.ServiceNo == opts[k]) {
                    var rawNextDate = i.NextBus.EstimatedArrival;
                    var rawNext2Date = i.NextBus2.EstimatedArrival;
                    // var rawNext3Date = i.NextBus3.EstimatedArrival;

                    // set retrieved time into javascript date format
                    var nextbus = new Date(rawNextDate);
                    var nextbus2 = new Date(rawNext2Date);

                    // var nextbus3 = new Date(rawNext3Date);

                    // bus service info check
                    // console.log(i);

                    // covert from miliseconds to seconds to minutes
                    var nextBusTime = Math.floor(((nextbus.getTime() - d.getTime())/1000)/60);
                    var nextBus2Time = Math.floor(((nextbus2.getTime() - d.getTime())/1000)/60);
                    // var nextBus3Time = Math.floor(((nextbus3.getTime() - d.getTime())/1000)/60);

                    output += "<tr>";
                    output += "<td>" + i.ServiceNo + "</td>";

                    // fix bug if no more bus services
                    if (rawNextDate !== "") {
                        if (nextBusTime <= 0) {
                            output += "<td>Arriving</td>";
                        }
                        else {
                            output += "<td>" + nextBusTime + " mins</td>";
                        }
                    }
                    else {
                        output += "<td>-</td>";
                    }

                    if (rawNext2Date !== "") {
                        if (nextBus2Time <= 0) {
                            output += "<td>Arriving</td>";
                        } 
                        else {
                            output += "<td>" + nextBus2Time + " mins</td>";
                        }
                    }
                    else {
                        output += "<td>-</td>";
                    }
                        
                    output += "</tr>"

                    document.getElementById("arrival_time").innerHTML = output;
                }
                else if (opts[k] == "all") {
                    var rawNextDate = i.NextBus.EstimatedArrival;
                    var rawNext2Date = i.NextBus2.EstimatedArrival;
                    // var rawNext3Date = i.NextBus3.EstimatedArrival;
    
                    // set retrieved time into javascript date format
                    var nextbus = new Date(rawNextDate);
                    var nextbus2 = new Date(rawNext2Date);
    
                    // var nextbus3 = new Date(rawNext3Date);
    
                    // bus service info check
                    // console.log(i);
    
                    // covert from miliseconds to seconds to minutes
                    var nextBusTime = Math.floor(((nextbus.getTime() - d.getTime())/1000)/60);
                    var nextBus2Time = Math.floor(((nextbus2.getTime() - d.getTime())/1000)/60);
                    // var nextBus3Time = Math.floor(((nextbus3.getTime() - d.getTime())/1000)/60);
    
                    output += "<tr>";
                    output += "<td>" + i.ServiceNo + "</td>";
    
                    // fix bug if no more bus services
                    if (rawNextDate !== "") {
                        if (nextBusTime <= 0) {
                            output += "<td>Arriving</td>";
                        }
                        else {
                            output += "<td>" + nextBusTime + " mins</td>";
                        }
                    }
                    else {
                        output += "<td>-</td>";
                    }
    
                    if (rawNext2Date !== "") {
                        if (nextBus2Time <= 0) {
                            output += "<td>Arriving</td>";
                        } 
                        else {
                            output += "<td>" + nextBus2Time + " mins</td>";
                        }
                    }
                    else {
                        output += "<td>-</td>";
                    }
                    output += "</tr>"
        
                    document.getElementById("arrival_time").innerHTML = output;
                }
            }
        }
    }

    request.open("POST", url, true);
    request.send(formData);
}


