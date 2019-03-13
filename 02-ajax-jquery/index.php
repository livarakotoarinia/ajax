<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AJAX - Les bases</title>
</head>
<body>
    <h1>Mon site</h1>
 
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
    $(document).ready(function () {
        // Executer une requête AJAX avec jQuery
        $.get('../01-bases/worker.php').done(function (response) {
            alert(response);
        }).fail(function (xhr){
            alert('La requête a échoué avec un status '+xhr.status);
        });

        // Executer une requête AJAX en POST
        $.ajax({
            type: 'POST',
            data: { sentence: 'Salut les gens' },
            url: './worker.php'
        }).done(function (response){
            console.log(response);
        });
    });
    </script>
</body>
</html>