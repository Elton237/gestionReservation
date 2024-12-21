<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('assets/img/login.avif');
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
    </style>
</head>
<body>

<div class="form-container">
    <h2>Inscription</h2>
    <form action="index.php?action=nouveauclient" method="post">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="motdepasse">Mot de passe</label>
            <input type="password" id="motdepasse" name="matriculeClient" required>
        </div>
        <div class="form-group">
            <label for="telephone">Numéro de téléphone</label>
            <input type="tel" id="telephone" name="telephone" required>
        </div>
        <div class="button-group">
            <button type="submit">Soumettre</button>
            <button type="button" class="cancel">Annuler</button>
        </div>
    </form>
</div>

</body>
</html>