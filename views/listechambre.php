<?php require_once 'dashboard-include/header.php'; ?>
<?php require_once 'dashboard-include/navbar.php'; ?>

<style>
       /* Styles de base pour les liens */
       a {
        text-decoration: none; /* Supprime le soulignement par défaut */
        color:rgb(217, 224, 228); /* Couleur de texte par défaut */
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
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard <small>liste des chambres</small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                


                

                <div class="row">
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Liste des chambres
                            </div> 
                            <div class="panel-body">
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>numero chambre</th>
                                                <th>categorie</th>
                                                <th>montant</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($chambres as $chambre): ?>
                                            <tr>
                                                <td><?= $chambre['numeroChambre'] ?> </td>
                                                <td><?= $chambre['nomCategorie'] ?></td>
                                                <td><?= $chambre['montant'] ?>FCFA/nuit</td>
                                                <td>
                                                    <div class="button-group">
                                                        <button type="submit"><a id="btn" href="#">Renomer</a></button>
                                                        <button type="button" class="cancel"><a id="btn" href="index.php?action=suppressionChambre&id=<?= $chambre['idChambre'] ?>" onclick="return confirm('Etes vous sur de vouloir supprimer cette chambre?');">Supprimer</a></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

<?php require_once 'dashboard-include/footer.php'; ?>