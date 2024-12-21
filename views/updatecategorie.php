<?php require_once 'dashboard-include/header.php'; ?>
<?php require_once 'dashboard-include/navbar.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Catégorie de Chambre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* background-color: #f4f4f4; */
            padding: 20px;
        }
        .form-container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        input[type="text"],
        input[type="number"] {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Ajouter une Catégorie de Chambre</h2>
        <form action="index.php?action=modifierCategorie" method="POST">
            <?php foreach ($categories as $et): ?>
                <input type="hidden" name="idCategorie" value="<?php echo $_GET['id'] ?>">
            nom categorie:<input type="text" name="nomCategorie" value="<?= $et['nomCategorie'] ?>" required>
            montant:<input type="number" name="montant" value="<?= $et['montant'] ?>" required>
            nombre de lit:<input type="number" name="nombreLit" value="<?= $et['nombreLit'] ?>" required>
            nombre toillete<input type="number" name="nombreToillete" value="<?= $et['nombreToillete'] ?>" required>
            <input type="submit" value="Ajouter la Catégorie">
            <?php endforeach; ?>
        </form>
    </div>
</body>
</html>

<?php require_once 'dashboard-include/footer.php'; ?>