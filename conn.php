<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "edusmart_v2";
$conn = null;

try {
  $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
  ]);
} catch (Exception $e) {
  echo $e->getMessage();
}
?>