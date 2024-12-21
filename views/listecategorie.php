<?php require_once 'dashboard-include/header.php'; ?>
<?php require_once 'dashboard-include/navbar.php'; ?>


        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Dashboard <small>liste des categorie de chambre</small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                


                

                <div class="row">
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Liste de categorie de chambre
                            </div> 
                            <div class="panel-body">
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>nom de la categorie</th>
                                                <th>montant par nuit</th>
                                                <th>nombre de lit</th>
                                                <th>nombre de toilletes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($categories as $cat): ?>
                                            <tr>
                                                <td><?= $cat['nomCategorie'] ?> </td>
                                                <td><?= $cat['montant'] ?></td>
                                                <td><?= $cat['nombreLit'] ?></td>
                                                <td><?= $cat['nombreToillete'] ?></td>
                                                <td>
                                                    <div class="button-group">
                                                        <button type="submit"><a href="index.php?action=categorieAModifier&id=<?=$cat['idCategorie'] ?>" onclick="return confirm('etes vous sur de vouloir modifier cette categorie?');">Renomer</a></button>
                                                        <button type="button" class="cancel"><a style="text-color: white;" href="index.php?action=suppressionCategorie&id=<?= $cat['idCategorie'] ?>" onclick="return confirm('Etes vous sur de vouloir supprimer cette chambre?');">Supprimer</a></button>
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