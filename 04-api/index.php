<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API</title>
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
        
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        $.ajax({
            url: './smartphone.php',
            // On peut forcer le contenu en JSON si le serveur
            // ne renvoie pas la bonne en-tête
            // dataType: 'json',
            beforeSend: function () {
                $('h1').html('Chargement en cours...');
            },
            complete: function () {
                $('h1').html('');
            }
        }).done(function (response) {
            // console.log(response);
            $.each(response, function (key, value){
                // console.log(value.brand+" : "+ value.model);
                $('#success').append($('<li>'+value.brand+" "+ value.model+'</li>'));
            });
            
        })
    </script>
</body>
</html>