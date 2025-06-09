<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'rfid_db';


$conn = mysqli_connect($hostname, $username, $password, $database);

function generateUUIDv4() {
    // Genereren van 16 bytes (128 bits) aan willekeurige data
    $data = openssl_random_pseudo_bytes(16);

    // Instellen van de versie naar 0100 (binair) voor UUID versie 4
    $data[6] = chr((ord($data[6]) & 0x0f) | 0x40);

    // Instellen van de variant naar 10xx (binair) voor RFC 4122
    $data[8] = chr((ord($data[8]) & 0x3f) | 0x80);

    // Converteren van binair data naar een hexadecimale string
    $hex = bin2hex($data);

    // Formatteren van de hex string naar het UUID formaat
    return sprintf('%s-%s-%s-%s-%s',
        substr($hex, 0, 8),
        substr($hex, 8, 4),
        substr($hex, 12, 4),
        substr($hex, 16, 4),
        substr($hex, 20, 12)
    );
}

?>