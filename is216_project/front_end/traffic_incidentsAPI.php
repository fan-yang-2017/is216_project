<?php
header("Access-Control-Allow-Origin: *");

// Send HTTP POST
$ch=curl_init();

// HTTP GET
$url = "http://datamall2.mytransport.sg/ltaodataservice/TrafficIncidents";
// $query_data =  http_build_query($fields);
// curl_setopt($ch, CURLOPT_URL, "$url?$query_data");
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, false);        
curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'AccountKey: QPurac4MRYGRJgSJ46x9Xg==',
    'accept: application/json'
));
$response = curl_exec($ch);    


// close handle to release resources
curl_close($ch);

echo $response ;
?>