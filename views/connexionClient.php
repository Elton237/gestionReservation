<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('assets/img/fond-admin.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        .form-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 300px;
            text-align: center;
        }

        .form-container h1 {
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }

        .form-container input {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
        }

        .form-container button {
            background-color: #ff7f50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #ff6347;
        }

        /* Styles de base pour les liens */
    a {
        text-decoration: none; /* Supprime le soulignement par défaut */
        color: #3498db; /* Couleur de texte par défaut */
        font-weight: bold; /* Met en gras le texte des liens */
        transition: color 0.3s ease; /* Transition douce pour la couleur */
    }

    /* État de survol */
    a:hover {
        color: #2980b9; /* Couleur au survol */
        text-decoration: underline; /* Soulignement au survol */
    }

    /* État actif */
    a:active {
        color: #1c598a; /* Couleur lorsque le lien est cliqué */
    }

    /* État visité */
    a:visited {
        color: #9b59b6; /* Couleur pour les liens déjà visités */
    }

    /* Liens dans des boutons */
    .button-link {
        display: inline-block; /* Pour le rendre comme un bouton */
        padding: 10px 20px; /* Espacement intérieur */
        background-color: #3498db; /* Couleur de fond du bouton */
        color: white; /* Couleur du texte */
        border-radius: 5px; /* Coins arrondis */
        text-align: center; /* Centrer le texte */
        transition: background-color 0.3s ease; /* Transition douce pour le fond */
    }

    /* État de survol pour le bouton */
    .button-link:hover {
        background-color: #2980b9; /* Couleur de fond au survol */
    }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Connexion</h2>
    <form method="POST" action="index.php?action=connexionClient">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="motdepasse">Mot de passe</label>
            <input type="password"  name="matricule" required>
        </div>
        <button type="submit">Se connecter</button>
        <p>je suis nouveau <a href="index.php?action=nouveauclient">S'inscrire</a></p>
        <p>administrateur <a href="index.php?action=connexion">Se connecter</a></p>
    </form>
</div>

</body>
</html>