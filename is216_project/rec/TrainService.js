
function getParticularTrainService() {
  var gotLine = false;
  var choice;
  var radios = document.getElementsByName('mrt_line');

  var checkbox_list = []
  for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].checked) {
      // choice = radios[i].value;
      checkbox_list.push(radios[i].value);
    }
    else{
      
    }
  }
  
  var start = ``;
  var table_row = `` ;
  var end = ``;
  var first_load = false;
  console.log(checkbox_list);
  $.getJSON("../rec/TrainServiceAlerts.json", function (json_obj) {
  var  has_record = false;
    for (var j = 0; j < json_obj.value.AffectedSegments.length; j++) {
      for(var k = 0; k<checkbox_list.length; k++){
        if (json_obj.value.AffectedSegments[j].Line == checkbox_list[k]) {
          gotLine = true;
          first_load = true;
          if(first_load ==  true){
            start = `                
            <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Line</th>
                    <th scope="col">Direction</th>
                    <th scope="col">Satations</th>
                    <th scope="col">Free Public Bus</th>
                    <th scope="col">Free MRT Shuttle</th>
                    <th scope="col">Description</th>
                  </tr>
            </thead>
            <tbody>`;
            first_load = false;        
          }
          table_row += `
                <tr>
                  <th scope="row">${json_obj.value.AffectedSegments[j].Line}</th>
                  <td>${json_obj.value.AffectedSegments[j].Direction}</td>
                  <td>${json_obj.value.AffectedSegments[j].Stations}</td>
                  <td>${json_obj.value.AffectedSegments[j].FreePublicBus}</td>
                  <td>${json_obj.value.AffectedSegments[j].FreeMRTShuttle}</td>
                  <td style="font-size: 0.87em">${json_obj.value.Message[j]["Content"]}</td>
                </tr>`
  
        }
      }    
    }

    if(checkbox_list.length > 0 ){
      end +=
      `
        </tbody>
      </table> `;

    } 
     html_str = start + table_row + end;



    if (gotLine == true) {
      document.getElementById("display").innerHTML = html_str;
    }
    else {
      // document.getElementById("display").innerHTML = "The train is working fine now.";

    }
  })

}



function getTrainService() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      json_obj = JSON.parse(this.responseText);
      console.log(json_obj);
      // var outputText = "";
      // for (var i= 0; i<json_obj.value.length; i++){
      //     outputText += json_obj.value[i].Status.toString()
      // }
      document.getElementById("display").innerHTML = json_obj.value.Status;
      if (json_obj.value.Status == 1) {
        var html_str = `
                    <h4>There is no disruption to MRT services currently. <span>&#10003;</span></h4>
                    `;
      }
      else {
        var html_str = `                
        <table class="table" style="margin-left: 30px">
        <thead>
            <tr>
                <th scope="col">Line</th>
                <th scope="col">Direction</th>
                <th scope="col">Satations</th>
                <th scope="col">Free Public Bus</th>
                <th scope="col">Free MRT Shuttle</th>
                <th scope="col">Description</th>
              </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">${json_obj.value.AffectedSegments[0]["Line"]}</th>
            <td>${json_obj.value.AffectedSegments[0]["Direction"]}</td>
            <td>${json_obj.value.AffectedSegments[0]["Stations"]}</td>
            <td>${json_obj.value.AffectedSegments[0]["FreePublicBus"]}</td>
            <td>${json_obj.value.AffectedSegments[0]["FreeMRTShuttle"]}</td>
            <td style="font-size: 0.875em">${json_obj.value.Message[0]["Content"]}</td>
          </tr>
          <tr>
          <th scope="row">${json_obj.value.AffectedSegments[1]["Line"]}</th>
          <td>${json_obj.value.AffectedSegments[1]["Direction"]}</td>
          <td>${json_obj.value.AffectedSegments[1]["Stations"]}</td>
          <td>${json_obj.value.AffectedSegments[1]["FreePublicBus"]}</td>
          <td>${json_obj.value.AffectedSegments[1]["FreeMRTShuttle"]}</td>
          <td style="font-size: 0.875em">${json_obj.value.Message[1]["Content"]}</td>
          </tr>
        </tbody>
      </table> `;
      }

      document.getElementById("display").innerHTML = html_str;
    }
    //document.getElementById("display").innerHTML = "There is no disruption to MRT services currently.";

  }
  request.open("GET", "../rec/Train.php", true);
  request.send();

}

















