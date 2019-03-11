<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AJAX - Les bases</title>
</head>
<body>
    <h1>Mon site</h1>
    <button>Changer</button>
    <script>
        // On instancie le moteur AJAX
        var xhr = new XMLHttpRequest();
        // On veut suivre l'évolution de la requête AJAX
        xhr.addEventListener('readystatechange', function () { 
            if (4 === xhr.readyState) { // La requête est terminée
                if (200 === xhr.status) { // La reponse a un status code 200
                    // On récupère la réponse HTTP
                    console.log(xhr.response);
                    document.getElementsByTagName('h1')[0].innerHTML = xhr.response;
                }
            }
        });
        // On prépare une requête HTTP
        xhr.open('GET', './worker.php');
        // On exécute la requête HTTP
        xhr.send();

        document.getElementsByTagName('button')[0].addEventListener('click', function(){
            // On prépare une requête HTTP
            xhr.open('GET', './worker.php');
            // On exécute la requête HTTP
            xhr.send();
        });
    </script>
</body>
</html>