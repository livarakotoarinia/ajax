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
                <div id="test" ></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <form action="./worker.php" method="post">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <input class="form-control" type="text" name="message">
                    </div>
                    <button class="btn btn-success btn-block">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        var form = $('form');

        form.on('submit', function (event) {
            event.preventDefault(); // On n'exécute pas la requête POST directement

            var formData = form.serialize(); // On récupère les données du formulaire

            // On exécute la requête POST via AJAX
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: formData,
                // On peut forcer le contenu en JSON si le serveur
                // ne renvoie pas la bonne en-tête
                // dataType: 'json'
            }).done(function (response) {
                if(response.success){
                    $('#test').removeClass( 'alert alert-danger text-center' ).addClass('alert alert-success text-center');
                    $('#test').html(response.success);
                }
                
                if (response.errors){
                    if(response.errors.name && response.errors.message){
                        $('#test').removeClass( "alert alert-success text-center" ).addClass('alert alert-danger text-center');
                        $('#test').html("Erreur sur les champs");
                    }
                    else if(response.errors.message){
                        $('#test').removeClass( "alert alert-success text-center" ).addClass('alert alert-danger text-center');
                        $('#test').html(response.errors.message);
                        
                    }else{
                        $('#test').removeClass( "alert alert-success text-center" ).addClass('alert alert-danger text-center');
                        $('#test').html(response.errors.name);
                        
                    }
                }
                console.log(response);
            })
        });
    
    </script>
</body>
</html>