<?php

$clientIP = "149.126.74.63";
$apiURL = 'https://freegeoip.app/json/' . $clientIP;
$curl = curl_init($apiURL);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
$ipDetails = json_decode($response, true);
if (!empty($ipDetails)) {
    $countryCode = $ipDetails['country_code'];
    $countryName = $ipDetails['country_name'];
    $regionCode = $ipDetails['region_code'];
    $regionName = $ipDetails['region_name'];
    $city = $ipDetails['city'];
    $zipCode = $ipDetails['zip_code'];
    $latitude = $ipDetails['latitude'];
    $longitude = $ipDetails['longitude'];
    $timeZone = $ipDetails['time_zone'];

    echo 'Country Name: ' . $countryName . '<br/>';
    echo 'Country Code: ' . $countryCode . '<br/>';
    echo 'Region Code: ' . $regionCode . '<br/>';
    echo 'Region Name: ' . $regionName . '<br/>';
    echo 'City: ' . $city . '<br/>';
    echo 'Zipcode: ' . $zipCode . '<br/>';
    echo 'Latitude: ' . $latitude . '<br/>';
    echo 'Longitude: ' . $longitude . '<br/>';
    echo 'Time Zone: ' . $timeZone;
} else {
    echo 'IP data is not found!';
}

?>