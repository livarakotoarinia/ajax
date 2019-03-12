<?php
$db = new PDO("mysql:host=127.0.0.1;port=3306;dbname=test;charset=utf8", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


$sql = "SELECT * FROM smartphones";
$q = $db->query($sql);
$results = $q->fetchAll(PDO::FETCH_ASSOC);
// Transformer le tableau en JSON (json_encode)
header('Content-Type: application/json');
echo json_encode($results);
?>