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
        <div class="row"  id="success">

        </div>
        <div class="selected-car">
        
        </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

    <script>
        $.ajax({
            // type: 'POST',
            url: './cars.php',
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
                var div = $('<div class="col-md-4"></div>');
                div.html(`<div class="card" style="width: 18rem;">
                        <img src="./img/`+value.images+`" class="card-img-top" alt="`+value.images+`">
                        <div class="card-body">
                            <h5 class="card-title">`+value.brand+` `+value.model+`</h5>
                            <a data-car="`+value.id+`" href="#" class="btn btn-primary">Voir la voiture</a>
                        </div>
                        </div>`);
                $('#success').append(div);
            });
            $('body').on('click', '.card a', function (event){
                event.preventDefault(); // Bloque la redirection du lien
                var id = $(this).attr('data-car');

                $.get('./cars.php?id='+id).done(function (response) {
                    $('.selected-car').html(response.brand+' '+response.model+' '+response.price+' &euro;' + '<img src="./img/'+response.images+'">');
                })
                
            })
            
        })
    </script>
</body>
</html>