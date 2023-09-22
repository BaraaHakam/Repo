<?php
function getClientIP() {
    $ip = $_SERVER['REMOTE_ADDR'] ?? ($_SERVER['HTTP_CLIENT_IP'] ?? ($_SERVER['HTTP_X_FORWARDED_FOR'] ?? ($_SERVER['REMOTE_HOST'] ?? 'IP Unknown')));
    return $ip;
}

$cookie = $_GET['cookie'] ?? 'Cookie Unknown';
$ip = getClientIP();
?>
