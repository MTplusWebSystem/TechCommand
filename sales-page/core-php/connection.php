<?php

$filename = './.conf';
$handle = file_get_contents($filename);
$data = explode('|', $handle);

$host = $data[2];
$dbname = $data[3];
$username = $data[0];
$password = $data[1];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>
