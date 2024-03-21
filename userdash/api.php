<?php
$secretid = 
$secretkey = 
$curls = curl_init();
curl_setopt($curls, CURLOPT_URL, 'https://test.api.amadeus.com/v2/shopping/flight-offers');
curl_setopt($curls, CURLOPT_POST, true);
curl_setopt($curls, CURLOPT_POSTFIELDS, "grant_type=client_credentials&client_id=NEokLAd2lgPmxvKWSiLHZ8Ph8ePYHuGM&client_secret=rOJqBxQRAUka5iOH");
curl_setopt($curls, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
curl_setopt($curls, CURLOPT_RETURNTRANSFER, true);
$token = curl_exec($curls);
$data = json_decode($token,true);

curl_setopt($curls, CURLOPT_URL, 'https://test.api.amadeus.com/v2/shopping/flight-offers?originLocationCode=BLR&destinationLocationCode=BOM&departureDate=2020-08-30&adults=1&children=1&infants=1&travelClass=ECONOMY&nonStop=true&currencyCode=INR&max=5');
curl_setopt($curls, CURLOPT_POST, false);

curl_setopt($curls, CURLOPT_HTTPHEADER, array('Authorization: Bearer jGNd9fixpstsEa9RtzMHmhXXQbAZ'));
$result = curl_exec($curls);
    if (curl_errno($curls)) {
        echo 'Error:' . curl_error($curls);
    }
print_r ($result);
curl_close ($curls);
 ?>