<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        /* Style global pour que le footer reste en bas */
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Sépare le contenu et le footer */
        }

        .container {
            flex: 1; /* Remplir l'espace restant */
        }

        footer {
            /* Un peu de style pour le footer */
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>

<body>
    <footer class="bg-light text-center py-4 mt-5">
        <p>&copy; 2024 Gestion des Sanctions - Tous droits réservés</p>
        <p>
            <a href="/index.php?route=mentions-legales">Mentions légales</a> |
            <a href="#">Contact</a> |
            <a href="#">Facebook</a> |
            <a href="#">Twitter</a>
        </p>
    </footer>
</body>

</html>