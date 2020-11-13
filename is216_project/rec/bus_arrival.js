function sendFormData(){
    //sending data to php file
    var formData = new FormData();
    // console.log(formData);
    var bs_code = document.getElementById("bs_code").value;
    // console.log(bs_code);

    //validation
    var busStopCodes = [];

    url ="../rec/busstopAPI.php";
    var request_pre = new XMLHttpRequest();
    request_pre.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var json_obj = JSON.parse(this.responseText);
            var records = json_obj.value;
            // console.log(records);

            // E.g extracting the bus service no. from the json obj. 
            // console.log(records[0].BusStopCode);
            for (var rec of records) {
                // console.log(rec.BusStopCode);
                busStopCodes.push(rec.BusStopCode);
            }
        }
    }
    request_pre.open("GET", url, true);
    request_pre.send();

    // console.log(busStopCodes);

    if (bs_code  == ''){
        alert("Please choose a bus stop code.");
    // }else if (!busStopCodes.includes(bs_code)){
    //     alert("Please enter a valid bus stop code.")
    // }
    }else{
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
}

function getBusArrival(busNo){
    // multi select push to list
    var opts = [], opt;
    
    for (var i=0, len=busNo.options.length; i<len; i++) {
        opt = busNo.options[i];
        // check if selected and error handling for selecting all buses + other bus no
        if (opt.selected && opt.value == "all") {
            var opts = ["all"];
        }
        else if (opt.selected && !opts.includes("all")) {
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

function refresh(busNo){
    // console.log(busNo);
    // console.log(busNo.options.length);
    var opts = [], opt;

    for (var i=0, len=busNo.options.length; i<len; i++){
        opt = busNo.options[i];
        // console.log(opt.selected);
        if (opt.selected && opt.value == "all"){
            opts = ["all"];
        }else if (opt.selected && !opts.includes("all")){
            opts.push(opt.value);
        }
    }

    // console.log(opts);

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

        var old_table = document.getElementById('arrival_time');
        var output_table = document.createElement('tbody');
        var cols = 3;

        for (i of data) {
            for (var k=0, len=opts.length; k<len; k++) {
                if (i.ServiceNo == opts[k]) {
                    var rawNextDate = i.NextBus.EstimatedArrival;
                    var rawNext2Date = i.NextBus2.EstimatedArrival;

                    // set retrieved time into javascript date format
                    var nextbus = new Date(rawNextDate);
                    var nextbus2 = new Date(rawNext2Date);

                    // var nextbus3 = new Date(rawNext3Date);

                    // bus service info check
                    // console.log(i);

                    // covert from miliseconds to seconds to minutes
                    var nextBusTime = Math.floor(((nextbus.getTime() - d.getTime())/1000)/60);
                    var nextBus2Time = Math.floor(((nextbus2.getTime() - d.getTime())/1000)/60);

                    var row = output_table.insertRow(-1);
                    for (var c = 0; c<cols; c++){
                        var cell = row.insertCell(-1);//create an empty table
                        if (c == 0){
                            cell.setAttribute('id','bus_number');
                            cell.innerHTML = i.ServiceNo;
                        }else if (c == 1){
                            if (rawNextDate !== ""){
                                if (nextBusTime <= 0){
                                    cell.innerHTML = 'Arriving';
                                }else{
                                    cell.innerHTML = nextBusTime + ' mins';
                                }
                            }else{
                                cell.innerHTML = '-';
                            }
                        }else if (c == 2){
                            if (rawNext2Date !== ""){
                                if (nextBus2Time <= 0){
                                    cell.innerHTML = 'Arriving';
                                }else{
                                    cell.innerHTML = nextBus2Time + ' mins';
                                }
                            }else{
                                cell.innerHTML = '-';
                            }
                        }

                    }


                }else if (opts[k] == "all"){
                    var rawNextDate = i.NextBus.EstimatedArrival;
                    var rawNext2Date = i.NextBus2.EstimatedArrival;

                    // set retrieved time into javascript date format
                    var nextbus = new Date(rawNextDate);
                    var nextbus2 = new Date(rawNext2Date);

                    // var nextbus3 = new Date(rawNext3Date);

                    // bus service info check
                    // console.log(i);

                    // covert from miliseconds to seconds to minutes
                    var nextBusTime = Math.floor(((nextbus.getTime() - d.getTime())/1000)/60);
                    var nextBus2Time = Math.floor(((nextbus2.getTime() - d.getTime())/1000)/60);

                    var row = output_table.insertRow(-1);
                    for (var c = 0; c<cols; c++){
                        var cell = row.insertCell(-1);//create an empty table
                        if (c == 0){
                            cell.setAttribute('id','bus_number');
                            cell.innerHTML = i.ServiceNo;
                        }else if (c == 1){
                            if (rawNextDate !== ""){
                                if (nextBusTime <= 0){
                                    cell.innerHTML = 'Arriving';
                                }else{
                                    cell.innerHTML = nextBusTime + ' mins';
                                }
                            }else{
                                cell.innerHTML = '-';
                            }
                        }else if (c == 2){
                            if (rawNext2Date !== ""){
                                if (nextBus2Time <= 0){
                                    cell.innerHTML = 'Arriving';
                                }else{
                                    cell.innerHTML = nextBus2Time + ' mins';
                                }
                            }else{
                                cell.innerHTML = '-';
                            }
                        }

                    }                    
                }
            }
        }
        old_table.parentNode.replaceChild(output_table,old_table);
        output_table.setAttribute('id','arrival_time');
    }
    request.open("POST", url, true);
    request.send(formData);

}

