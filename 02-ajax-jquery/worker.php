<?php

// print_r($_GET);
// print_r($_POST);

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    // echo (isset($_POST['sentence']) ? $_POST['sentence'] : 'No sentence')
    echo $_POST['sentence'] ?? 'No sentence';
}