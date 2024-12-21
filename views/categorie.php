<?php require_once 'dashboard-include/header.php'; ?>
<?php require_once 'dashboard-include/navbar.php'; ?>


    <style>
        
        .formulaire {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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

<body>
<div id="page-wrapper">
<div id="page-inner">
    <div class="formulaire">
        <h2>Ajouter une Catégorie de Chambre</h2>
        <form action="index.php?action=ajoutercategorie" method="POST">
            <input type="text" name="nomCategorie" placeholder="Nom de la Catégorie" required>
            <input type="number" name="montant" placeholder="Montant" required>
            <input type="number" name="nombreLit" placeholder="Nombre de Lits" required>
            <input type="number" name="nombreToillete" placeholder="Nombre de Toilettes" required>
            <input type="submit" value="Ajouter la Catégorie">
        </form>
    </div>
    </div>
    </div>
</body>
</html>

<?php require_once 'dashboard-include/footer.php'; ?>