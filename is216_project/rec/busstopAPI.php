<?php
    header("Access-Control-Allow-Origin: *");

    // Send HTTP POST
    $ch=curl_init();

    $skip_num = 0;

    // HTTP GET - fisrt 500
    $url = 'http://datamall2.mytransport.sg/ltaodataservice/BusStops';
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, false);        
    curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'AccountKey: yiIhcBT6TFuBrusSFC3Prg==',
        'accept: application/json'
    ));
    $response = curl_exec($ch); //get the initial array named response

    //second and third 500
    for ($skip_num = 500; $skip_num <=5000; $skip_num += 500){
        $fields = array('$skip' => $skip_num);

        // HTTP GET
        $s_url = 'http://datamall2.mytransport.sg/ltaodataservice/BusStops';
        $s_query_data = http_build_query($fields);
        
        
        curl_setopt($ch, CURLOPT_URL, "$s_url?$s_query_data");
        curl_setopt($ch, CURLOPT_POST, false);        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER , true);
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'AccountKey: yiIhcBT6TFuBrusSFC3Prg==',
            'accept: application/json'
        ));
        $s_response = curl_exec($ch); 
        $s_response = explode('[',$s_response)[1];//finish slicing

        $response = explode(']',$response)[0];
        $response = $response . "," . $s_response;

    }

    // close handle to release resources
    curl_close($ch);

    echo $response ;
?>