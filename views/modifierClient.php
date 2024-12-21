<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification des Informations Client</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('assets/img/fond-admin.jpeg'); /* Remplacez par le chemin de votre image */
            background-size: cover;
            background-position: center;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: rgba(0, 0, 0, 0.7); /* Fond semi-transparent */
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            color: #333;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Modifier vos informations</h2>
        <form action="index.php?action=modifier" method="POST">
            <?php foreach($clients as $client): ?>
            <input type="hidden" name="idClient" value="<?= $client['idClient'] ?>">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nomClient" value="<?= $client['nomClient'] ?>">

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenomClient" value="<?= $client['prenomClient'] ?>" required>

            <label for="email">E-mail :</label>
            <input type="email" id="email" name="emailClient" value="<?= $client['emailClient'] ?>" required>

            <label for="telephone">Numéro de téléphone :</label>
            <input type="tel" id="telephone" name="numeroClient" value="<?= $client['numeroClient'] ?>" required>

            <label for="motdepasse">Mot de passe :</label>
            <input type="password" id="motdepasse" name="matriculeClient" value="<?= $client['matriculeClient'] ?>" required>
            <?php endforeach; ?>

            <button type="submit">Modifier</button>
        </form>
    </div>

</body>
</html>