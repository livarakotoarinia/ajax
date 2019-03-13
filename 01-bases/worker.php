<?php
// echo 'Toto';

// sleep(3); // On peut ralentir le script volontairement

$sentences = [
    'Hello world!',
    'Great server',
    'Amazing ajax request',
    'A random sentence',
    'Sentence generator'
];

echo $sentences[array_rand($sentences)];