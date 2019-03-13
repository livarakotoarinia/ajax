<?php
$db = new PDO("mysql:host=localhost;port=3306;dbname=test;charset=utf8", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

header('Content-Type: application/json');

if (isset($_GET['id'])){
    $sql = "SELECT * FROM cars WHERE id =".$_GET['id'];
    $q = $db->query($sql);
    $result = $q->fetch(PDO::FETCH_ASSOC);
    // echo $results['id'];
    echo json_encode($result);
} else {
    $sql = "SELECT * FROM cars";
    $q = $db->query($sql);
    $results = $q->fetchAll(PDO::FETCH_ASSOC);
    // Transformer le tableau en JSON (json_encode)
    echo json_encode($results);
}
?>