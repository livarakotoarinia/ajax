<<<<<<< HEAD
<?php
$db = new PDO("mysql:host=localhost;port=3306;dbname=test;charset=utf8", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


$sql = "SELECT * FROM smartphones";
$q = $db->query($sql);
$results = $q->fetchAll(PDO::FETCH_ASSOC);
// Transformer le tableau en JSON (json_encode)
header('Content-Type: application/json');
echo json_encode($results);
=======
<?php
$db = new PDO("mysql:host=127.0.0.1;port=3306;dbname=test;charset=utf8", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


$sql = "SELECT * FROM smartphones";
$q = $db->query($sql);
$results = $q->fetchAll(PDO::FETCH_ASSOC);
// Transformer le tableau en JSON (json_encode)
header('Content-Type: application/json');
echo json_encode($results);
>>>>>>> f605bde9fb8a318bd392dff20aae3c43fdf0bbe3
?>