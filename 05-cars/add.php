<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
   
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h1></h1>
                <ul id="success" ></ul>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <form  method="post">
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input class="form-control" type="text" name="brand">
                    </div>
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input class="form-control" type="text" name="model">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input class="form-control" type="number" name="price">
                    </div>
                    <div class="form-group">
                        <label for="image-name">Image Name</label>
                        <input class="form-control" type="text" name="image-name">
                    </div>
                    <button class="btn btn-success btn-block">Envoyer</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<?php
$db = new PDO("mysql:host=localhost;port=3306;dbname=test;charset=utf8", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
if ('POST' === $_SERVER['REQUEST_METHOD']){
    // $isValid = true;
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $image = $_POST['image-name'];

    // On prépare le tableau avec les erreurs
    $errors = [];
    // On vérifie le champ name
    if (strlen($brand) < 2) {
        $errors['brand'] = 'Erreur sur le brand';
    }

    // On vérifie le champ message
    if (strlen($model) < 2) {
        $errors['model'] = 'Erreur sur le model';
    }
    if (!is_int($price)) {
        $errors['price'] = 'Erreur sur le prix';
    }
    if (strlen($image) < 2) {
        $errors['image'] = 'Erreur sur le nom de l\'image';
    }

    // On vérifie si le formulaire contient des erreurs
    if (empty($errors)) {
        // echo json_encode(['success' => [
        //     'name' => $name,
        //     'message' => $message,
        // ]]);
        $sql = "INSERT INTO cars (brand,model,price,image) VALUES (:brand,:model,:price,:image)";
        $q = $db->prepare($sql);
        $q->bindValue(':brand', $brand, PDO::PARAM_STR);
        $q->bindValue(':model', $model, PDO::PARAM_STR);
        $q->bindValue(':price', $price, PDO::PARAM_STR);
        $q->bindValue(':image', $image, PDO::PARAM_STR);
        $q->execute();

        header('location: index.php');
        exit;
    } else {
        echo json_encode(['errors' => $errors]);
    }    
}