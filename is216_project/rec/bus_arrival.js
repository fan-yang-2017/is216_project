function sendFormData(){
    //sending data to php file
    var formData = new FormData();
    // console.log(formData);
    var bs_code = document.getElementById("bs_code").value;
    console.log(typeof(bs_code));
    formData.append("bs_code",bs_code); 
    // for(var pair of formData.entries()) {
    //     console.log(pair[0]+', '+pair[1]);
    //   }

    var url = "../rec/busArrivalAPI.php";
    var request = new XMLHttpRequest();

    request.onload = function(){
        var data = JSON.parse(this.responseText);
        console.log(data);
    }
    
    request.open("POST", url, true);
    request.send(formData);

    // getBusArrival();
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