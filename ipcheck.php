<?php
header('Content-Type: application/json');

$ip = $_SERVER['REMOTE_ADDR'];

$apiUrl = "http://ip-api.com/json/" . urlencode($ip) . "?fields=status,message,continent,country,regionName,city,zip,lat,lon,timezone,isp,org,as,query";

$response = file_get_contents($apiUrl);

if ($response === FALSE) {
    http_response_code(500);
    echo json_encode([
        'status' => 'fail',
        'message' => 'Could not contact ip-api.com'
    ]);
    exit;
}

echo $response;
