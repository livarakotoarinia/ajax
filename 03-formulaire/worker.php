<<<<<<< HEAD
<?php
header('Content-Type: application/json');
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
   'XMLHttpRequest' === $_SERVER['HTTP_X_REQUESTED_WITH']) {
if ('POST' === $_SERVER['REQUEST_METHOD']){
    // $isValid = true;
    $name = $_POST['name'];
    $message = $_POST['message'];

    // On prépare le tableau avec les erreurs
    $errors = [];
    // On vérifie le champ name
    if (strlen($name) < 2) {
        $errors['name'] = 'Erreur sur le name';
        // echo 'Erreur name';
    }

    // On vérifie le champ message
    if (strlen($message) < 2) {
        $errors['message'] = 'Erreur sur le message';
        // echo 'Erreur message';
    }

    // On vérifie si le formulaire contient des erreurs
    if (empty($errors)) {
        echo json_encode(['success' => [
            'name' => $name,
            'message' => $message,
        ]]);
    } else {
        echo json_encode(['errors' => $errors]);
        // print_r($errors);
    }
    // echo json_encode($data);
    
    
}
   }
?>
=======
<?php
header('Content-Type: application/json');
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
   'XMLHttpRequest' === $_SERVER['HTTP_X_REQUESTED_WITH']) {
if ('POST' === $_SERVER['REQUEST_METHOD']){
    // $isValid = true;
    $name = $_POST['name'];
    $message = $_POST['message'];

    // On prépare le tableau avec les erreurs
    $errors = [];
    // On vérifie le champ name
    if (strlen($name) < 2) {
        $errors['name'] = 'Erreur sur le name';
        // echo 'Erreur name';
    }

    // On vérifie le champ message
    if (strlen($message) < 2) {
        $errors['message'] = 'Erreur sur le message';
        // echo 'Erreur message';
    }

    // On vérifie si le formulaire contient des erreurs
    if (empty($errors)) {
        echo json_encode(['success' => [
            'name' => $name,
            'message' => $message,
        ]]);
    } else {
        echo json_encode(['errors' => $errors]);
        // print_r($errors);
    }
    // echo json_encode($data);
    
    
}
   }
?>
>>>>>>> f605bde9fb8a318bd392dff20aae3c43fdf0bbe3
