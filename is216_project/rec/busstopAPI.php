<?php
header("Access-Control-Allow-Origin: *");

// Send HTTP POST
$ch=curl_init();

$fields = array("$skip" => 500);

// HTTP GET
$url = "http://datamall2.mytransport.sg/ltaodataservice/BusStops";
// $query_data =  http_build_query($fields);
// curl_setopt($ch, CURLOPT_URL, "$url?$query_data");
$query_data = http_build_query($fields);


curl_setopt($ch, CURLOPT_URL, "$url?$query_data");

curl_setopt($ch, CURLOPT_POST, false);        
curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'AccountKey: yiIhcBT6TFuBrusSFC3Prg==',
    'accept: application/json'
));
$response = curl_exec($ch);    


// close handle to release resources
curl_close($ch);

echo $response ;
?>