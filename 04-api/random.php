<?php

$db = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// Ajouter les téléphones suivant dans la base

$smartphones = [
    ["brand" => 'Apple',
    'model' => 'iPhone XS',
    'price' => 899
    ],
    ["brand" => 'Apple',
    'model' => 'iPhone XR',
    'price' => 999
    ],
    ["brand" => 'Apple',
    'model' => 'iPhone X',
    'price' => 1199
    ],
    ["brand" => 'Apple',
    'model' => 'iPhone 8',
    'price' => 799
    ],
    ["brand" => 'Samsung',
    'model' => 'Galaxy S10',
    'price' => 999
    ],
    ["brand" => 'Samsung',
    'model' => 'Galaxy S9',
    'price' => 599
    ]
];
// On reset la table
$db->query("TRUNCATE TABLE smartphones");

$sql = "INSERT INTO smartphones (brand, model, price) VALUES (:brand, :model, :price)";
$q = $db->prepare($sql);
foreach($smartphones as $smartphone){
    $q->bindValue(':brand', $smartphone['brand'], PDO::PARAM_STR);
    $q->bindValue(':model', $smartphone['model'], PDO::PARAM_STR);
    $q->bindValue(':price', $smartphone['price'], PDO::PARAM_STR);
    $q->execute();
}